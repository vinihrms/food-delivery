<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pedidos extends BaseController
{

    private $pedidoModel;
    private $entregadorModel;


    public function __construct()
    {
        $this->pedidoModel = new \App\Models\PedidoModel();
        $this->entregadorModel = new \App\Models\EntregadorModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando os pedidos',
            'pedidos' => $this->pedidoModel->listaTodosOsPedidos(),
            'pager' => $this->pedidoModel->pager
        ];

        return view('Admin/Pedidos/index', $data);
    }

    public function show($codigoPedido = null)
    {
        $pedido = $this->pedidoModel->buscaPedidoOu404($codigoPedido);

        $data = [
            'titulo' => "Detalhando o pedido $pedido->codigo",
            'pedido' => $pedido,
        ];

        return view('Admin/Pedidos/show', $data);
    }

    public function excluir($codigoPedido = null)
    {
        $pedido = $this->pedidoModel->buscaPedidoOu404($codigoPedido);

        if($pedido->situacao < 2){
            return redirect()->back()->with('info', 'Apenas pedidos entregues ou cancelados podem ser excluídos.');
        }

        if($this->request->getMethod() == 'post'){
            $this->pedidoModel->delete($pedido->id);
        }

        return redirect()->to(site_url('admin/pedidos'))->with('sucesso', 'Pedido excluído com suceso.');

        $data = [
            'titulo' => "Excluindo o pedido $pedido->codigo",
            'pedido' => $pedido,
        ];

        return view('Admin/Pedidos/excluir', $data);
    }

    public function editar($codigoPedido = null)
    {
        $pedido = $this->pedidoModel->buscaPedidoOu404($codigoPedido);

        if ($pedido->situacao == 2) {
            return redirect()->back()->with('info', 'Esse pedido já foi entregue, portanto, não é possível editá-lo');
        }

        if ($pedido->situacao == 3) {
            return redirect()->back()->with('info', 'Esse pedido já foi cancelado, portanto, não é possível editá-lo');
        }

        $data = [
            'titulo' => "Detalhando o pedido $pedido->codigo",
            'pedido' => $pedido,
            'entregadores' => $this->entregadorModel->select('id, nome')->where('ativo', true)->findAll(),
        ];

        return view('Admin/Pedidos/editar', $data);
    }

    public function atualizar($codigoPedido = null)
    {

        if ($this->request->getMethod() === 'post') {

            $pedido = $this->pedidoModel->buscaPedidoOu404($codigoPedido);


            if ($pedido->situacao == 2) {
                return redirect()->back()->with('info', 'Esse pedido já foi entregue, portanto, não é possível editá-lo');
            }

            if ($pedido->situacao == 3) {
                return redirect()->back()->with('info', 'Esse pedido já foi cancelado, portanto, não é possível editá-lo');
            }

            $pedidoPost = $this->request->getPost();

            if (!isset($pedidoPost['situacao'])) {
                return redirect()->back()->with('atencao', 'Escolha a situação do pedido');
            }

            if ($pedidoPost['situacao'] == 1) {
                if (strlen($pedidoPost['entregador_id'] < 1)) {
                    return redirect()->back()->with('atencao', 'Se o pedido está saindo para a entrega, por favor, escolha o entregador');
                }
            }

            if ($pedidoPost['situacao'] == 1) {
                if (strlen($pedidoPost['entregador_id'] < 1)) {
                    return redirect()->back()->with('atencao', 'Se o pedido está saindo para a entrega, por favor, escolha o entregador');
                }
            }


            //FIXME: arrumar isso se tiver retirada na loja
            if ($pedido->situacao == 0) {
                if (($pedidoPost['entregador_id'] == 2)) {
                    return redirect()->back()->with('atencao', 'O pedido não pode ser entregue, pois não saiu para a entrega');
                }
            }

            if ($pedidoPost['situacao'] != 1) {
                unset($pedidoPost['entregador_id']);
            }

            if ($pedidoPost['situacao'] == 3) {
                $pedidoPost['entregador_id'] = null;
            }

            $situacaoPedidoAnterior = $pedido->situacao;

            $pedido->fill($pedidoPost);

            if (!$pedido->hasChanged()) {
                return redirect()->back()->with('info', 'Não há novas informações para atualizar');
            }

            if ($this->pedidoModel->save($pedido)) {

                if ($pedido->situacao == 1) {
                    $entregador = $this->entregadorModel->find($pedido->entregador_id);
                    $pedido->entregador = $entregador;
                    $this->enviaEmailPedidoSaiuEntrega($pedido);
                }

                if ($pedido->situacao == 2) {
                    $this->enviaEmailPedidoFoiEntregue($pedido);
                    $this->insereProdutosDoPedido($pedido); //funcao que popula o pedidos_produtos para estatisticas
                }

                if ($pedido->situacao == 3) {
                    $this->enviaEmailPedidoFoiCancelado($pedido);

                    if ($situacaoPedidoAnterior == 1) {
                        session()->setFlashdata('atencao', 'Administrador, este pedido está em rota de entrega. Por favor, entre em contato com o entregador para que ele retorne para a loja.');
                    }
                }

                return redirect()->to(site_url("admin/pedidos/show/$pedido->codigo"))->with('sucesso', 'Pedido atualizado com sucesso');
            } else {
                return redirect()->back()->with('errors_model', $this->pedidoModel->errors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo:');
            }
        } else {
            return redirect()->back();
        }
    }

    public function procurar()
    {

        if (!$this->request->isAJAX()) {
            exit('Página não encontrada.');
        };

        $pedidos = $this->pedidoModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach ($pedidos as $pedido) {
            $data['value'] = $pedido->codigo;

            $retorno[] = $data;
        };

        return $this->response->setJSON($retorno);
    }

    private function enviaEmailPedidoSaiuEntrega(object $pedido)
    {
        $email = service('email');
        $email->setFrom('no-reply@fooddelivery.com', 'Food Delivery');
        $email->setTo($pedido->email);
        $email->setSubject("Pedido $pedido->codigo saiu para a entrega");

        $mensagem = view('Admin/Pedidos/pedido_saiu_entrega_email', ['pedido' => $pedido]);
        $email->setMessage($mensagem);

        $email->send();
    }

    private function enviaEmailPedidoFoiEntregue(object $pedido)
    {
        $email = service('email');
        $email->setFrom('no-reply@fooddelivery.com', 'Food Delivery');
        $email->setTo($pedido->email);
        $email->setSubject("Pedido $pedido->codigo foi entregue");

        $mensagem = view('Admin/Pedidos/pedido_foi_entregue_email', ['pedido' => $pedido]);
        $email->setMessage($mensagem);

        $email->send();
    }

    private function enviaEmailPedidoFoiCancelado(object $pedido)
    {
        $email = service('email');
        $email->setFrom('no-reply@fooddelivery.com', 'Food Delivery');
        $email->setTo($pedido->email);
        $email->setSubject("Pedido $pedido->codigo foi cancelado");

        $mensagem = view('Admin/Pedidos/pedido_foi_cancelado_email', ['pedido' => $pedido]);
        $email->setMessage($mensagem);

        $email->send();
    }

    private function insereProdutosDoPedido(object $pedido)
    {

        $pedidoProdutoModel = new \App\Models\PedidoProdutoModel();

        $produtos = unserialize($pedido->produtos);

        $produtosPedido = []; //recebe o push

        foreach ($produtos as $produto) {
            array_push($produtosPedido, [
                'pedido_id' => $pedido->id,
                'produto' => $produto['nome'],
                'quantidade' => $produto['quantidade'],
            ]);
        }

        $pedidoProdutoModel->insertBatch($produtosPedido);
    }
}
