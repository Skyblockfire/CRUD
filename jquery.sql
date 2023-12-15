-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 07:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jquery`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Nome_Fantasia` varchar(255) NOT NULL,
  `CNPJ` varchar(255) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Telefone` varchar(255) NOT NULL,
  `Responsavel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `Nome`, `Nome_Fantasia`, `CNPJ`, `Endereco`, `Telefone`, `Responsavel`) VALUES
(4, 'TesteTeste', 'TesteTeste', '99.999.999/9999-99', 'Araras,SP', '(99)9999-9998', 'TesteTesteTesteTeste');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `Nome` varchar(255) NOT NULL,
  `Sobrenome` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `CNH` int(11) NOT NULL,
  `Telefone` varchar(255) NOT NULL,
  `Endereco` varchar(255) NOT NULL,
  `Carro` varchar(255) NOT NULL,
  `id_empresa` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `admin`, `Nome`, `Sobrenome`, `Senha`, `CPF`, `CNH`, `Telefone`, `Endereco`, `Carro`, `id_empresa`) VALUES
(1, 1, 'Matt', 'Teste', '1234', '999.999.999-99', 999999999, '1', 'R.Dos Desolados', 'Bugatti', NULL),
(4, 0, 'TesteTeste', 'TesteTeste', 'TesteTeste', '111.111.111-11', 2147483646, '(99)9999-9999', 'TesteTeste', 'TesteTeste', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
