<?php

namespace App\Models;

use CodeIgniter\Model;

class FormaDePagamentoModel extends Model
{
    protected $table            = 'formas_pagamento';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true;

    protected $returnType       = 'App\Entities\FormaPagamento';

    protected $allowedFields    = ['nome', 'ativo'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[3]|is_unique[formas_pagamento.nome,id,{id}]',

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 3 caracteres.',
            'is_unique' => 'Essa forma de pagamento já está cadastrada.'
        ],

    ];

    
    public function procurar($term) {
        if($term === null){
            return [];
        };

        return $this->select('id, nome')
                ->like('nome', $term)
                ->withDeleted(true)
                ->get()
                ->getResult();
    }

    public function desfazerexclusao(int $id){
        return $this->protect(false)->where('id', $id)
                                    ->set('deletado_em', null)
                                    ->update();
    }
    
}
