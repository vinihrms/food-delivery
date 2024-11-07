<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Checkout extends BaseController
{
    private $usuario;
    private $formaPagamentoModel;
    private $bairroModel;
    private $pedidoModel;

    private $validacao;


    public function __construct()
    {
        $this->usuario = service('autenticacao')->pegaUsuarioLogado();
        $this->formaPagamentoModel = new \App\Models\FormaDePagamentoModel();
        $this->bairroModel = new \App\Models\BairroModel();
        $this->pedidoModel = new \App\Models\PedidoModel();
        $this->validacao = service('validation');

    }

    public function index()
    {
        if (!session()->has('carrinho') || count(session()->get('carrinho')) < 1) {
            return redirect()->to(site_url('carrinho'));
        }

        $data = [
            'titulo' => 'Finalizar pedido',
            'carrinho' => session()->get('carrinho'),
            'formas' => $this->formaPagamentoModel->where('ativo', true)->findAll()
        ];

        return view('Checkout/index', $data);
    }

    public function consultaCEP()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to(site_url('/'));
        }

        $validacao = service("validation");

        $validacao->setRule('cep', 'CEP', 'required|exact_length[9]');

        if (!$validacao->withRequest($this->request)->run()) {
            $retorno['erro'] = '<span class="text-danger small">' . $validacao->getError() . '</span>';

            return $this->response->setJSON($retorno);
        }

        $cep = str_replace("-", "", $this->request->getGet('cep'));

        helper('consulta_cep');

        $consulta = consultaCep($cep);

        if (isset($consulta->erro) && !isset($consulta->cep)) {
            $retorno['erro'] = '<span class="text-danger small"> Informe um CEP válido </span>';

            return $this->response->setJSON($retorno);
        }


        $bairroRetornoSlug = mb_url_title($consulta->bairro, '-', true);

        $bairro = $this->bairroModel->select('nome, valor_entrega, slug')->where('slug', $bairroRetornoSlug)->where('ativo', true)->first();

        if ($consulta->bairro == null || $bairro == null) {
            $retorno['erro'] = '<span class="text-danger small"> Não atendemos o bairro: ' . esc($consulta->bairro) . ' - ' . esc($consulta->localidade) . ' - ' . esc($consulta->uf) . ' - '
                . '</span>';

            return $this->response->setJSON($retorno);
        }

        $retorno['valor_entrega'] = 'R$ ' . esc(number_format($bairro->valor_entrega, 2));

        $retorno['bairro'] = '<span class="small"> Valor de entrega para o bairro '
            . esc($consulta->bairro) . ' - '
            . esc($consulta->localidade) . ' - '
            . esc($consulta->uf) . ' - '
            . esc($consulta->cep)
            . ': R$' . esc(number_format($bairro->valor_entrega, 2))
            . '</span>';

        $retorno['endereco'] =
            esc($consulta->bairro) . ' - '
            . esc($consulta->localidade) . ' - '
            . esc($consulta->logradouro) . ' - '
            . esc($consulta->uf) . ' - '
            . esc($consulta->cep)
            . '</span>';

        $retorno['logradouro'] = $consulta->logradouro;
        $retorno['bairro_slug'] = $bairro->slug;
        $retorno['total'] = number_format($this->somaValorProdutosCarrinho() + $bairro->valor_entrega, 2);

        session()->set('endereco_entrega', $retorno['endereco']);
        return $this->response->setJSON($retorno);
    }

    public function processar(){
        if($this->request->getMethod() === 'post'){
            $checkoutPost = $this->request->getPost('checkout');

            $this->validacao->setRules([
                'checkout.rua' => ['label' => 'endereco', 'rules' => 'required|string|max_length[50]'],
                'checkout.numero' => ['label' => 'numero', 'rules' => 'required|string|max_length[30]'],
                'checkout.referencia' => ['label' => 'referencia', 'rules' => 'required|string|max_length[30]'],
                'checkout.forma_id' => ['label' => 'forma de pagamento', 'rules' => 'required|integer'],
                'checkout.bairro_slug' => ['label' => 'endereco de entrega', 'rules' => 'required|string|max_length[30]'],

            ]);

            if (!$this->validacao->withRequest($this->request)->run()) {

                session()->remove('endereco_entrega');

                return redirect()->back()->with('errors_model', $this->validacao->getErrors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }

            $forma = $this->formaPagamentoModel->where('id', $checkoutPost['forma_id'])->where('ativo', true)->first();

            if($forma == null){
                return redirect()->back()
                    ->with('atencao', 'Por favor, escolha a forma de pagamento.');
            }

            $bairro = $this->bairroModel->where('slug', $checkoutPost['bairro_slug'])->where('ativo', true)->first();

            if($bairro == null){
                return redirect()->back()
                    ->with('atencao', 'Por favor, informe seu CEP e tente novamente.');
            }

            if(!session()->get('endereco_entrega')){
                return redirect()->back()
                ->with('atencao', 'Por favor, informe seu CEP e tente novamente.');
            }

            //salva pedido

            $pedido = new \App\Entities\Pedido();

            $pedido->usuario_id = $this->usuario->id;
            $pedido->forma_pagamento = $forma->nome;
            $pedido->produtos = serialize(session()->get('carrinho'));
            $pedido->valor_produtos = number_format($this->somaValorProdutosCarrinho(), 2);
            $pedido->valor_entrega = number_format($bairro->valor_entrega, 2);
            $pedido->valor_pedido = number_format($pedido->valor_produtos + $pedido->valor_entrega, 2);
            $pedido->codigo = $this->pedidoModel->geraCodigoPedido();
            $pedido->endereco_entrega = session()->get('endereco_entrega').'- Número ' . $checkoutPost['numero'];

            if($forma->id == 1) {
                if (isset($checkoutPost['sem_troco'])){
                    $pedido->observacoes = 'Ponto de referência: '.$checkoutPost['referencia'].' - Número: '.$checkoutPost['numero'] . '. Você informou que não precisa de troco.';
                }
                
                if (isset($checkoutPost['troco_para'])) {

                    if($checkoutPost['troco_para'] == "" || strlen($checkoutPost['troco_para'] < 1)){
                        return redirect()->back()->with('atencao', 'Você precisa preenhcer o campo "enviar troco para" ou marcar que não é preciso de troco.');
                } 
                    $trocoPara = str_replace(',', '', $checkoutPost['troco_para']);

                    $pedido->observacoes = 'Ponto de referência: '.$checkoutPost['referencia'].' - Número: '.$checkoutPost['numero'] . '. Você informou que precisa de troco para: R$' . number_format($trocoPara, 2, ',', '.');
                
            }

            echo '<pre>';
            print_r($pedido);
            exit;

        } else {
            return redirect()->back();
        }
    }
}

    //funcao pra somar os valores
    private function somaValorProdutosCarrinho()
    {
        $carrinho = session()->get('carrinho');

        if (empty($carrinho) || !is_array($carrinho)) {
            return 0;
        }

        $produtosCarrinho = array_map(function ($linha) {
            return (isset($linha['quantidade']) ? $linha['quantidade'] : 0) * 
                (isset($linha['preco']) ? $linha['preco'] : 0);
        }, $carrinho);

        return array_sum($produtosCarrinho);
    }

}
