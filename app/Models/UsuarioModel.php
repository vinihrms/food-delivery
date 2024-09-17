<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Libraries\Token;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $returnType = 'App\Entities\Usuario';
    protected $allowedFields = ['nome', 'email', 'telefone', 'cpf', 'password', 'reset_hash', 'reset_expira_em', 'ativacao_hash'];

    //dates
    protected $useTimestamps = true;
    protected $createdField = 'criado_em';
    protected $updatedField = 'atualizado_em';
    protected $dateFormat = 'datetime'; //uso com o useSoftDeletes
    protected $useSoftDeletes = true;
    protected $deletedField = 'deletado_em';

    

    protected $validationRules = [
        'nome'     => 'required|max_length[120]|min_length[4]',
        'telefone'     => 'required',
        'email'        => 'required|max_length[254]|valid_email|is_unique[usuarios.email]',
        'cpf'        => 'required|exact_length[14]|is_unique[usuarios.cpf]|validaCpf',
        'password'     => 'required|max_length[255]|min_length[6]',
        'password_confirmation' => 'required_with[password]|max_length[255]|matches[password]',
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
        'password' => [
            'required' => 'A senha é obrigatoria.',
            'min_length' => 'A senha deve ter no mínimo 6 caracteres.'
        ],
        'password_confirmation' => [
            'matches' => 'As senhas devem ser iguais.',
            'required_with' => 'A confirmação de senha é obrigatória.'
        ],
    ];

    //eventos callback
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data) {

        if(isset($data['data']['password'])){
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
            
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

    public function desabilitaValidacaoSenha() {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

    public function desabilitaValidacaoTelefone() {
        unset($this->validationRules['telefone']);

    }


    public function desfazerexclusao(int $id){
        return $this->protect(false)->where('id', $id)
                                    ->set('deletado_em', null)
                                    ->update();
    }

    /**
        *reotrna obj usuario
        *pelo email
     */
    public function buscaUsuarioPorEmail(string $email) {
        return $this->where('email', $email)->first();
    }

    public function buscaUsuarioParaResetarSenha(string $token){

        $token = new Token($token);

        $tokenHash = $token->getHash();

        $usuario = $this->where('reset_hash', $tokenHash)->first();

        if($usuario != null){
            
            if($usuario->reset_expira_em < date('Y-m-d H:i:s')){

                $usuario = null;
            }

            return $usuario;

        }

    }

    public function ativarContaPeloToken(string $token){
        $token = new Token($token);
        $token_hash = $token->getHash();
    
        $usuario = $this->where('ativacao_hash', $token_hash)->first();
    
        if($usuario != null){
            $usuario->ativar();
            $this->protect(false)->save($usuario);
            return true; 
        }
        return false; 
    }
    
    
    
}