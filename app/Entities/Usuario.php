<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

use App\Libraries\Token;

class Usuario extends Entity
{
    protected $dates   = ['criado_em', 'atualizado_em', 'deletado_em'];

    public function verificaPassword(string $password){
        return password_verify($password, $this->password_hash);
    }

    public function iniciaPasswordReset(){

        $token = new Token();

        $this->reset_token = $token->getValue();

        $this->reset_hash = $token->getHash();

        $this->reset_expira_em = date('Y-m-d H:i:s', time() + 7200); //expira em 2 horas a partir da data e hora atual (momento que foi gerado)

    }

    public function completaPaswordReset(){
        $this->reset_hash = null;
        $this->reset_expira_em = null;
    }

}
