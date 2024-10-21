<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Checkout extends BaseController
{
    private $usuario;
    private $formaPagamentoModel;
    private $bairroModel;

    public function __construct()
    {
        $this->usuario = service('autenticacao')->pegaUsuarioLogado();
        $this->formaPagamentoModel = new \App\Models\FormaDePagamentoModel();
        $this->bairroModel = new \App\Models\BairroModel();
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
        $retorno['bairro_slug'] = $bairro->slig;
        $retorno['total'] = number_format($this->somaValorProdutosCarrinho() + $bairro->valor_entrega, 2);

        session()->set('endereco_entrega', $retorno['endereco']);
        return $this->response->setJSON($retorno);
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
