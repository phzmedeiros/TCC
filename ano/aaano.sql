-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2023 às 19:40
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
('12312312315', 'juca', 'prod.tawio@gmail.com'),
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
(5, 'Oct?vio Augusto Siqueira da Silva', 'babaca', '234', '2023-11-15', 'cadu'),
(6, 'Hlenna', 'babaca', '321', '2023-11-15', 'casd');

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
  `nome_do_voluntario_6` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_7` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_8` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_9` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_10` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_11` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_12` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_13` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_14` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_15` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_16` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_17` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_18` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_19` varchar(255) DEFAULT NULL,
  `nome_do_voluntario_20` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipes`
--

INSERT INTO `equipes` (`id`, `nome_da_equipe`, `nome_do_voluntario_lider`, `nome_do_voluntario_1`, `nome_do_voluntario_2`, `nome_do_voluntario_3`, `nome_do_voluntario_4`, `nome_do_voluntario_5`, `nome_do_voluntario_6`, `nome_do_voluntario_7`, `nome_do_voluntario_8`, `nome_do_voluntario_9`, `nome_do_voluntario_10`, `nome_do_voluntario_11`, `nome_do_voluntario_12`, `nome_do_voluntario_13`, `nome_do_voluntario_14`, `nome_do_voluntario_15`, `nome_do_voluntario_16`, `nome_do_voluntario_17`, `nome_do_voluntario_18`, `nome_do_voluntario_19`, `nome_do_voluntario_20`) VALUES
(5, 'juca', '181', '181', '182', '183', '184', '185', '186', '187', '188', '189', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(13, 'Octávio Augusto Siqueira da Silva', 'tavioaugus@gmail.com', 'Rua dos Ipês - de 156/157 ao fim, 614', 'gay', '1999885544', '+5519994111292', '89', '123', 'ka', 'popo pipi papa pepe');

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
(119, 'lcuas'),
(120, 'artu'),
(121, 'kaka'),
(122, 'pedro'),
(123, 'joao'),
(124, 'samu'),
(125, 'carlo'),
(126, 'wilton'),
(127, 'lcuas'),
(128, 'artu'),
(129, 'kaka'),
(130, 'pedro'),
(131, 'joao'),
(132, 'samu'),
(133, 'carlo'),
(134, 'wilton'),
(135, 'lcuas'),
(136, 'artu'),
(137, 'kaka'),
(138, 'pedro'),
(139, 'joao'),
(140, 'samu'),
(141, 'carlo'),
(142, 'wilton'),
(143, 'lcuas'),
(144, 'artu'),
(145, 'kaka'),
(146, 'pedro'),
(147, 'joao'),
(148, 'samu'),
(149, 'carlo'),
(150, 'wilton'),
(151, 'lcuas'),
(152, 'artu'),
(153, 'kaka'),
(154, 'jao'),
(155, 'dada'),
(156, 'vivi'),
(157, 'tata'),
(158, 'caca'),
(159, 'aa'),
(160, 'pepe'),
(161, 'bebe'),
(162, 'dede'),
(163, 'jao'),
(164, 'dada'),
(165, 'vivi'),
(166, 'tata'),
(167, 'caca'),
(168, 'aa'),
(169, 'pepe'),
(170, 'bebe'),
(171, 'dede'),
(172, 'jao'),
(173, 'dada'),
(174, 'vivi'),
(175, 'tata'),
(176, 'caca'),
(177, 'aa'),
(178, 'pepe'),
(179, 'bebe'),
(180, 'dede'),
(181, 'jao'),
(182, 'dada'),
(183, 'vivi'),
(184, 'tata'),
(185, 'caca'),
(186, 'aa'),
(187, 'pepe'),
(188, 'bebe'),
(189, 'dede');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuariosa`
--
ALTER TABLE `usuariosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
