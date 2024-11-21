<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Bairros extends Seeder
{
    public function run()
    {
        $bairros = [
            ['id' => 1, 'nome' => 'Água Verde', 'cidade' => 'Curitiba', 'slug' => 'agua-verde', 'valor_entrega' => 25.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 2, 'nome' => 'Ahú', 'cidade' => 'Curitiba', 'slug' => 'ahu', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 3, 'nome' => 'Centro', 'cidade' => 'Curitiba', 'slug' => 'centro', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 4, 'nome' => 'Alto da Glória', 'cidade' => 'Curitiba', 'slug' => 'alto-da-gloria', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 5, 'nome' => 'Alto da Rua XV', 'cidade' => 'Curitiba', 'slug' => 'alto-da-rua-xv', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 6, 'nome' => 'Bacacheri', 'cidade' => 'Curitiba', 'slug' => 'bacacheri', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 7, 'nome' => 'Portão', 'cidade' => 'Curitiba', 'slug' => 'portao', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 8, 'nome' => 'Cristo Rei', 'cidade' => 'Curitiba', 'slug' => 'cristo-rei', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 9, 'nome' => 'Bairro Alto', 'cidade' => 'Curitiba', 'slug' => 'bairro-alto', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 10, 'nome' => 'Batel', 'cidade' => 'Curitiba', 'slug' => 'batel', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 11, 'nome' => 'Bigorrilho', 'cidade' => 'Curitiba', 'slug' => 'bigorrilho', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 12, 'nome' => 'Boa Vista', 'cidade' => 'Curitiba', 'slug' => 'boa-vista', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 13, 'nome' => 'Bom Retiro', 'cidade' => 'Curitiba', 'slug' => 'bom-retiro', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 14, 'nome' => 'Cabral', 'cidade' => 'Curitiba', 'slug' => 'cabral', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 15, 'nome' => 'Cajuru', 'cidade' => 'Curitiba', 'slug' => 'cajuru', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 16, 'nome' => 'Capão da Imbuia', 'cidade' => 'Curitiba', 'slug' => 'capao-da-embuia', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 17, 'nome' => 'Centro Cívico', 'cidade' => 'Curitiba', 'slug' => 'centro-civico', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 18, 'nome' => 'Guabirotuba', 'cidade' => 'Curitiba', 'slug' => 'guabirotuba', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 19, 'nome' => 'Hugo Lange', 'cidade' => 'Curitiba', 'slug' => 'hugo-langue', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 20, 'nome' => 'Jardim Botânico', 'cidade' => 'Curitiba', 'slug' => 'jardim-botanico', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 21, 'nome' => 'Jardim das Américas', 'cidade' => 'Curitiba', 'slug' => 'jardim-das-americas', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 22, 'nome' => 'Jardim Social', 'cidade' => 'Curitiba', 'slug' => 'jardim-social', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 23, 'nome' => 'Juvevê', 'cidade' => 'Curitiba', 'slug' => 'juveve', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 24, 'nome' => 'Mercês', 'cidade' => 'Curitiba', 'slug' => 'merces', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 25, 'nome' => 'Parolin', 'cidade' => 'Curitiba', 'slug' => 'parolim', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 26, 'nome' => 'Prado Velho', 'cidade' => 'Curitiba', 'slug' => 'prado-velho', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 27, 'nome' => 'Rebouças', 'cidade' => 'Curitiba', 'slug' => 'reboucas', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 28, 'nome' => 'São Francisco', 'cidade' => 'Curitiba', 'slug' => 'sao-francisco', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 29, 'nome' => 'São Lourenço', 'cidade' => 'Curitiba', 'slug' => 'sao-lourenco', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 30, 'nome' => 'Tarumã', 'cidade' => 'Curitiba', 'slug' => 'taruma', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 31, 'nome' => 'Uberaba', 'cidade' => 'Curitiba', 'slug' => 'uberaba', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 32, 'nome' => 'Vila Izabel', 'cidade' => 'Curitiba', 'slug' => 'vila-izabel', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
            ['id' => 33, 'nome' => 'Cascatinha', 'cidade' => 'Curitiba', 'slug' => 'cascatinha', 'valor_entrega' => 15.00, 'ativo' => 1, 'criado_em' => '2024-10-21 02:30:50', 'atualizado_em' => '2024-10-21 02:30:50', 'deletado_em' => null],
        ];
        $this->db->table('bairros')->insertBatch($bairros);
    }
}
