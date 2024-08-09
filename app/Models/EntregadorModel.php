<?php

namespace App\Models;

use CodeIgniter\Model;

class EntregadorModel extends Model
{
    protected $table            = 'entregadores';
    protected $returnType       = 'App\Entities\Entregador';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [
        'nome',
        'cpf',
        'cnh',
        'email',
        'telefone',
        'imagem',
        'ativo',
        'veiculo',
        'placa',
        'endereco',
    ];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'criado_em';
    protected $updatedField  = 'atualizado_em';
    protected $deletedField  = 'deletado_em';

    // Validation
    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[4]',
        'email'        => 'required|max_length[254]|valid_email|is_unique[entregadores.email]',
        'cpf'        => 'required|exact_length[14]|is_unique[entregadores.cpf]|validaCpf',
        'cnh'        => 'required|exact_length[11]|is_unique[entregadores.cpf]',
        'telefone'        => 'required|exact_length[15]|is_unique[entregadores.telefone]',
        'endereco'        => 'required|max_lenght[230]',
        'veiculo'        => 'required|max_lenght[230]',
        'placa'        => 'required|min_lenght[7]|max_lenght[8]is_unique[entregadores.placa]',

    ];  
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O nome deve ter no mínimo 4 caracteres.',
        ],
        'telefone' => [
            'required' => 'O telefone é obrigatório.',
        ],
        'email' => [
            'required' => 'O e-mail é obrigatório.',
            'is_unique' => 'Desculpe. Este e-mail já está cadastrado.',
        ],
        'cpf' => [
            'required' => 'O cpf é obrigatório.',
            'is_unique' => 'Desculpe. Este cpf já está cadastrado.',
        ],
        'cnh' => [
            'required' => 'A cnh é obrigatória.',
            'is_unique' => 'Desculpe. Esta cnh já está cadastrada.',
        ],
        'telefone' => [
            'required' => 'O telefone é obrigatório.',
            'is_unique' => 'Desculpe. Este telefone já está cadastrado.',
            'exact_length' => 'O telefone deve ter o número exato de caracteres.'
        ],
        'endereco' => [
            'required' => 'O endereço é obrigatório.',
            'max_lenght' => 'O endereço não pode exceder 230 caracteres.',
        ],
        'veiculo' => [
            'required' => 'O veiculo é obrigatório.',
            'max_lenght' => 'O veiculo não pode exceder 230 caracteres.',
        ],
        'placa' => [
            'required' => 'A placa é obrigatória.',
            'is_unique' => 'Desculpe. Esta placa já está cadastrado.',
            'min_lenght' => 'A placa deve ter no minimo 7 caracteres.',
            'max_lenght' => 'A placa deve ter no maximo 8 caracteres.',
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
