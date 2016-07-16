-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 16/07/2016 às 14:37
-- Versão do servidor: 5.5.49-MariaDB-1ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `as-capacita-phalcon`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `iCidadeId` int(10) NOT NULL DEFAULT '0',
  `iProdutoId` int(10) NOT NULL,
  `sCidade` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `phones`
--

CREATE TABLE `phones` (
  `iPhoneId` int(10) UNSIGNED NOT NULL,
  `iUserId` int(10) NOT NULL,
  `sPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `iProdutoId` int(10) NOT NULL,
  `sNome` varchar(20) NOT NULL,
  `iValor` decimal(10,2) NOT NULL,
  `dtCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dtUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `produtos`
--

INSERT INTO `produtos` (`iProdutoId`, `sNome`, `iValor`, `dtCreated`, `dtUpdated`) VALUES
(2, 'umbrella', 10.00, '2016-07-16 11:23:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `iUserId` int(10) UNSIGNED NOT NULL,
  `sName` varchar(70) NOT NULL,
  `sEmail` varchar(70) NOT NULL,
  `dtCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dtUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`iUserId`, `sName`, `sEmail`, `dtCreated`, `dtUpdated`) VALUES
(8, 'otavio', 'otavio@agenciasys.com.br', '2016-07-15 20:15:59', '0000-00-00 00:00:00'),
(9, 'bruno', 'bruno@test.com.br', '2016-07-15 20:16:49', '0000-00-00 00:00:00'),
(10, 'bruno', 'bruno@test.com.br', '2016-07-15 20:17:20', '0000-00-00 00:00:00'),
(11, 'bruno1', 'bruno@test.com.br', '2016-07-15 20:17:54', '0000-00-00 00:00:00'),
(12, 'bruno25', 'bruno@test.com.br', '2016-07-15 20:18:11', '0000-00-00 00:00:00'),
(13, 'otavio', 'otavio@agenciasys.com.br', '2016-07-15 21:19:07', '0000-00-00 00:00:00'),
(14, 'bruno caue', 'teste@tes.com', '2016-07-15 21:19:42', '0000-00-00 00:00:00');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`iCidadeId`);

--
-- Índices de tabela `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`iPhoneId`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`iProdutoId`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iUserId`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `phones`
--
ALTER TABLE `phones`
  MODIFY `iPhoneId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `iProdutoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `iUserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
