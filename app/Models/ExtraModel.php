<?php

namespace App\Models;

use CodeIgniter\Model;

class ExtraModel extends Model
{
    protected $table            = 'extras';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Extra';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nome', 'slug', 'ativo', 'preco', 'descricao'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    // Validation
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[4]|is_unique[extras.nome]',

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 4 caracteres.',
            'is_unique' => 'Esse extra já está cadastrado.'
        ],
    ];

    //eventos callback
    protected $beforeInsert = ['criaSlug'];
    protected $beforeUpdate = ['criaSlug'];

    protected function criaSlug(array $data) {

        if(isset($data['data']['nome'])){
            $data['data']['slug'] = mb_url_title($data['data']['nome'], '-', true);
            
        }
        return $data;
    }

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
