<?php

namespace App\Models;

use CodeIgniter\Model;

class BairroModel extends Model
{
    protected $table            = 'bairros';
    protected $returnType       = 'App\Entities\Bairro';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nome', 'slug', 'ativo', 'valor_entrega'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[2]|is_unique[bairros.nome]',
        'cidade'     => 'required|equals[Corbélia]',
        'valor_entrega'     => 'required',

    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 2 caracteres.',
            'is_unique' => 'Essa bairro já está cadastrado.'
        ],
        'cidade' => [
            'required' => 'A cidade é obrigatório.',
            'equals' => 'Essa aplicação ainda não aceita outra cidades. Se você deseja adicionar esta opção, contate o suporte técnico.',
        ],
        'valor_entrega' => [
            'required' => 'O valor de entrega é obrigatório.',
            'max_length' => 'O valor deve ter no máximo 6 caracteres.',

        ],
    ];

    //eventos callback
    protected $beforeInsert = ['criaSlug'];
    protected $beforeUpdate = ['criaSlug'];

    protected function criaSlug(array $data)
    {

        if (isset($data['data']['nome'])) {
            $data['data']['slug'] = mb_url_title($data['data']['nome'], '-', true);
        }
        return $data;
    }

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
}
