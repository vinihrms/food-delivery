<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pedido extends Entity
{
    protected $datamap = [];
    protected $dates   = ['criado_em', 'atualizado_em', 'deletado_em'];
    protected $casts   = [];

    public function exibeSituacaoPedido() {
        switch ($this->situacao) {
            case 0:
                echo "<span class='glyphicon glyphicon-thumbs-up' aria-hidden='true'></span>&nbsp; Pedido realizado";
            break;
            case 1:
                echo "<span class='glyphicon glyphicon-home' aria-hidden='true'></span>&nbsp; Pedido saiu para a entrega";
            break;
            case 2:
                echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>&nbsp; Pedido entregue";
            break;
            case 3:
                echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>&nbsp; Pedido cancelado";
            break;
        }
    }
}
