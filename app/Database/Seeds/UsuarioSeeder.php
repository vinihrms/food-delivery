<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Dados a serem inseridos
        $data = [
            [
                'id'              => 1,
                'nome'            => 'admin',
                'email'           => 'admin@admin.com',
                'cpf'             => '000.000.000-00',
                'telefone'        => '(00) 00000-0000',
                'is_admin'        => 1,
                'ativo'           => 1,
                'password_hash'   => '$2y$10$J9.NIxV5UGpGcond7IGeqOBDNdHklslCKaBPsEVNdRFFyWOq5UjtC',
                'ativacao_hash'   => NULL,
                'reset_hash'      => NULL,
                'reset_expira_em' => NULL,
                'criado_em'       => '2024-03-11 11:28:24',
                'atualizado_em'   => '2024-04-04 20:30:05',
                'deletado_em'     => NULL
            ]
        ];

        // Inserir os dados na tabela
        $this->db->table('usuarios')->insertBatch($data);
    }
}