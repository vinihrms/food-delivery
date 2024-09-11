<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Carrinho extends BaseController
{
    private $produtoEspecificacaoModel;
    private $extraModel;
    private $produtoModel;
    private $medidaModel;
    private $acao;

    private $validacao;

    public function __construct()
    {
        $this->validacao = service('validation');
        $this->produtoEspecificacaoModel = new \App\Models\ProdutoEspecificacaoModel();
        $this->extraModel = new \App\Models\ExtraModel();
        $this->produtoModel = new \App\Models\ProdutoModel();
        $this->medidaModel = new \App\Models\MedidaModel();

        $this->acao = service('router')->methodName();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Meu carrinho de compras',

        ];

        if (session()->has('carrinho') && count(session()->get('carrinho')) > 0) {
            $data['carrinho'] = json_decode(json_encode(session()->get('carrinho')), false);
        }

        return view('Carrinho/index', $data);
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

            $produto = $this->produtoModel->select(['id', 'nome', 'slug', 'ativo'])->where('slug', $produtoPost['slug'])->first();

            

            
            if ($produto == null || $produto->ativo == false) {
                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-PROD-159 </strong>"); // FRAUDE FORMULARIO
            }

            $produto = $produto->toArray();


            // slug composto para identificar os itens no carrinho para adicionar
            $produto['slug'] = mb_url_title($produto['slug'] . '-' . $especificacaoProduto->nome . '-' . (isset($extra) ? 'com extra-' . $extra->nome : ''), '-', true);

            //
            $produto['nome'] = $produto['nome'] . ' ' . $especificacaoProduto->nome . ' ' . (isset($extra) ? 'com extra ' . $extra->nome : '');

            // preco, quantiade e tamanho
            $preco = $especificacaoProduto->preco + (isset($extra) ? $extra->preco : 0);
            $produto['preco'] = number_format($preco, 2);
            $produto['quantidade'] = (int) $produtoPost['quantidade'];
            $produto['tamanho'] = $especificacaoProduto->nome;

            unset($produto['ativo']); // atibuto ativo nao tem utilidade nesta parte

            // start insersao do produto no carrinho
            if (session()->has('carrinho')) {
                // existe carrinho de compras

                $produtos = session()->get('carrinho');

                // recupera os slugs dos produtos do carrinho
                $produtosSlugs = array_column($produtos, 'slug');

                if (in_array($produto['slug'], $produtosSlugs)) {
                    // ja esta no carrinho, incrementa a quantidade
                    $produtos = $this->atualizaProduto($this->acao, $produto['slug'], $produto['quantidade'], $produtos);

                    //sobrescreve a sessao do carrinho com o array $produtos que foi alterado
                    session()->set('carrinho', $produtos);
                } else {
                    // nao existe, pode adicionar
                    session()->push('carrinho', [$produto]);
                }
            } else {
                // aqui nao existe carrinho de compras na sessao

                $produtos[] = $produto;

                session()->set('carrinho', $produtos);
            }

            return redirect()->to(site_url('carrinho'))->with('sucesso', 'Produto adicionado ao carrinho com sucesso!');
        } else {
            return redirect()->back();
        }
    }

    public function especial()
    {
        if ($this->request->getMethod() === 'post') {

            $produtoPost = $this->request->getPost();

            $this->validacao->setRules([
                'primeira_metade' => ['label' => 'primeiro produto', 'rules' => 'required|greater_than[0]'],
                'segunda_metade' => ['label' => 'segundo produto', 'rules' => 'required|greater_than[0]'],
                'tamanho' => ['label' => 'tamanho do produto', 'rules' => 'required|greater_than[0]'],
            ]);

            if (!$this->validacao->withRequest($this->request)->run()) {

                return redirect()->back()->with('errors_model', $this->validacao->getErrors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }

            $primeiroProduto = $this->produtoModel->select(['id', 'nome', 'slug'])
                ->where('id', $produtoPost['primeira_metade'])
                ->first();

            if ($primeiroProduto == null) {
                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-CUST-199 </strong>"); // FRAUDE FORMULARIO
            }

            $segundoProduto = $this->produtoModel->select(['id', 'nome', 'slug'])
                ->where('id', $produtoPost['segunda_metade'])
                ->first();

            if ($segundoProduto == null) {
                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-CUST-200 </strong>"); // FRAUDE FORMULARIO
            }

            //convertendo os objetos para array
            $primeiroProduto = $primeiroProduto->toArray();
            $segundoProduto = $segundoProduto->toArray();

            if ($produtoPost['extra_id'] && $produtoPost['extra_id'] != "") {
                $extra = $this->extraModel->where('id', $produtoPost['extra_id'])->first();

                if ($extra == null) {
                    return redirect()->back()
                        ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-CUST-827 </strong>"); // FRAUDE FORMULARIO
                }
            }

            $medida = $this->medidaModel->exibeValor($produtoPost['tamanho']);

            if ($medida->preco == null) {
                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ADD-CUST-828 </strong>"); // FRAUDE FORMULARIO
            }

            // slug composto para identificar os itens no carrinho para adicionar
            $produto['slug'] = mb_url_title($medida->nome . '-metade-' .  $primeiroProduto['slug'] . '-metade-' . $segundoProduto['slug'] . '-' . (isset($extra) ? 'com extra-' . $extra->nome : ''), '-', true);
            $produto['nome'] = $medida->nome . ' metade ' .  $primeiroProduto['nome'] . ' metade ' . $segundoProduto['nome'] . ' ' . (isset($extra) ? 'com extra ' . $extra->nome : '');

            // preco, quantiade e tamanho
            $preco = $medida->preco + (isset($extra) ? $extra->preco : 0);

            $produto['preco'] = number_format($preco, 2);
            $produto['quantidade'] = 1; //sempre sera 1 na custom
            $produto['tamanho'] = $medida->nome;

            if (session()->has('carrinho')) {
                // existe carrinho de compras

                $produtos = session()->get('carrinho');

                // recupera os slugs dos produtos do carrinho
                $produtosSlugs = array_column($produtos, 'slug');

                if (in_array($produto['slug'], $produtosSlugs)) {
                    // ja esta no carrinho, incrementa a quantidade
                    $produtos = $this->atualizaProduto($this->acao, $produto['slug'], $produto['quantidade'], $produtos);

                    //sobrescreve a sessao do carrinho com o array $produtos que foi alterado
                    session()->set('carrinho', $produtos);
                } else {
                    // nao existe, pode adicionar
                    session()->push('carrinho', [$produto]);
                }
            } else {
                // aqui nao existe carrinho de compras na sessao

                $produtos[] = $produto;

                session()->set('carrinho', $produtos);
            }

            return redirect()->to(site_url('carrinho'))->with('sucesso', 'Produto adicionado ao carrinho com sucesso!');
        } else {
            return redirect()->back();
        }
    }

    public function atualizar()
    {
        if ($this->request->getMethod() == 'post') {

            $produtoPost = $this->request->getPost('produto');


            $this->validacao->setRules([
                'produto.slug' => ['label' => 'Produto', 'rules' => 'required|string'],
                'produto.quantidade' => ['label' => 'Quantidade', 'rules' => 'required|greater_than[0]'],

            ]);

            if (!$this->validacao->withRequest($this->request)->run()) {

                return redirect()->back()->with('errors_model', $this->validacao->getErrors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }

            $produtos = session()->get('carrinho');

            // recupera os slugs dos produtos do carrinho
            $produtosSlugs = array_column($produtos, 'slug');

            if (!in_array($produtoPost['slug'], $produtosSlugs)) {

                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ATT-CARR-223 </strong>"); // FRAUDE FORMULARIO
            } else {

                //PRODUTO VALIDADO E ATUALIZA A QUANTIDADE DO MESMO NO CARRINHO

                // ja esta no carrinho, incrementa a quantidade
                $produtos = $this->atualizaProduto($this->acao, $produtoPost['slug'], $produtoPost['quantidade'], $produtos);

                //sobrescreve a sessao do carrinho com o array $produtos que foi alterado
                session()->set('carrinho', $produtos);

                return redirect()->back()->with('sucesso', 'Quantidade atualizada com sucesso!');

            }
        } else {
            return redirect()->back();
        }
    }

    public function remover()  {
        if ($this->request->getMethod() == 'post') {

            $produtoPost = $this->request->getPost('produto');


            $this->validacao->setRules([
                'produto.slug' => ['label' => 'produto', 'rules' => 'required|string'],

            ]);

            if (!$this->validacao->withRequest($this->request)->run()) {

                return redirect()->back()->with('errors_model', $this->validacao->getErrors())
                    ->with('atencao', 'Por favor, verifique os errors abaixo e tente novamente.')
                    ->withInput();
            }

            $produtos = session()->get('carrinho');

            // recupera os slugs dos produtos do carrinho
            $produtosSlugs = array_column($produtos, 'slug');

            if (!in_array($produtoPost['slug'], $produtosSlugs)) {

                return redirect()->back()
                    ->with('fraude', "Não conseguimos processar a sua solicitação. Entre em contato com a nossa equipe e informe o codigo de erro. <strong> Erro: ATT-CARR-223 </strong>"); // FRAUDE FORMULARIO
            } else {

                $produtos = $this->removeProduto($produtos, $produtoPost['slug']);

                session()->set('carrinho', $produtos);

                return redirect()->back()->with('sucesso', 'Produto removido com sucesso!');

            }
        } else {
            return redirect()->back();
        }
    }

    public function limpar()  {
        session()->remove('carrinho');

        return redirect()->to(site_url('carrinho'));
    }

    public function consultaCep () {
        if(!$this->request->isAJAX()){
            return redirect()->back();
        }

        $get = $this->request->getGet('cep');

        $this->validacao->setRule('cep', 'CEP', 'required|exact_length[9]')
    }

    private function atualizaProduto(string $acao, string $slug, int $quantidade, array $produtos)
    {
        $produtos = array_map(
            function ($linha) use ($acao, $slug, $quantidade) {

                if ($linha['slug'] == $slug) {

                    if ($acao === 'adicionar') {

                        $linha['quantidade'] += $quantidade;
                    }

                    if ($acao === 'especial') {

                        $linha['quantidade'] += $quantidade;
                    }

                    if ($acao === 'atualizar') {

                        $linha['quantidade'] = $quantidade;
                    }
                }

                return $linha;
            },
            $produtos
        );

        return $produtos;
    }

    private function removeProduto(array $produtos, string $slug){
        return array_filter($produtos, function($linha) use($slug){
            return $linha['slug'] != $slug;
        });
    }
}
