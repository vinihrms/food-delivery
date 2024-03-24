<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
            "nome" => "Vncs Hrms",
            "email" => "vncs@gmail.com",
            "cpf" => "625.865.820-20",
            "telefone" => "45 - 777-666"
        ];
        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            "nome" => "kanye",
            "email" => "kanye@gmail.com",
            "cpf" => "235.424.610-24",
            "telefone" => "11111"
        ];
        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}
