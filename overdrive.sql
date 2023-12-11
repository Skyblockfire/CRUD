-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/12/2023 às 04:13
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
-- Banco de dados: `overdrive`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Nome_Fantasia` varchar(255) NOT NULL,
  `CNPJ` int(11) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Telefone` int(11) NOT NULL,
  `Responsavel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `Nome`, `Nome_Fantasia`, `CNPJ`, `Endereco`, `Telefone`, `Responsavel`) VALUES
(1, 'Overdrive', 'SobreDirigir', 1234014923, 'Paraíso', 1923526124, 'Diego'),
(2, 'Teste', 'Robesvaldson', 124326, 'R.Tristeza', 1923526124, 'Lucas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `Nome` varchar(255) NOT NULL,
  `Sobrenome` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `CPF` int(11) NOT NULL,
  `CNH` int(11) NOT NULL,
  `Telefone` int(14) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Carro` varchar(255) NOT NULL,
  `id_empresa` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `admin`, `Nome`, `Sobrenome`, `Senha`, `CPF`, `CNH`, `Telefone`, `Endereco`, `Carro`, `id_empresa`) VALUES
(1, 1, 'Matt', 'Teste', '1234', 999999999, 999999999, 1, 'R.Dos Desolados', 'Bugatti', NULL),
(2, 0, 'Teste ', 'Fácil', '1', 1, 1, 1, 'e', 'ed', 1),
(3, 0, 'teste', 'teste', 'teste', 1234, 1234, 1234, 'teste', 'teste', 1),
(4, 0, 'Teste2', 'TEste2', '1234', 134, 12334, 1234315, 'tqetsadt', 'teste', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
