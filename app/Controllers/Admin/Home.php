<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{

    private $pedidoModel;
    private $usuarioModel;
    private $entregadorModel;

    public function __construct()
    {
        $this->pedidoModel = new \App\Models\PedidoModel();
        $this->usuarioModel = new \App\Models\UsuarioModel();
        $this->entregadorModel = new \App\Models\EntregadorModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Home da área restrita',
            'valorPedidosEntregues' => $this->pedidoModel->valorPedidosEntregues(),
            'valorPedidosCancelados' => $this->pedidoModel->valorPedidosCancelados(),
            'recuperaTotalClientesAtivos' => $this->usuarioModel->recuperaTotalClientesAtivos(),
            'recuperaTotalEntregadoresAtivos' => $this->entregadorModel->recuperaTotalEntregadoresAtivos(),
        ];

        $novosPedidos = $this->pedidoModel->where('situacao', 0)->orderBy('criado_em', 'DESC')->findAll();

        if(!empty($novosPedidos)){
            $data['novosPedidos'] = $novosPedidos;
        }

        return view('Admin/Home/index', $data);
    }
}
