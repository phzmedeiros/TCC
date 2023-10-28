-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/09/2023 às 21:46
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aaano`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ado_block`
--

CREATE TABLE `ado_block` (
  `id` int(11) NOT NULL,
  `nome_adotante` varchar(255) NOT NULL,
  `descricao_bloqueio` text DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_bloqueio` date NOT NULL,
  `voluntario_que_registrou` varchar(255) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ado_block`
--

INSERT INTO `ado_block` (`id`, `nome_adotante`, `descricao_bloqueio`, `cpf`, `data_bloqueio`, `voluntario_que_registrou`, `data_cadastro`) VALUES
(2, 'claudio', 'comeu', '43628722802', '2023-09-27', 'jao', '2023-09-27 17:42:37');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nome_da_equipe` varchar(255) NOT NULL,
  `nome_do_voluntario_lider` varchar(255) NOT NULL,
  `nome_do_voluntario_1` varchar(255) NOT NULL,
  `nome_do_voluntario_2` varchar(255) NOT NULL,
  `nome_do_voluntario_3` varchar(255) NOT NULL,
  `nome_do_voluntario_4` varchar(255) NOT NULL,
  `nome_do_voluntario_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipes`
--

INSERT INTO `equipes` (`id`, `nome_da_equipe`, `nome_do_voluntario_lider`, `nome_do_voluntario_1`, `nome_do_voluntario_2`, `nome_do_voluntario_3`, `nome_do_voluntario_4`, `nome_do_voluntario_5`) VALUES
(1, 'CAchorro', 'juca', 'taqo', 'carlo', 'pedo', 'samu', 'nacin'),
(3, 'gatu', 'juca', 'taqo', 'carlo', 'pedo', 'samu', 'nacin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_do_voluntario` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `profissao` varchar(255) DEFAULT NULL,
  `cell` varchar(20) DEFAULT NULL,
  `tell_emergencia` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `equipe_pertencente` varchar(255) DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_do_voluntario`, `email`, `endereco`, `profissao`, `cell`, `tell_emergencia`, `rg`, `cpf`, `equipe_pertencente`, `obs`) VALUES
(1, 'joao', 'teste@gmail.com', 'rua sla ', 'puta', '19971470053', '34764226', '57409166', '43628722802', 'cachorro', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ado_block`
--
ALTER TABLE `ado_block`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ado_block`
--
ALTER TABLE `ado_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
