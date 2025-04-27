# Desenvolvimento de um Sistema de Entrega de Comida

## Descrição

Este projeto é o resultado do Trabalho de Conclusão de Curso (TCC) desenvolvido por Vinícius Almeida Hermes como parte do curso Técnico em Informática integrado ao ensino médio do Colegio Cívico Militar Amâncio Moro, com o objetivo de obtenção da certificação no referido curso.

O sistema consiste no desenvolvimento de uma plataforma de food delivery desenvolvida em PHP utilizando o framework CodeIgniter. Ele permite que usuários se cadastrem, tenham acesso ao menu e realizem seus pedidos online de alimentos do restaurante.

## Funcionalidades Principais

- Registro e Login de Usuários: Os clientes podem se cadastrar e fazer login em suas contas.
- Navegação de Menus: Os clientes podem visualizar o menu do restaurante cadastrado.
- Realização de Pedidos: Os clientes podem adicionar itens ao carrinho e realizar pedidos.
- Customização de pedidos: Os clientes podem personalizar seus pedidos.
- Rastreamento de Pedidos: Os clientes podem acompanhar o status de seus pedidos.
- Gerenciamento do Restaurante: O restaurante pode cadastrar e gerenciar seu menu na plataforma.
- Painel Administrativo: Os administradores têm acesso a um painel onde podem gerenciar usuários, pedidos, entregadores e receita local.

## Funcionalidades Adicionais

- Opções de Pagamento: Os clientes podem escolher entre diferentes métodos de pagamento, como cartão de crédito, débito ou dinheiro na entrega.
- Avaliação de Pedidos: Após receber o pedido, os clientes podem avaliar a qualidade do serviço e da comida.
- Notificações em Tempo Real: Os clientes recebem notificações sobre o status do pedido em tempo real, desde a confirmação até a entrega.
- Promoções e Descontos: O restaurante pode oferecer promoções e descontos especiais para atrair mais clientes.
- Relatórios de Desempenho: O painel administrativo fornece relatórios detalhados sobre as vendas, pedidos e clientes.

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada no desenvolvimento do sistema.
- **CodeIgniter**: Framework PHP utilizado para estruturar e facilitar o desenvolvimento.
- **MySQL**: Banco de dados utilizado para armazenar informações sobre usuários, pedidos e menu do restaurante.
- **HTML/CSS/JavaScript**: Tecnologias front-end utilizadas para desenvolver a interface do usuário.
- **Bootstrap**: Utilizado para estilização da interface do usuário.
- **jQuery**: Biblioteca JavaScript utilizada para simplificar a manipulação do DOM.
- **Ajax**: Tecnologia utilizada para realizar requisições assíncronas no navegador.
- **Select2**: Biblioteca JavaScript utilizada para melhorar a experiência do usuário em campos de seleção, oferecendo recursos como busca, carregamento dinâmico e múltipla seleção.


## Requisitos do Sistema

- Servior local com Apache e MySQL em execução para testes em localhost.
- PHP 7.0 ou superior
- MySQL 5.6 ou superior
- Navegador Web moderno (Chrome, Firefox, etc.)


## Instalação e Configuração

1. Clone este repositório na pasta de arquivos web do seu servidor.
2. Certifique-se de que o servidor com Apache e MySQL está em execução.
3. Migre o banco de dados utiliando o comando `php spark migrate`.
4. Migre os dados iniciais *obrigatórios* utiliando o comando `php spark db:seed main`.
5. Renomeie o arquivo `.env.example` para `.env` e atualize as variáveis de ambiente conforme necessário.
6. Execute o servidor PHP usando o comando `php spark serve`.
7. Abra seu navegador e acesse `http://localhost:8080` para usar o sistema.


### Informações de Acesso

O main seeder já contém um usuário administrador pré-configurado para facilitar o acesso inicial ao sistema. As credenciais de acesso são:

- **E-mail:** admin@admin.com
- **Senha:** 123456

É altamente recomendado que você acesse o sistema utilizando estas credenciais assim que iniciar o projeto e proceda imediatamente à alteração da senha e outras configurações necessárias para garantir a segurança do sistema.

## Contribuição

Este projeto é resultado de um trabalho acadêmico e, portanto, contribuições diretas podem não ser aceitas. No entanto, você é livre para bifurcar o repositório, fazer alterações e enviar solicitações pull. Todas as contribuições serão devidamente creditadas.

## Suporte e Contato

Se você tiver dúvidas ou encontrar problemas, sinta-se à vontade para abrir uma issue neste repositório ou entre em contato com os desenvolvedores.

## Referências

-W3Schools. Disponível em: https://www.w3schools.com/. Acesso em: 6 nov. 2024.
-MySQL. Disponível em: https://www.mysql.com/. Acesso em: 6 nov. 2024.
-phpMyAdmin. Disponível em: https://www.phpmyadmin.net/. Acesso em: 6 nov. 2024.
-CodeIgniter. Disponível em: https://codeigniter.com/. Acesso em: 6 nov. 2024.
-Bootstrap. Disponível em: https://getbootstrap.com/. Acesso em: 6 nov. 2024.
-jQuery. Disponível em: https://jquery.com/download/. Acesso em: 6 nov. 2024.
-Select2. Disponível em: https://select2.org/. Acesso em: 6 nov. 2024.
-Astah. Disponível em: https://astah.net/downloads/. Acesso em: 6 nov. 2024.
-Lucidchart. Disponível em: https://www.lucidchart.com/pages. Acesso em: 6 nov. 2024.
-Visual Paradigm. Disponível em: https://www.visual-paradigm.com/. Acesso em: 6 nov. 2024.
-Udemy. Disponível em: https://www.udemy.com/. Acesso em: 6 nov. 2024.
-GitHub. Disponível em: https://github.com/. Acesso em: 6 nov. 2024.
-Laragon. Disponível em: https://laragon.org/. Acesso em: 6 nov. 2024.
-Postmark. Disponível em: https://postmarkapp.com/. Acesso em: 6 nov. 2024.
-PlantUML. Disponível em: https://plantuml.com/. Acesso em: 6 nov. 2024.


## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE).
