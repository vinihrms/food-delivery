<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    protected $usuario;

    public function __construct() {
        $this->usuario = service('autenticacao')->pegaUsuarioLogado();
    }
    public function index()
    {

        $nomeUsuario = $this->usuario->nome;

        $data = [
            'titulo' => 'Home da área restrita',
            'usuario' => $nomeUsuario
        ];

        return view('Admin/Home/index', $data);
    }
}
