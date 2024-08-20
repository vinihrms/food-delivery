# Sistema de Food Delivery - Trabalho de Conclusão de Curso

## Descrição

Este projeto é o resultado do Trabalho de Conclusão de Curso (TCC) desenvolvido por Vinícius Almeida Hermes como parte do curso Técnico em Informática integrado ao ensino médio do Colegio Cívico Militar Amâncio Moro, com o objetivo de obtenção da certificação no referido curso.

O sistema consiste em uma plataforma de food delivery desenvolvida em PHP utilizando o framework CodeIgniter. Ele permite que usuários se cadastrem, tenham acesso ao menu e realizem seus pedidos online de alimentos do restaurante.

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

- XAMPP (ou equivalente) com Apache e MySQL em execução para testes em localhost.
- PHP 7.0 ou superior
- MySQL 5.6 ou superior
- Navegador Web moderno (Chrome, Firefox, etc.)


## Instalação e Configuração

1. Clone este repositório na pasta `htdocs` do seu XAMPP.
2. Certifique-se de que o XAMPP com Apache e MySQL está em execução.
3. Importe o arquivo de banco de dados fornecido (`database.sql`) para criar a estrutura do banco de dados.
4. Renomeie o arquivo `.env.example` para `.env` e atualize as variáveis de ambiente conforme necessário.
5. Execute o servidor PHP usando o comando `php spark serve`.
6. Abra seu navegador e acesse `http://localhost:8080` para usar o sistema.

## Importando o arquivo database.sql (a cada nova modificação farei o update aqui)

1. Certifique-se de ter um servidor de banco de dados MySQL ou MariaDB em execução localmente.
2. Abra seu cliente de banco de dados (por exemplo, phpMyAdmin).
3. Crie um novo banco de dados (se ainda não tiver um).
4. Selecione o banco de dados recém-criado na barra lateral esquerda.
5. No menu, procure uma opção para importar arquivos SQL.
6. Selecione o arquivo `database.sql` do seu projeto e importe-o para o banco de dados.
7. Após a importação, as tabelas e estruturas de banco de dados necessárias devem estar disponíveis no seu banco de dados local.

### Informações de Acesso

O arquivo `database.sql` já contém um usuário administrador pré-configurado para facilitar o acesso inicial ao sistema. As credenciais de acesso são:

- **E-mail:** admin@admin.com
- **Senha:** 123456

É altamente recomendado que você acesse o sistema utilizando estas credenciais assim que iniciar o projeto e proceda imediatamente à alteração da senha e outras configurações necessárias para garantir a segurança do sistema.

## Contribuição

Este projeto é resultado de um trabalho acadêmico e, portanto, contribuições diretas podem não ser aceitas. No entanto, você é livre para bifurcar o repositório, fazer alterações e enviar solicitações pull. Todas as contribuições serão devidamente creditadas.

## Suporte e Contato

Se você tiver dúvidas ou encontrar problemas, sinta-se à vontade para abrir uma issue neste repositório ou entre em contato com os desenvolvedores.

## Licença

Este projeto é licenciado sob a [Licença MIT](LICENSE).
