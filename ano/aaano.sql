-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/11/2023 às 01:51
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
-- Estrutura para tabela `adesao`
--

CREATE TABLE `adesao` (
  `cpf` varchar(20) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adesao`
--

INSERT INTO `adesao` (`cpf`, `nome`, `email`) VALUES
('12312312343', 'Teste', 'teste@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ado_block`
--

CREATE TABLE `ado_block` (
  `id` int(11) NOT NULL,
  `nome_adotante` varchar(255) DEFAULT NULL,
  `descricao_bloqueio` text DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `data_bloqueio` date DEFAULT NULL,
  `voluntario_que_registrou` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ado_block`
--

INSERT INTO `ado_block` (`id`, `nome_adotante`, `descricao_bloqueio`, `cpf`, `data_bloqueio`, `voluntario_que_registrou`) VALUES
(3, 'Fulano', 'Abandono', '32132132100', '2023-10-31', 'Cadu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nome_da_equipe` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_lider` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_1` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_2` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_3` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_4` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_5` varchar(255) DEFAULT NULL,
  `id_voluntario_lider` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipes`
--

INSERT INTO `equipes` (`id`, `nome_da_equipe`, `nome_do_voluntario_lider`, `nome_do_voluntario_1`, `nome_do_voluntario_2`, `nome_do_voluntario_3`, `nome_do_voluntario_4`, `nome_do_voluntario_5`, `id_voluntario_lider`) VALUES
(14, 'Casa', '49', '49', '50', '51', '52', NULL, NULL);

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
(8, 'Teste', 'teste@gmail.com', 'Teste', 'Teste', '12123464321', '12123464321', '123098765411', '12312312343', 'Canil', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuariosa`
--

CREATE TABLE `usuariosa` (
  `id` int(11) NOT NULL,
  `nome_do_voluntario` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
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
-- Despejando dados para a tabela `usuariosa`
--

INSERT INTO `usuariosa` (`id`, `nome_do_voluntario`, `email`, `senha`, `endereco`, `profissao`, `cell`, `tell_emergencia`, `rg`, `cpf`, `equipe_pertencente`, `obs`) VALUES
(1, 'ADM', 'adm@gmail.com', 'adm123', 'Rua AAANO', 'TI', '19 99999 9999', '19 99999 9999', '12345678901', '12312312312', 'Lider', 'Gente fina');

-- --------------------------------------------------------

--
-- Estrutura para tabela `voluntarios`
--

CREATE TABLE `voluntarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `voluntarios`
--

INSERT INTO `voluntarios` (`id`, `nome`) VALUES
(39, 'jao'),
(40, 'atqo'),
(41, 'pedo'),
(42, 'jao'),
(43, 'atqo'),
(44, 'pedo'),
(45, 'atur'),
(46, 'sil'),
(47, 'davi'),
(48, 'jao'),
(49, 'jao'),
(50, 'atqo'),
(51, 'pedo'),
(52, 'atur');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adesao`
--
ALTER TABLE `adesao`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `ado_block`
--
ALTER TABLE `ado_block`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_voluntario_lider` (`id_voluntario_lider`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuariosa`
--
ALTER TABLE `usuariosa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ado_block`
--
ALTER TABLE `ado_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuariosa`
--
ALTER TABLE `usuariosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_ibfk_1` FOREIGN KEY (`id_voluntario_lider`) REFERENCES `voluntarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
