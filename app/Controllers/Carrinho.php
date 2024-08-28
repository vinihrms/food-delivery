<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Carrinho extends BaseController
{
    private $produtoEspecificacaoModel;
    private $extraModel;
    private $produtoModel;
    private $acao;

    private $validacao;

    public function __construct()
    {
        $this->validacao = service('validation');
        $this->produtoEspecificacaoModel = new \App\Models\ProdutoEspecificacaoModel();
        $this->extraModel = new \App\Models\ExtraModel();
        $this->produtoModel = new \App\Models\ProdutoModel();
        
        $this->acao = service('router')->methodName();
    }


    public function index()
    {
        //
    }

    public function adicionar()
    {

        if ($this->request->getMethod() === 'post') {

            $produtoPost = $this->request->getPost('produto');

            $this->validacao->setRules([
                'produto.slug' => ['label' => 'Produto', 'rules' => 'required|string'],
                'produto.preco' => ['label' => 'Valor', 'rules' => 'required|greater_than[0]'],
                'produto.especificacao_id' => ['label' => 'Valor', 'rules' => 'required|greater_than[0]'],
                'produto.quantidade' => ['label' => 'Quantidade', 'rules' => 'required|greater_than[0]'],

            ]);

            if (!$this->validacao->withRequest($this->request)->run()) {

                return redirect()->back()->with('errors_model', $this->validacao->getErrors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }

            //valida existencia da especificacao id
            $especificacaoProduto = $this->produtoEspecificacaoModel
            ->join('medidas', 'medidas.id = produtos_especificacoes.medida_id')
            ->where('produtos_especificacoes.id', $produtoPost['especificacao_id'])->first();


            if ($especificacaoProduto == null) {
                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-PROD-157 </strong>"); // FRAUDE FORMULARIO
            }

            if ($produtoPost['extra_id'] && $produtoPost['extra_id'] != "") {
                $extra = $this->extraModel->where('id', $produtoPost['extra_id'])->first();

                if ($extra == null) {
                    return redirect()->back()
                        ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-PROD-158 </strong>"); // FRAUDE FORMULARIO
                }
            }

            
            $produto = $this->produtoModel->select(['id', 'nome', 'slug', 'ativo'])->where('slug', $produtoPost['slug'])->first()->toArray();


            if ($produto == null || $produto['ativo'] == false) {
                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-PROD-159 </strong>"); // FRAUDE FORMULARIO
            }
            // slug composto para identificar os itens no carrinho para adicionar
            $produto['slug'] = mb_url_title($produto['slug'] . '-'. $especificacaoProduto->nome . '-' . (isset($extra) ? 'com extra-' . $extra->nome : ''), '-', true);

            //
            $produto['nome'] = $produto['nome'] . ' ' . $especificacaoProduto->nome . ' ' . (isset($extra) ? 'com extra ' . $extra->nome : '');

            // preco, quantiade e tamanho
            $preco = $especificacaoProduto->preco + (isset($extra) ? $extra->preco : 0);
            $produto['preco'] = number_format($preco, 2);
            $produto['quantidade'] = (int) $produtoPost['quantidade'];
            $produto['tamanho'] = $especificacaoProduto->nome;

            unset($produto['ativo']); // atibuto ativo nao tem utilidade nesta parte


            // start insersao do produto no carrinho
            if(session()->has('carrinho')){
                // existe carrinho de compras

                $produtos = session()->get('carrinho');

                // recupera os slugs dos produtos do carrinho
                $produtosSlugs = array_column($produtos, 'slug');

                if(in_array($produto['slug'], $produtosSlugs)){
                    // ja esta no carrinho, incrementa a quantidade
                    $produtos = $this->atualizaProduto($this->acao, $produto['slug'], $produto['quantidade'], $produtos);

                    //sobrescreve a sessao do carrinho com o array $produtos que foi alterado
                    session()->set('carrinho', $produtos);


                } else {
                    // nao existe, pode adicionar
                    session()->push('carrinho', [$produto]);

                }

            } else{
                // aqui nao existe carrinho de compras na sessao

                
                $produtos[] = $produto;

                session()->set('carrinho', $produtos);
            }

            return redirect()->back()->with('sucesso', 'Produto adicionado ao carrinho com sucesso!');
        } else {
            return redirect()->back();
        }   
    }

    private function atualizaProduto(string $acao, string $slug, int $quantidade, array $produtos){
        $produtos = array_map(
            function($linha) use ($acao, $slug, $quantidade){
            
                    if($linha['slug'] == $slug){

                    if($acao === 'adicionar'){

                        $linha['quantidade'] += $quantidade;

                    }

                    if($acao === 'atualizar'){

                        $linha['quantidade'] = $quantidade;

                    }
            } 

            return $linha;
        }, $produtos);

        return $produtos;

    }
}
