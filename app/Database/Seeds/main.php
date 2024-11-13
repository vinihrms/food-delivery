<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Main extends Seeder
{
    public function run()
    {
        //USUARIO ADMINISTRADOR
        $admin = [
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

        $this->db->table('usuarios')->insertBatch($admin);


        //FORMA DE PAGAMENTO DINHEIRO
        $formaModel = new \App\Models\FormaDePagamentoModel();
        $forma = [
            'nome' => 'Dinheiro',
            'ativo' => true
        ];

        $formaModel->skipValidation(true)->insert($forma);

        //EXPEDIENTES - BASE
        $expedienteModel = new \App\Models\ExpedienteModel();

        $expedientes = [
            [
                'dia' => '0',
                'dia_descricao' => 'Domingo',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
            [
                'dia' => '1',
                'dia_descricao' => 'Segunda-Feira',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
            [
                'dia' => '2',
                'dia_descricao' => 'Terça-Feira',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
            [
                'dia' => '3',
                'dia_descricao' => 'Quarta-Feira',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
            [
                'dia' => '4',
                'dia_descricao' => 'Quinta-Feira',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
            [
                'dia' => '5',
                'dia_descricao' => 'Sexta-Feira',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
            [
                'dia' => '6',
                'dia_descricao' => 'Sábado',
                'abertura' => '18:00:00',
                'fechamento' => '23:00:00',
                'situacao' => true,
            ],
        ];

        foreach($expedientes as $expediente){
            $expedienteModel->protect(false)->insert($expediente);
        }
    }
}
