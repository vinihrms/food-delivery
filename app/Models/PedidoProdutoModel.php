<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoProdutoModel extends Model
{
    protected $table            = 'pedidos_produtos';
    protected $returnType       = 'object';
    protected $allowedFields    = ['pedido_id', 'produto', 'quantidade'];

    protected bool $allowEmptyInserts = false;

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
