<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Dados extends Seeder
{
    public function run()
    {
        $usuarios = [
            [
                'id' => 2,
                'nome' => 'Eminem',
                'email' => 'eminem@email.com',
                'cpf' => '208.975.930-57',
                'telefone' => '',
                'is_admin' => 0,
                'ativo' => 1,
                'password_hash' => '$2y$10$NFy6hUJuNgFC31FCvffvkuKq5jzzACHt7Yw/Ax.kY9biIzmWN5x7W',
                'ativacao_hash' => NULL,
                'reset_hash' => NULL,
                'reset_expira_em' => NULL,
                'criado_em' => '2024-11-18 20:08:38',
                'atualizado_em' => '2024-11-21 07:51:43',
                'deletado_em' => NULL
            ],
            [
                'id' => 3,
                'nome' => 'Juice WRLD',
                'email' => 'juice@wrld.com',
                'cpf' => '607.930.110-51',
                'telefone' => '',
                'is_admin' => 0,
                'ativo' => 1,
                'password_hash' => '$2y$10$UgMmtDzQWW.ZfBjH7IH5FOWE9tnDlyC41mWfUZZnwAtfMnENoLBPG',
                'ativacao_hash' => NULL,
                'reset_hash' => NULL,
                'reset_expira_em' => NULL,
                'criado_em' => '2024-11-18 20:21:16',
                'atualizado_em' => '2024-11-21 07:51:53',
                'deletado_em' => NULL
            ],
            [
                'id' => 4,
                'nome' => 'Snoop Dogg',
                'email' => 'snoop@dogg.com',
                'cpf' => '104.091.860-31',
                'telefone' => '',
                'is_admin' => 0,
                'ativo' => 1,
                'password_hash' => '$2y$10$9DzPtaV/8Ea3lZAeGniqUOjAwQUsQKORSq0.vEkKzzc4ahHYvP.XS',
                'ativacao_hash' => NULL,
                'reset_hash' => NULL,
                'reset_expira_em' => NULL,
                'criado_em' => '2024-11-19 07:57:41',
                'atualizado_em' => '2024-11-19 07:57:56',
                'deletado_em' => NULL
            ],
            [
                'id' => 5,
                'nome' => 'The Notorious B.I.G.',
                'email' => 'notorious@gmail.com',
                'cpf' => '106.489.760-68',
                'telefone' => '',
                'is_admin' => 0,
                'ativo' => 1,
                'password_hash' => '$2y$10$xajpXJ5b.dk9GDccz12Zo.DNwObnkLc1ZFNaSNHgrJqvj3p.Le3yW',
                'ativacao_hash' => NULL,
                'reset_hash' => NULL,
                'reset_expira_em' => NULL,
                'criado_em' => '2024-11-21 07:52:55',
                'atualizado_em' => '2024-11-21 07:53:24',
                'deletado_em' => NULL
            ]
        ];

        $this->db->table('usuarios')->insertBatch($usuarios);


        $categorias = [
            ['id' => 7, 'nome' => 'Bebidas', 'slug' => 'bebidas', 'ativo' => 1, 'criado_em' => '2024-11-18 08:20:58', 'atualizado_em' => '2024-11-18 08:21:33', 'deletado_em' => null],
            ['id' => 9, 'nome' => 'Porções', 'slug' => 'porcoes', 'ativo' => 1, 'criado_em' => '2024-11-18 08:21:47', 'atualizado_em' => '2024-11-18 08:21:47', 'deletado_em' => null],
            ['id' => 10, 'nome' => 'Sobremesas', 'slug' => 'sobremesas', 'ativo' => 1, 'criado_em' => '2024-11-18 08:22:04', 'atualizado_em' => '2024-11-18 08:22:04', 'deletado_em' => null],
            ['id' => 11, 'nome' => 'Lanches', 'slug' => 'lanches', 'ativo' => 1, 'criado_em' => '2024-11-18 08:22:13', 'atualizado_em' => '2024-11-18 08:22:13', 'deletado_em' => null],
            ['id' => 13, 'nome' => 'Pizzas', 'slug' => 'pizzas', 'ativo' => 1, 'criado_em' => '2024-11-18 09:00:01', 'atualizado_em' => '2024-11-18 09:00:01', 'deletado_em' => null],
        ];

        $this->db->table('categorias')->insertBatch($categorias);


        $entregadores = [
            [
                'id' => 1,
                'nome' => 'Travis Scott',
                'cpf' => '979.163.060-77',
                'cnh' => '07978849102',
                'email' => 'travis@scott.com',
                'telefone' => '(83) 29069-0214',
                'endereco' => 'Houston, Texas',
                'imagem' => '1731926844_c3bfd2ead8811d5ba7b4.png',
                'veiculo' => 'Mercedes AMG G63',
                'placa' => 'KMM-7271',
                'ativo' => 1,
                'criado_em' => '2024-11-18 07:46:39',
                'atualizado_em' => '2024-11-18 07:57:52',
                'deletado_em' => null,
            ],
            [
                'id' => 2,
                'nome' => 'Taylor Swift',
                'cpf' => '227.520.510-18',
                'cnh' => '22752051018',
                'email' => 'taylor@swift.com',
                'telefone' => '(71) 35084-8206',
                'endereco' => 'West Reading, Pensilvânia',
                'imagem' => '1731927373_e4c555b7aae181d5b1bd.jpg',
                'veiculo' => 'Porsche 911',
                'placa' => 'MZL-3161',
                'ativo' => 1,
                'criado_em' => '2024-11-18 07:52:54',
                'atualizado_em' => '2024-11-18 07:57:38',
                'deletado_em' => null,
            ],
            [
                'id' => 3,
                'nome' => 'Young Thug',
                'cpf' => '460.376.290-99',
                'cnh' => '58403209798',
                'email' => 'young@thug.com',
                'telefone' => '(71) 98437-4901',
                'endereco' => 'Atlanta, Geórgia',
                'imagem' => '1731927622_729c17adade6c8d0cc39.webp',
                'veiculo' => 'Lamborghini Urus',
                'placa' => 'KHO-8755',
                'ativo' => 1,
                'criado_em' => '2024-11-18 07:59:47',
                'atualizado_em' => '2024-11-18 08:00:22',
                'deletado_em' => null,
            ],
            [
                'id' => 4,
                'nome' => 'Kanye West',
                'cpf' => '449.486.190-19',
                'cnh' => '44948619019',
                'email' => 'kanye@west.com',
                'telefone' => '(87) 98183-8491',
                'endereco' => 'Atlanta, Geórgia',
                'imagem' => '1732185457_76b6a32fb6f6ca4d863f.jpg',
                'veiculo' => 'Tesla Cybertruck',
                'placa' => 'KAI-6921',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:02:09',
                'atualizado_em' => '2024-11-21 07:37:37',
                'deletado_em' => null,
            ],
            [
                'id' => 5,
                'nome' => 'Playboi Carti',
                'cpf' => '582.805.210-11',
                'cnh' => '79253482300',
                'email' => 'playboi@carti.com',
                'telefone' => '(45) 98829-2913',
                'endereco' => 'Atlanta, Geórgia',
                'imagem' => '1731928112_c6e581111daef6330390.jpg',
                'veiculo' => 'Phantom',
                'placa' => 'KDM-1691',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:08:10',
                'atualizado_em' => '2024-11-18 08:08:32',
                'deletado_em' => null,
            ],
        ];

        $this->db->table('entregadores')->insertBatch($entregadores);


        $extras = [
            [
                'id' => 1,
                'nome' => 'Bacon',
                'slug' => 'bacon',
                'preco' => 3.00,
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 20:01:49',
                'atualizado_em' => '2024-11-18 20:01:49',
                'deletado_em' => NULL,
            ],
            [
                'id' => 2,
                'nome' => 'Calabresa',
                'slug' => 'calabresa',
                'preco' => 3.00,
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 20:02:22',
                'atualizado_em' => '2024-11-18 20:02:22',
                'deletado_em' => NULL,
            ],
        ];

        $this->db->table('extras')->insertBatch($extras);


        $formas_pagamento = [
            [
                'id' => 2,
                'nome' => 'Cartão de Crédito',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:09:45',
                'atualizado_em' => '2024-11-18 08:09:45',
                'deletado_em' => NULL
            ],
            [
                'id' => 3,
                'nome' => 'Cartão de Débito',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:09:51',
                'atualizado_em' => '2024-11-18 08:09:51',
                'deletado_em' => NULL
            ],
        ];
        $this->db->table('formas_pagamento')->insertBatch($formas_pagamento);


        $medidas = [
            [
                'id' => 1,
                'nome' => '2 Litros',
                'descricao' => 'Garrafa PET',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:23:47',
                'atualizado_em' => '2024-11-18 08:23:47',
                'deletado_em' => NULL,
            ],
            [
                'id' => 2,
                'nome' => 'Lata',
                'descricao' => '350 ml',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:24:12',
                'atualizado_em' => '2024-11-18 08:24:12',
                'deletado_em' => NULL,
            ],
            [
                'id' => 3,
                'nome' => '600 ml',
                'descricao' => 'Garrafa PET',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:24:20',
                'atualizado_em' => '2024-11-18 08:24:20',
                'deletado_em' => NULL,
            ],
            [
                'id' => 4,
                'nome' => '1 Litro',
                'descricao' => 'Garrafa de vidro',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:24:35',
                'atualizado_em' => '2024-11-18 08:24:35',
                'deletado_em' => NULL,
            ],
            [
                'id' => 5,
                'nome' => 'Com gás - 500 ml',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:52:29',
                'atualizado_em' => '2024-11-18 08:52:29',
                'deletado_em' => NULL,
            ],
            [
                'id' => 6,
                'nome' => 'Sem gás - 500 ml',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 08:52:40',
                'atualizado_em' => '2024-11-18 08:52:40',
                'deletado_em' => NULL,
            ],
            [
                'id' => 7,
                'nome' => 'Grande',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 09:00:19',
                'atualizado_em' => '2024-11-18 09:00:19',
                'deletado_em' => NULL,
            ],
            [
                'id' => 8,
                'nome' => 'Média',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 09:00:27',
                'atualizado_em' => '2024-11-18 09:00:27',
                'deletado_em' => NULL,
            ],
            [
                'id' => 9,
                'nome' => 'Pequena',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 09:00:36',
                'atualizado_em' => '2024-11-18 09:00:36',
                'deletado_em' => NULL,
            ],
            [
                'id' => 10,
                'nome' => '240 gramas',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 09:34:13',
                'atualizado_em' => '2024-11-18 09:34:13',
                'deletado_em' => NULL,
            ],
            [
                'id' => 11,
                'nome' => '600 gramas',
                'descricao' => '',
                'ativo' => 1,
                'criado_em' => '2024-11-18 19:59:11',
                'atualizado_em' => '2024-11-18 19:59:11',
                'deletado_em' => NULL,
            ],
        ];

        $this->db->table('medidas')->insertBatch($medidas);








        $produtos = [
            ['categoria_id' => 7, 'nome' => 'Coca-Cola', 'slug' => 'coca-cola', 'ingredientes' => 'Água gaseificada, açúcar, extrato de noz de cola, cafeína, corante caramelo IV, acidulante ácido fosfórico e aroma natural.', 'ativo' => 1, 'imagem' => '1731929561_0e5bbeb3d224b7fbb10c.webp', 'criado_em' => '2024-11-18 08:30:41', 'atualizado_em' => '2024-11-18 08:32:41', 'deletado_em' => NULL],
            ['categoria_id' => 7, 'nome' => 'Guaraná Antártica', 'slug' => 'guarana-antartica', 'ingredientes' => 'Água gaseificada, açúcar, extrato de guaraná, acidulante ácido cítrico, benzoato de sódio e sorbato de potássio, aromatizante e corante caramelo IV.', 'ativo' => 1, 'imagem' => '1731929715_b203ca4d804ed5e2fc7e.jpg', 'criado_em' => '2024-11-18 08:35:02', 'atualizado_em' => '2024-11-18 08:35:15', 'deletado_em' => NULL],
            ['categoria_id' => 7, 'nome' => 'Itubaina', 'slug' => 'itubaina', 'ingredientes' => 'Água, açúcar, ácido cítrico, ácido fosfórico, corante caramelo, cafeína, aroma natural de laranja, edulcorante ciclamato de sódio e sacarina sódica.', 'ativo' => 1, 'imagem' => '1731930592_68eb6db773da02f527aa.jpg', 'criado_em' => '2024-11-18 08:49:27', 'atualizado_em' => '2024-11-18 08:49:52', 'deletado_em' => NULL],
            ['categoria_id' => 7, 'nome' => 'Água', 'slug' => 'agua', 'ingredientes' => 'Bicarbonato: 66,06mg/l; Cálcio: 8,080mg/l; Sódio: 17,700mg/l; Magnésio: 0,363mg/l; Sulfato: 0,17mg/l; Potássio: 2,060mg/l; Estrôncio: 0,353mg/l; Fluoreto: 0,04mg/l; Carbonato: 5,21mg/l; Nitrato: 0,06mg/l.', 'ativo' => 1, 'imagem' => '1731931096_5bbe2ac79c17647aa991.jpg', 'criado_em' => '2024-11-18 08:53:46', 'atualizado_em' => '2024-11-18 08:58:16', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Calabresa', 'slug' => 'pizza-de-calabresa', 'ingredientes' => 'Massa de pizza, molho de tomate, queijo muçarela, linguiça calabresa fatiada, cebola em rodelas, azeitonas, orégano e azeite.', 'ativo' => 1, 'imagem' => '1731931601_5ac421036dd3ffb2eff5.webp', 'criado_em' => '2024-11-18 09:06:30', 'atualizado_em' => '2024-11-18 09:06:41', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Frango com Catupiry', 'slug' => 'pizza-de-frango-com-catupiry', 'ingredientes' => 'Frango desfiado, requeijão tipo catupiry, massa de pizza, molho de tomate, queijo muçarela, orégano e azeite.', 'ativo' => 1, 'imagem' => '1731931739_574e074da57ed5c010a9.jpg', 'criado_em' => '2024-11-18 09:08:39', 'atualizado_em' => '2024-11-18 09:08:59', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Lombo Canadense', 'slug' => 'pizza-de-lombo-canadense', 'ingredientes' => 'Massa de pizza, molho de tomate, queijo muçarela, lombo canadense fatiado, rodelas de tomate, orégano e azeite.', 'ativo' => 1, 'imagem' => '1731931825_02952250f00ce5986a5e.webp', 'criado_em' => '2024-11-18 09:10:19', 'atualizado_em' => '2024-11-18 09:10:25', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Bacon', 'slug' => 'pizza-de-bacon', 'ingredientes' => 'Massa de pizza, molho de tomate, queijo muçarela, bacon em cubos, orégano e azeite.', 'ativo' => 1, 'imagem' => '1731931977_b7e1cc8cc4c70c49aa4a.jpg', 'criado_em' => '2024-11-18 09:12:02', 'atualizado_em' => '2024-11-18 09:12:57', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Quatro Queijos', 'slug' => 'pizza-de-quatro-queijos', 'ingredientes' => 'Massa de pizza, molho de tomate, queijo muçarela, queijo parmesão, queijo gorgonzola, queijo provolone e orégano.', 'ativo' => 1, 'imagem' => '1731932067_6f7d900636f350536fd0.webp', 'criado_em' => '2024-11-18 09:14:23', 'atualizado_em' => '2024-11-18 09:14:27', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Margherita', 'slug' => 'pizza-de-margherita', 'ingredientes' => 'Massa de pizza, molho de tomate, queijo muçarela, tomates frescos em rodelas, manjericão fresco, azeite e orégano.', 'ativo' => 1, 'imagem' => '1731932318_8ec90caa2e7e7f0f742e.webp', 'criado_em' => '2024-11-18 09:18:33', 'atualizado_em' => '2024-11-18 09:18:38', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Chocolate com Morango', 'slug' => 'pizza-de-chocolate-com-morango', 'ingredientes' => 'Massa de pizza doce, chocolate ao leite ou meio amargo derretido, morangos frescos fatiados, e raspas de chocolate.', 'ativo' => 1, 'imagem' => '1731932507_9dd1272dbd24e2bd5005.jpg', 'criado_em' => '2024-11-18 09:21:40', 'atualizado_em' => '2024-11-18 09:21:47', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza de Banoffee', 'slug' => 'pizza-de-banoffee', 'ingredientes' => 'Massa de pizza doce, doce de leite, banana fatiada, chantilly, e canela em pó.', 'ativo' => 1, 'imagem' => '1731932709_21adc87d26feb30536e8.jpg', 'criado_em' => '2024-11-18 09:25:03', 'atualizado_em' => '2024-11-18 09:25:09', 'deletado_em' => NULL],
            ['categoria_id' => 13, 'nome' => 'Pizza Romeu e Julieta', 'slug' => 'pizza-romeu-e-julieta', 'ingredientes' => 'Massa de pizza doce, queijo muçarela, goiabada em pedaços.', 'ativo' => 1, 'imagem' => '1731932842_aeb8ebf00617fe9df290.jpg', 'criado_em' => '2024-11-18 09:27:17', 'atualizado_em' => '2024-11-18 09:27:22', 'deletado_em' => NULL],
            ['categoria_id' => 9, 'nome' => 'Porção de Batata Frita', 'slug' => 'porcao-de-batata-frita', 'ingredientes' => 'Batata cortada em palitos', 'ativo' => 1, 'imagem' => '1731932965_bbc4e6406fe2942e1b62.webp', 'criado_em' => '2024-11-18 09:28:58', 'atualizado_em' => '2024-11-18 09:29:26', 'deletado_em' => NULL],
            ['categoria_id' => 9, 'nome' => 'Porção de Frango a Passarinho', 'slug' => 'porcao-de-frango-a-passarinho', 'ingredientes' => 'Frango cortado em pedaços pequenos, alho amassado, limão, sal, pimenta-do-reino, cheiro-verde, farinha de trigo.', 'ativo' => 1, 'imagem' => '1731933018_8ac06bc3040746a2fba0.webp', 'criado_em' => '2024-11-18 09:30:13', 'atualizado_em' => '2024-11-18 09:30:18', 'deletado_em' => NULL],
            ['categoria_id' => 10, 'nome' => 'Petit gâteau', 'slug' => 'petit-gateau', 'ingredientes' => 'Chocolate ao leite, manteiga, açúcar, ovos, farinha de trigo, essência de baunilha, sal, sorvete de creme', 'ativo' => 1, 'imagem' => '1731933199_9f69a0c0fb756ec99111.png', 'criado_em' => '2024-11-18 09:33:14', 'atualizado_em' => '2024-11-18 09:33:19', 'deletado_em' => NULL],
            ['categoria_id' => 10, 'nome' => 'Pudim', 'slug' => 'pudim', 'ingredientes' => 'Leite condensado, leite, ovos, açúcar, essência de baunilha.', 'ativo' => 1, 'imagem' => '1731933410_b93da5718298f7735149.jpg', 'criado_em' => '2024-11-18 09:36:17', 'atualizado_em' => '2024-11-18 09:36:50', 'deletado_em' => NULL],
            ['categoria_id' => 11, 'nome' => 'Hamburguer Artesanal', 'slug' => 'hamburguer-artesanal', 'ingredientes' => 'Carne moída, sal, pimenta-do-reino, pão de hambúrguer, queijo, alface, tomate em rodelas, cebola, molhos (maionese, ketchup, mostarda, barbecue), bacon, picles.', 'ativo' => 1, 'imagem' => '1731970712_9be1cb180f01ae19a27c.jpg', 'criado_em' => '2024-11-18 19:58:22', 'atualizado_em' => '2024-11-18 19:58:44', 'deletado_em' => NULL],
        ];

        $this->db->table('produtos')->insertBatch($produtos);


        $produtos_especificacoes = [
            ['id' => 4, 'produto_id' => 1, 'medida_id' => 2, 'preco' => 4.00, 'customizavel' => 0],
            ['id' => 5, 'produto_id' => 1, 'medida_id' => 1, 'preco' => 12.00, 'customizavel' => 0],
            ['id' => 6, 'produto_id' => 1, 'medida_id' => 4, 'preco' => 9.00, 'customizavel' => 0],
            ['id' => 7, 'produto_id' => 1, 'medida_id' => 3, 'preco' => 7.00, 'customizavel' => 0],
            ['id' => 8, 'produto_id' => 2, 'medida_id' => 1, 'preco' => 12.00, 'customizavel' => 0],
            ['id' => 9, 'produto_id' => 2, 'medida_id' => 4, 'preco' => 9.00, 'customizavel' => 0],
            ['id' => 10, 'produto_id' => 2, 'medida_id' => 3, 'preco' => 7.00, 'customizavel' => 0],
            ['id' => 11, 'produto_id' => 2, 'medida_id' => 2, 'preco' => 4.00, 'customizavel' => 0],
            ['id' => 12, 'produto_id' => 3, 'medida_id' => 3, 'preco' => 5.00, 'customizavel' => 0],
            ['id' => 13, 'produto_id' => 4, 'medida_id' => 5, 'preco' => 3.00, 'customizavel' => 0],
            ['id' => 14, 'produto_id' => 4, 'medida_id' => 6, 'preco' => 3.00, 'customizavel' => 0],
            ['id' => 15, 'produto_id' => 5, 'medida_id' => 7, 'preco' => 60.00, 'customizavel' => 1],
            ['id' => 16, 'produto_id' => 5, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 1],
            ['id' => 20, 'produto_id' => 6, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 1],
            ['id' => 21, 'produto_id' => 6, 'medida_id' => 7, 'preco' => 60.00, 'customizavel' => 1],
            ['id' => 22, 'produto_id' => 7, 'medida_id' => 7, 'preco' => 60.00, 'customizavel' => 1],
            ['id' => 23, 'produto_id' => 7, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 1],
            ['id' => 25, 'produto_id' => 7, 'medida_id' => 9, 'preco' => 32.00, 'customizavel' => 0],
            ['id' => 26, 'produto_id' => 5, 'medida_id' => 9, 'preco' => 32.00, 'customizavel' => 0],
            ['id' => 27, 'produto_id' => 6, 'medida_id' => 9, 'preco' => 32.00, 'customizavel' => 0],
            ['id' => 28, 'produto_id' => 8, 'medida_id' => 7, 'preco' => 60.00, 'customizavel' => 1],
            ['id' => 29, 'produto_id' => 8, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 1],
            ['id' => 30, 'produto_id' => 8, 'medida_id' => 9, 'preco' => 32.00, 'customizavel' => 0],
            ['id' => 32, 'produto_id' => 9, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 1],
            ['id' => 33, 'produto_id' => 9, 'medida_id' => 7, 'preco' => 60.00, 'customizavel' => 1],
            ['id' => 34, 'produto_id' => 9, 'medida_id' => 9, 'preco' => 32.00, 'customizavel' => 0],
            ['id' => 35, 'produto_id' => 10, 'medida_id' => 7, 'preco' => 60.00, 'customizavel' => 1],
            ['id' => 36, 'produto_id' => 10, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 1],
            ['id' => 37, 'produto_id' => 10, 'medida_id' => 9, 'preco' => 32.00, 'customizavel' => 0],
            ['id' => 38, 'produto_id' => 11, 'medida_id' => 7, 'preco' => 65.00, 'customizavel' => 0],
            ['id' => 39, 'produto_id' => 11, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 0],
            ['id' => 40, 'produto_id' => 11, 'medida_id' => 9, 'preco' => 35.00, 'customizavel' => 0],
            ['id' => 41, 'produto_id' => 12, 'medida_id' => 7, 'preco' => 65.00, 'customizavel' => 0],
            ['id' => 42, 'produto_id' => 12, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 0],
            ['id' => 43, 'produto_id' => 12, 'medida_id' => 9, 'preco' => 35.00, 'customizavel' => 0],
            ['id' => 44, 'produto_id' => 13, 'medida_id' => 7, 'preco' => 65.00, 'customizavel' => 0],
            ['id' => 45, 'produto_id' => 13, 'medida_id' => 8, 'preco' => 45.00, 'customizavel' => 0],
            ['id' => 46, 'produto_id' => 13, 'medida_id' => 9, 'preco' => 35.00, 'customizavel' => 0],
            ['id' => 47, 'produto_id' => 14, 'medida_id' => 7, 'preco' => 45.00, 'customizavel' => 0],
            ['id' => 48, 'produto_id' => 14, 'medida_id' => 9, 'preco' => 30.00, 'customizavel' => 0],
            ['id' => 49, 'produto_id' => 15, 'medida_id' => 7, 'preco' => 50.00, 'customizavel' => 0],
            ['id' => 50, 'produto_id' => 16, 'medida_id' => 10, 'preco' => 25.00, 'customizavel' => 0],
            ['id' => 51, 'produto_id' => 17, 'medida_id' => 10, 'preco' => 15.00, 'customizavel' => 0],
            ['id' => 52, 'produto_id' => 18, 'medida_id' => 11, 'preco' => 22.00, 'customizavel' => 0],
        ];

        $this->db->table('produtos_especificacoes')->insertBatch($produtos_especificacoes);

        $produtos_extras = [
            ['id' => 1, 'produto_id' => 5, 'extra_id' => 2],
            ['id' => 2, 'produto_id' => 8, 'extra_id' => 1],
            ['id' => 3, 'produto_id' => 18, 'extra_id' => 1],
        ];

        $this->db->table('produtos_extras')->insertBatch($produtos_extras);


        $pedidos = [
            [
                'id' => 1,
                'usuario_id' => 2,
                'entregador_id' => 3,
                'codigo' => '61773795',
                'forma_pagamento' => 'Dinheiro',
                'situacao' => 2,
                'produtos' => 'a:2:{i:0;a:6:{s:2:"id";s:2:"18";s:4:"nome";s:47:"Hamburguer Artesanal 600 gramas com extra Bacon";s:4:"slug";s:47:"hamburguer-artesanal-600-gramas-com-extra-bacon";s:5:"preco";s:5:"25.00";s:10:"quantidade";i:2;s:7:"tamanho";s:10:"600 gramas";}i:1;a:6:{s:2:"id";s:1:"1";s:4:"nome";s:17:"Coca-Cola 600 ml ";s:4:"slug";s:16:"coca-cola-600-ml";s:5:"preco";s:4:"7.00";s:10:"quantidade";i:1;s:7:"tamanho";s:6:"600 ml";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 57,
                'valor_pedido' => 72,
                'endereco_entrega' => 'Ahú - Curitiba - Rua Doutor Bezerra de Menezes - PR - 80540-190 - Número: 22',
                'observacoes' => 'Ponto de referência: Ao lado da obra - Número: 22. Você informou que precisa de troco para: R$80,00',
                'criado_em' => '2024-11-18 20:11:25',
                'atualizado_em' => '2024-11-18 20:18:55',
                'deletado_em' => NULL,
            ],
            [
                'id' => 2,
                'usuario_id' => 2,
                'entregador_id' => 4,
                'codigo' => '41598194',
                'forma_pagamento' => 'Cartão de Crédito',
                'situacao' => 2,
                'produtos' => 'a:4:{i:0;a:5:{s:4:"slug";s:69:"grande-metade-pizza-de-lombo-canadense-metade-pizza-de-quatro-queijos";s:4:"nome";s:70:"Grande metade Pizza de Lombo Canadense metade Pizza de Quatro Queijos ";s:5:"preco";s:5:"65.00";s:10:"quantidade";i:1;s:7:"tamanho";s:6:"Grande";}i:1;a:6:{s:2:"id";s:2:"13";s:4:"nome";s:29:"Pizza Romeu e Julieta Média ";s:4:"slug";s:27:"pizza-romeu-e-julieta-media";s:5:"preco";s:5:"45.00";s:10:"quantidade";i:1;s:7:"tamanho";s:6:"Média";}i:2;a:6:{s:2:"id";s:1:"1";s:4:"nome";s:19:"Coca-Cola 2 Litros ";s:4:"slug";s:18:"coca-cola-2-litros";s:5:"preco";s:5:"12.00";s:10:"quantidade";i:1;s:7:"tamanho";s:8:"2 Litros";}i:3;a:6:{s:2:"id";s:1:"2";s:4:"nome";s:28:"Guaraná Antártica 1 Litro ";s:4:"slug";s:25:"guarana-antartica-1-litro";s:5:"preco";s:4:"9.00";s:10:"quantidade";i:1;s:7:"tamanho";s:7:"1 Litro";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 131,
                'valor_pedido' => 146,
                'endereco_entrega' => 'Ahú - Curitiba - Rua Doutor Bezerra de Menezes - PR - 80540-190 - Número: 22',
                'observacoes' => 'Ponto de referência: Ao lado da obra - Número: 22',
                'criado_em' => '2024-11-18 20:14:50',
                'atualizado_em' => '2024-11-18 20:18:29',
                'deletado_em' => NULL,
            ],
            [
                'id' => 3,
                'usuario_id' => 2,
                'entregador_id' => 4,
                'codigo' => '45678184',
                'forma_pagamento' => 'Dinheiro',
                'situacao' => 2,
                'produtos' => 'a:1:{i:0;a:6:{s:2:"id";s:2:"16";s:4:"nome";s:26:" Petit gâteau 240 gramas ";s:4:"slug";s:23:"petit-gateau-240-gramas";s:5:"preco";s:5:"25.00";s:10:"quantidade";i:2;s:7:"tamanho";s:10:"240 gramas";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 50,
                'valor_pedido' => 65,
                'endereco_entrega' => 'Ahú - Curitiba - Rua Doutor Bezerra de Menezes - PR - 80540-190 - Número: 22',
                'observacoes' => 'Ponto de referência: Ao lado da obra - Número: 22. Você informou não que precisa de troco.',
                'criado_em' => '2024-11-18 20:15:21',
                'atualizado_em' => '2024-11-18 20:15:57',
                'deletado_em' => NULL,
            ],
            [
                'id' => 4,
                'usuario_id' => 3,
                'entregador_id' => 5,
                'codigo' => '77195029',
                'forma_pagamento' => 'Cartão de Crédito',
                'situacao' => 2,
                'produtos' => 'a:2:{i:0;a:6:{s:2:"id";s:2:"10";s:4:"nome";s:27:"Pizza de Margherita Média ";s:4:"slug";s:25:"pizza-de-margherita-media";s:5:"preco";s:5:"45.00";s:10:"quantidade";i:2;s:7:"tamanho";s:6:"Média";}i:1;a:6:{s:2:"id";s:1:"1";s:4:"nome";s:19:"Coca-Cola 2 Litros ";s:4:"slug";s:18:"coca-cola-2-litros";s:5:"preco";s:5:"12.00";s:10:"quantidade";i:1;s:7:"tamanho";s:8:"2 Litros";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 102,
                'valor_pedido' => 117,
                'endereco_entrega' => 'Bom Retiro - Curitiba - Estrada do Lazareto - PR - 80520-080 - Número: 999',
                'observacoes' => 'Ponto de referência: Em frente ao supermercado - Número: 999',
                'criado_em' => '2024-11-18 20:23:51',
                'atualizado_em' => '2024-11-18 20:31:53',
                'deletado_em' => NULL,
            ],
            [
                'id' => 5,
                'usuario_id' => 3,
                'entregador_id' => 3,
                'codigo' => '92801465',
                'forma_pagamento' => 'Dinheiro',
                'situacao' => 3,
                'produtos' => 'a:3:{i:0;a:6:{s:2:"id";s:1:"5";s:4:"nome";s:45:"Pizza de Calabresa Grande com extra Calabresa";s:4:"slug";s:45:"pizza-de-calabresa-grande-com-extra-calabresa";s:5:"preco";s:5:"63.00";s:10:"quantidade";i:1;s:7:"tamanho";s:6:"Grande";}i:1;a:6:{s:2:"id";s:1:"5";s:4:"nome";s:26:"Pizza de Calabresa Grande ";s:4:"slug";s:25:"pizza-de-calabresa-grande";s:5:"preco";s:5:"60.00";s:10:"quantidade";i:1;s:7:"tamanho";s:6:"Grande";}i:2;a:6:{s:2:"id";s:1:"1";s:4:"nome";s:19:"Coca-Cola 2 Litros ";s:4:"slug";s:18:"coca-cola-2-litros";s:5:"preco";s:5:"12.00";s:10:"quantidade";i:1;s:7:"tamanho";s:8:"2 Litros";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 135,
                'valor_pedido' => 150,
                'endereco_entrega' => 'Santa Felicidade - Curitiba - Rua ABC - PR - 80440-110 - Número: 777',
                'observacoes' => 'Ponto de referência: Próximo ao restaurante ABC - Número: 777. Você informou que precisa de troco para R$200,00',
                'criado_em' => '2024-11-18 20:30:21',
                'atualizado_em' => '2024-11-18 20:35:57',
                'deletado_em' => NULL,
            ],
            [
                'id' => 6,
                'usuario_id' => 4,
                'entregador_id' => 3,
                'codigo' => '12345678',
                'forma_pagamento' => 'Cartão de Crédito',
                'situacao' => 2,
                'produtos' => 'a:2:{i:0;a:6:{s:2:"id";s:2:"20";s:4:"nome";s:48:"Pizza de Frango com Catupiry Grande ";s:4:"slug";s:47:"pizza-de-frango-com-catupiry-grande";s:5:"preco";s:5:"70.00";s:10:"quantidade";i:1;s:7:"tamanho";s:6:"Grande";}i:1;a:6:{s:2:"id";s:1:"1";s:4:"nome";s:19:"Coca-Cola 2 Litros ";s:4:"slug";s:18:"coca-cola-2-litros";s:5:"preco";s:5:"12.00";s:10:"quantidade";i:1;s:7:"tamanho";s:8:"2 Litros";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 82,
                'valor_pedido' => 97,
                'endereco_entrega' => 'Jardim das Américas - Curitiba - Rua XYZ - PR - 80500-050 - Número: 111',
                'observacoes' => 'Ponto de referência: Ao lado do supermercado XYZ - Número: 111',
                'criado_em' => '2024-11-18 20:33:21',
                'atualizado_em' => '2024-11-18 20:36:57',
                'deletado_em' => NULL,
            ],
            [
                'id' => 7,
                'usuario_id' => 5,
                'entregador_id' => 1,
                'codigo' => '24763048',
                'forma_pagamento' => 'Dinheiro',
                'situacao' => 2,
                'produtos' => 'a:1:{i:0;a:6:{s:2:"id";s:1:"1";s:4:"nome";s:19:"Coca-Cola 2 Litros ";s:4:"slug";s:18:"coca-cola-2-litros";s:5:"preco";s:5:"12.00";s:10:"quantidade";i:1;s:7:"tamanho";s:8:"2 Litros";}}',
                'valor_entrega' => 15,
                'valor_produtos' => 12,
                'valor_pedido' => 27,
                'endereco_entrega' => 'Ahú - Curitiba - Rua Campos Sales - PR - 80030-285 - Número: 22',
                'observacoes' => 'Ponto de referência: Obra - Número: 22. Você informou que não precisa de troco.',
                'criado_em' => '2024-11-21 07:56:19',
                'atualizado_em' => '2024-11-21 07:57:04',
                'deletado_em' => NULL,
            ]
        ];

        $this->db->table('pedidos')->insertBatch($pedidos);

        $pedidos_produtos = [
            ['pedido_id' => 3, 'produto' => 'Petit gâteau 240 gramas', 'quantidade' => 2],
            ['pedido_id' => 2, 'produto' => 'Grande metade Pizza de Lombo Canadense metade Pizza de Quatro Queijos', 'quantidade' => 1],
            ['pedido_id' => 2, 'produto' => 'Pizza Romeu e Julieta Média', 'quantidade' => 1],
            ['pedido_id' => 2, 'produto' => 'Coca-Cola 2 Litros', 'quantidade' => 1],
            ['pedido_id' => 2, 'produto' => 'Guaraná Antártica 1 Litro', 'quantidade' => 1],
            ['pedido_id' => 1, 'produto' => 'Hamburguer Artesanal 600 gramas com extra Bacon', 'quantidade' => 2],
            ['pedido_id' => 1, 'produto' => 'Coca-Cola 600 ml', 'quantidade' => 1],
            ['pedido_id' => 5, 'produto' => 'Pizza de Calabresa Grande com extra Calabresa', 'quantidade' => 1],
            ['pedido_id' => 5, 'produto' => 'Pizza de Calabresa Grande', 'quantidade' => 1],
            ['pedido_id' => 5, 'produto' => 'Coca-Cola 2 Litros', 'quantidade' => 2],
            ['pedido_id' => 4, 'produto' => 'Pizza de Margherita Média', 'quantidade' => 2],
            ['pedido_id' => 4, 'produto' => 'Coca-Cola 2 Litros', 'quantidade' => 1],
            ['pedido_id' => 7, 'produto' => 'Coca-Cola 2 Litros', 'quantidade' => 1],
        ];

        $this->db->table('pedidos_produtos')->insertBatch($pedidos_produtos);
    }
}
