-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2020 às 02:01
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `psico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_psicologo` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `data_agenda` date DEFAULT NULL,
  `valor` varchar(60) DEFAULT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id_psicologo`, `hora`, `data_agenda`, `valor`, `id_paciente`, `id_agenda`) VALUES
(1, '12:10:13', '2020-09-29', '150,00', 2, 1),
(1, '13:30:00', '0000-00-00', '150', 0, 2),
(1, '14:30:00', '2020-10-02', '170,00', 2, 3),
(1, '14:30:00', '2020-10-15', '230,00', 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `email`, `senha`) VALUES
(1, '802.098@unigran.br', 'michelle21'),
(2, 'henriques.g@hotmail.com', '12345'),
(3, '802.097@unigran.br', '12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `modo_pagamento` varchar(60) DEFAULT NULL,
  `area_especifica` varchar(60) DEFAULT NULL,
  `plano_saude` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `modo_pagamento`, `area_especifica`, `plano_saude`) VALUES
(1, 'boleto', 'comportamental', 'cassems');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id_psicologo` int(11) DEFAULT NULL,
  `id_pagamento` int(11) NOT NULL,
  `descricao` varchar(10) DEFAULT NULL,
  `data_pag` date DEFAULT NULL,
  `valor` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id_psicologo`, `id_pagamento`, `descricao`, `data_pag`, `valor`) VALUES
(NULL, 4, 'Conta de A', '1995-02-12', '300'),
(NULL, 5, 'Agua', '2020-12-27', '150.00'),
(NULL, 8, 'Internet', '2020-11-12', '149');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `nome` varchar(60) DEFAULT NULL,
  `cpf` varchar(60) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`nome`, `cpf`, `telefone`, `endereco`, `email`, `tipo`, `id_pessoa`) VALUES
('Michelle', '00000000000', '991234587', 'rua jose alves cavalheiro', '802.098@unigran.br', 'psicologo', 1),
('Vitor Gimenes', '14785236952', '67992076633', 'Rua perdido, número infinito', 'henriques.g@hotmail.com', 'paciente', 2),
('Vitor', '00000000000', '991234587', 'rua jose alves cavalheiro', '802.097@unigran.br', 'psicologo', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planosaude`
--

CREATE TABLE `planosaude` (
  `id_plano` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `tipo` varchar(60) DEFAULT NULL,
  `valor` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planosaude`
--

INSERT INTO `planosaude` (`id_plano`, `nome`, `tipo`, `valor`) VALUES
(2, 'adriana', 'nenhum', '120.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `psicologo`
--

CREATE TABLE `psicologo` (
  `id_psicologo` int(11) NOT NULL,
  `area_especializado` varchar(60) DEFAULT NULL,
  `valor_consulta` varchar(60) DEFAULT NULL,
  `atend_planosaude` varchar(60) DEFAULT NULL,
  `crp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `psicologo`
--

INSERT INTO `psicologo` (`id_psicologo`, `area_especializado`, `valor_consulta`, `atend_planosaude`, `crp`) VALUES
(3, 'comportamental', '150.00', 'sim', 'XX/351.476');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recebimento`
--

CREATE TABLE `recebimento` (
  `id_recebimento` int(11) NOT NULL,
  `id_psicologo` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `data_receb` date DEFAULT NULL,
  `plano_saude` varchar(60) DEFAULT NULL,
  `tipo_pagamento` varchar(60) DEFAULT NULL,
  `tipo_receita` varchar(60) DEFAULT NULL,
  `valor` varchar(10) NOT NULL,
  `nome_paciente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `recebimento`
--

INSERT INTO `recebimento` (`id_recebimento`, `id_psicologo`, `id_paciente`, `data_receb`, `plano_saude`, `tipo_pagamento`, `tipo_receita`, `valor`, `nome_paciente`) VALUES
(0, NULL, NULL, '1999-03-10', 'Unimed', 'Dinheiro', 'Consulta', '100.00', 'Paciente nome teste'),
(1, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(2, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(3, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(4, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(5, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(6, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(7, NULL, NULL, '2013-02-01', 'Cassems', 'Boleto Bancario', 'Consulta', '150.00', 'Paciente nome teste'),
(11, NULL, NULL, '2020-11-12', 'Unimed', 'Boleto Bancario', 'Consulta', '75', 'Paciente nome teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `planosaude`
--
ALTER TABLE `planosaude`
  ADD PRIMARY KEY (`id_plano`);

--
-- Índices para tabela `psicologo`
--
ALTER TABLE `psicologo`
  ADD PRIMARY KEY (`id_psicologo`);

--
-- Índices para tabela `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`id_recebimento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `planosaude`
--
ALTER TABLE `planosaude`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `psicologo`
--
ALTER TABLE `psicologo`
  MODIFY `id_psicologo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
