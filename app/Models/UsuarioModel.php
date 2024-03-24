<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $returnType = 'App\Entities\Usuario';
    protected $allowedFields = ["nome", "email", "telefone"];
    protected $useSoftDeletes = true;
    protected $useTimestamps = true;
    protected $createdField = 'criado_em';
    protected $updatedField = 'atualizado_em';
    protected $deletedField = 'deletado_em';

    protected $validationRules = [
        'nome'     => 'required|max_length[120]|alpha_numeric_space|min_length[4]',
        'telefone'     => 'required',
        'email'        => 'required|max_length[254]|valid_email|is_unique[usuarios.email]',
        'cpf'        => 'required|exact_length[14]|is_unique[usuarios.cpf]',
        'password'     => 'required|max_length[255]|min_length[6]',
        'confirm_password' => 'required_with[password]|max_length[255]|matches[password]',
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
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
    ];

    //eventos callback
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];


    public function procurar($term) {
        if($term === null){
            return [];
        };

        return $this->select('id, nome')
                ->like('nome', $term)
                ->get()
                ->getResult();
    }

    public function desabilitaValidacaoSenha() {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

    protected function hashPassword(array $data) {

        if(isset($data['data']['password'])){
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
            
        }
        return $data;
    }
}