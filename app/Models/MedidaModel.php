<?php

namespace App\Models;

use CodeIgniter\Model;

class MedidaModel extends Model
{
    protected $table            = 'medidas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Medida';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'ativo', 'descricao'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[4]|is_unique[medidas.nome,id,{id}]',

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 4 caracteres.',
            'is_unique' => 'Essa medida já está cadastrada.'
        ],

    ];

    public function procurar($term)
    {
        if ($term === null) {
            return [];
        };

        return $this->select('id, nome')
            ->like('nome', $term)
            ->withDeleted(true)
            ->get()
            ->getResult();
    }

    public function desfazerexclusao(int $id)
    {
        return $this->protect(false)->where('id', $id)
            ->set('deletado_em', null)
            ->update();
    }

    //busca o maior valor dos produtos escolhidos
    public function exibeValor(int $medida_id)
    {
        return $this->selectMax('produtos_especificacoes.preco')
            ->join('produtos_especificacoes', 'produtos_especificacoes.medida_id = medidas.id')
            ->where('medidas.id', $medida_id)
            ->where('medidas.ativo', true)
            ->first();
    }
}
