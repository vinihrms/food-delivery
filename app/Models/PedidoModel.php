<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $table            = 'pedidos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Pedido';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['usuario_id', 'entregador_id', 'codigo', 'forma_pagamento', 'situacao', 'produtos', 'valor_entrega', 'valor_produtos', 'valor_pedido', 'endereco_entrega', 'observacoes'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';
    // Validation

    public function geraCodigoPedido() {
        do{
            
            $codigoPedido = random_string('numeric', 8);
            $this->where('codigo', $codigoPedido);

        } while($this->countAllResults() > 1);

        return $codigoPedido;
    }
}
