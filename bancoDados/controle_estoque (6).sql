-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/08/2024 às 15:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controle_estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `message`, `rating`, `created_at`) VALUES
(1, 'cavalffj@gmail.com', 'amei ', 5, '2024-08-08 12:36:42'),
(2, 'cavalffj@gmail.com', 'amei muitoo o site principalmete o criador se eu pego ele meu deus esse cara é um lindo gostoso eu amo esse carlos tlc o cara é um Deus meu principe ', 1, '2024-08-08 12:38:02'),
(3, 'carlosepgoncalves63@gmail.com', 'O Carlos é um  lindo um ´principe amei o site esse deus sem ele eu n sei o que eu seria que bom que esse lindo fez esse site completamente útil, meu princeso,meu delicio', 1, '2024-08-08 12:41:07'),
(4, 'Floriadm@gmail.com', 'Sucesso!!!!!!!!!', 4, '2024-08-09 12:53:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `acao` varchar(50) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `produto_nome` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `historico`
--

INSERT INTO `historico` (`id`, `acao`, `produto_id`, `produto_nome`, `quantidade`, `data`) VALUES
(7, 'Adicionado', 47, 'pc gamer', 5, '2024-08-20 11:44:58'),
(8, 'Retirado', 47, 'pc gamer', 2, '2024-08-20 11:45:26'),
(9, 'Adicionado', 48, 'CSGO', 1, '2024-08-21 11:13:04'),
(10, 'Editado', 48, 'CSGOoooo', 1, '2024-08-21 11:13:20'),
(11, 'Editado', 47, 'pc gamer do lucas', 4, '2024-08-21 12:48:10'),
(12, 'Editado', 48, 'CSGO', 1, '2024-08-22 11:13:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `data_validade` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `uso` text DEFAULT NULL,
  `data_entrada` datetime DEFAULT current_timestamp(),
  `categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `preco`, `data_validade`, `descricao`, `uso`, `data_entrada`, `categoria`) VALUES
(47, 'pc gamer do lucas', 4, 2500.00, '0000-00-00', 'PC gamer para jogos', NULL, '2024-08-20 08:44:58', 'objetos'),
(48, 'CSGO', 1, 300.00, '0000-00-00', 'Jogo de Fps', NULL, '2024-08-21 08:13:04', 'objetos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `whatsapp`, `cpf`, `username`, `senha`, `is_verified`) VALUES
(1, 'car', 'car@gmail.com', '123', '134', 'car', '$2y$10$2ZNAT6JYbV6/j1vBX.B6xODBgn.p4aajb/4ifaoTzi0j2xBg44PN6', 0),
(2, 'a', 'a@gmail.com', 'a', 'a', 'a', '$2y$10$pX.DlUE7pEEJKMGMWZZIu.BI5B77HmgSQzbZ.yn1aB2uRhBIDVave', 0),
(3, 'car', 'cavalo@gmail.com', '312', '4314', 'cavalo', '$2y$10$oQmB69W.7L.w/t/W.dKrm.unYSPHfVoqsVLENpY9oGYfJwrLDvew.', 0),
(4, 'al', 'al@gmail.com', '22', '22', 'al', '$2y$10$ukOIVs33Qdp4duhuqgtlmugWIE2PuG0gf0ph5bqtw9YKxOBTos8PO', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historico_ibfk_1` (`produto_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
