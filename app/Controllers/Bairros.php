<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Bairros extends BaseController
{

    private $bairroModel;

    public function __construct()
    {
        $this->bairroModel = new \App\Models\BairroModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Bairros que atendemos',
            'bairros' => $this->bairroModel->where('ativo', true)->findAll()
        ];

        return view('Bairros/index', $data);
    }
}
