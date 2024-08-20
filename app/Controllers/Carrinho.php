<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Carrinho extends BaseController
{

    private $validacao;

    public function __construct()
    {
        $this->validacao = service('validation');
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
        } else {
            return redirect()->back();
        }
    }
}
