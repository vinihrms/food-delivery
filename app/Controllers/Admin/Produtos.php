<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Entities\Produto;


class Produtos extends BaseController
{
    private $produtoModel;

    public function __construct(){
        $this->produtoModel = new \App\Models\ProdutoModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando aos produtos',
            'produtos' => $this->produtoModel->select('produtos.*, categorias.nome AS categoria')
                                            ->join('categorias', 'categorias.id = produtos.categoria_id')
                                            ->withDeleted(true)->paginate(8),
            'pager' => $this->produtoModel->pager
        ];

        return view('Admin/Produtos/index', $data);
    }
}
