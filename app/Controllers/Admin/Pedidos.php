<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pedidos extends BaseController
{

    private $pedidoModel;


    public function __construct()
    {
        $this->pedidoModel = new \App\Models\PedidoModel();

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

    
}
