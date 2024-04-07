<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table            = 'produtos';
    protected $primaryKey       = 'id';
    protected $returnType       = 'App\Entities\Produto';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['categoria_id', 'nome', 'slug', 'ingredientes', 'ativo', 'imagem'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[4]|is_unique[produtos.nome]',
        'ingredientes'     => 'required|max_length[1000]|min_length[10]',
        'categoria_id' => 'required|integer'

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 4 caracteres.',
            'is_unique' => 'Esse produto já está cadastrada.'
        ],
        'ingredientes' => [
            'required' => 'Os ingredientes são obrigatórios.',
            'min_length' => 'O campo ingredientes deve ter no mínimo 10 caracteres.',
        ],
        'categoria_id' => [
            'required' => 'A categoria do produto é obrigatória.',
            'integer' => 'Escolha uma categoria válida',
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
