<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Entities\Extra;

class Extras extends BaseController
{

    private $extraModel;

    public function __construct() {
        $this->extraModel = new \App\Models\ExtraModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando os extras de produtos',
            'extras' => $this->extraModel->withDeleted(true)->paginate(8),
            'pager' => $this->extraModel->pager
        ];

        return view('Admin/Extras/index', $data);
    }
}
