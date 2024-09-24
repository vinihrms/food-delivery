<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Checkout extends BaseController
{
    private $usuario;
    private $formaPagamentoModel;

    public function __construct() {
        $this->usuario = service('autenticacao')->pegaUsuarioLogado();
        $this->formaPagamentoModel = new \App\Models\FormaDePagamentoModel();
    }

    public function index()
    {
        if(!session()->has('carrinho') || count(session()->get('carrinho')) < 1){
            return redirect()->to(site_url('carrinho'));
        }

        $data = [
            'titulo' => 'Finalizar pedido',
            'carrinho' => session()->get('carrinho'),
            'formas' => $this->formaPagamentoModel->where('ativo', true)->findAll() 
        ];

        return view('Checkout/index', $data);
    }
}
