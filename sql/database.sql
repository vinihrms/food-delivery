SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

--
-- Banco de dados: `food`
--
-- --------------------------------------------------------
--
-- Estrutura para tabela `bairros`
--
CREATE TABLE `bairros` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `cidade` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `slug` varchar(128) NOT NULL,
  `valor_entrega` decimal(10, 2) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `categorias`
--
CREATE TABLE `categorias` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `entregadores`
--
CREATE TABLE `entregadores` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `cnh` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(240) NOT NULL,
  `imagem` varchar(240) DEFAULT NULL,
  `veiculo` varchar(240) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `expediente`
--
CREATE TABLE `expediente` (
  `id` int UNSIGNED NOT NULL,
  `dia` int NOT NULL,
  `dia_descricao` varchar(50) NOT NULL,
  `abertura` time DEFAULT NULL,
  `fechamento` time DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `extras`
--
CREATE TABLE `extras` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `preco` decimal(10, 2) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `formas_pagamento`
--
CREATE TABLE `formas_pagamento` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `medidas`
--
CREATE TABLE `medidas` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `migrations`
--
CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `produtos`
--
CREATE TABLE `produtos` (
  `id` int UNSIGNED NOT NULL,
  `categoria_id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `ingredientes` text NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `imagem` varchar(200) NOT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `produtos_especificacoes`
--
CREATE TABLE `produtos_especificacoes` (
  `id` int UNSIGNED NOT NULL,
  `produto_id` int UNSIGNED NOT NULL,
  `medida_id` int UNSIGNED NOT NULL,
  `preco` decimal(10, 2) NOT NULL,
  `customizavel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `produtos_extras`
--
CREATE TABLE `produtos_extras` (
  `id` int UNSIGNED NOT NULL,
  `produto_id` int UNSIGNED NOT NULL,
  `extra_id` int UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

-- --------------------------------------------------------
--
-- Estrutura para tabela `usuarios`
--
CREATE TABLE `usuarios` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  `password_hash` varchar(255) NOT NULL,
  `ativacao_hash` varchar(64) DEFAULT NULL,
  `reset_hash` varchar(64) DEFAULT NULL,
  `reset_expira_em` datetime DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `deletado_em` datetime DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb3;

--
-- Índices para tabelas despejadas
--
--
-- Índices de tabela `bairros`
--
ALTER TABLE
  `bairros`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE
  `categorias`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `entregadores`
--
ALTER TABLE
  `entregadores`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `cpf` (`cpf`),
ADD
  UNIQUE KEY `cnh` (`cnh`),
ADD
  UNIQUE KEY `email` (`email`),
ADD
  UNIQUE KEY `telefone` (`telefone`);

--
-- Índices de tabela `expediente`
--
ALTER TABLE
  `expediente`
ADD
  PRIMARY KEY (`id`);

--
-- Índices de tabela `extras`
--
ALTER TABLE
  `extras`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `formas_pagamento`
--
ALTER TABLE
  `formas_pagamento`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `medidas`
--
ALTER TABLE
  `medidas`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE
  `migrations`
ADD
  PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE
  `produtos`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nome` (`nome`),
ADD
  KEY `produtos_categoria_id_foreign` (`categoria_id`);

--
-- Índices de tabela `produtos_especificacoes`
--
ALTER TABLE
  `produtos_especificacoes`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `produtos_especificacoes_produto_id_foreign` (`produto_id`),
ADD
  KEY `produtos_especificacoes_medida_id_foreign` (`medida_id`);

--
-- Índices de tabela `produtos_extras`
--
ALTER TABLE
  `produtos_extras`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `produtos_extras_produto_id_foreign` (`produto_id`),
ADD
  KEY `produtos_extras_extra_id_foreign` (`extra_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE
  `usuarios`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `email` (`email`),
ADD
  UNIQUE KEY `cpf` (`cpf`),
ADD
  UNIQUE KEY `ativacao_hash` (`ativacao_hash`),
ADD
  UNIQUE KEY `reset_hash` (`reset_hash`);

--
-- AUTO_INCREMENT para tabelas despejadas
--
--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE
  `bairros`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE
  `categorias`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `entregadores`
--
ALTER TABLE
  `entregadores`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `expediente`
--
ALTER TABLE
  `expediente`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `extras`
--
ALTER TABLE
  `extras`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formas_pagamento`
--
ALTER TABLE
  `formas_pagamento`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medidas`
--
ALTER TABLE
  `medidas`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE
  `migrations`
MODIFY
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE
  `produtos`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos_especificacoes`
--
ALTER TABLE
  `produtos_especificacoes`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos_extras`
--
ALTER TABLE
  `produtos_extras`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE
  `usuarios`
MODIFY
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--
--
-- Restrições para tabelas `produtos`
--
ALTER TABLE
  `produtos`
ADD
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Restrições para tabelas `produtos_especificacoes`
--
ALTER TABLE
  `produtos_especificacoes`
ADD
  CONSTRAINT `produtos_especificacoes_medida_id_foreign` FOREIGN KEY (`medida_id`) REFERENCES `medidas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT `produtos_especificacoes_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `produtos_extras`
--
ALTER TABLE
  `produtos_extras`
ADD
  CONSTRAINT `produtos_extras_extra_id_foreign` FOREIGN KEY (`extra_id`) REFERENCES `extras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
  CONSTRAINT `produtos_extras_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;