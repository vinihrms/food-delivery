<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Entities\Entregador;

class Entregadores extends BaseController
{
    
    private $entregadorModel;

    public function __construct()
    {
        $this->entregadorModel = new \App\Models\EntregadorModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando os entregadores',
            'entregadores' => $this->entregadorModel->withDeleted(true)->paginate(10),
            'pager' => $this->entregadorModel->pager
        ];

        return view('Admin/Entregadores/index', $data);
    }
}
