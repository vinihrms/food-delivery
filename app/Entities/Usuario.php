<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
    protected $dates   = ['criado_em', 'atualizado_em', 'deletado_em'];

    public function verificaPassword(string $password){
        return password_verify($password, $hash, $this->password_hash);
    }
}
