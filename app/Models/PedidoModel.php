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

    public function geraCodigoPedido()
    {
        do {

            $codigoPedido = random_string('numeric', 8);
            $this->where('codigo', $codigoPedido);
        } while ($this->countAllResults() > 1);

        return $codigoPedido;
    }

    public function listaTodosOsPedidos()
    {
        return $this->select([
            'pedidos.*',
            'usuarios.nome AS cliente',

        ])->join('usuarios', 'usuarios.id = pedidos.usuario_id')
            ->orderBy('pedidos.criado_em', 'DESC')
            ->paginate(10);
    }

    public function buscaPedidoOu404(string $codigoPedido)
    {

        if (! $codigoPedido) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o pedido $codigoPedido");
        }

        $pedido = $this->select(['pedidos.*', 'usuarios.nome', 'usuarios.email','entregadores.nome AS entregador'])
            ->join('usuarios', 'usuarios.id = pedidos.usuario_id')
            ->join('entregadores', 'entregadores.id = pedidos.entregador_id', 'LEFT')
            ->where('pedidos.codigo', $codigoPedido)
            ->first();

        if (! $pedido) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o pedido $codigoPedido");
        }

        return $pedido;
    }

    public function procurar($term)
    {
        if ($term === null) {
            return [];
        };

        return $this->select('codigo')
            ->like('codigo', $term)
            ->withDeleted(true)
            ->get()
            ->getResult();
    }
}
