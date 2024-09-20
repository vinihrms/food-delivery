<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Conta extends BaseController
{   
    private $usuario;

    public function __construct()
    {
        $this->usuario = service('autenticacao')->pegaUsuarioLogado();
    }

    public function index()
    {
        
    }

    public function show(){
        $data = [
            'titulo' => 'Meus dados',
            'usuario' => $this->usuario
        ];

        return view('Conta/show', $data);
    }
}
