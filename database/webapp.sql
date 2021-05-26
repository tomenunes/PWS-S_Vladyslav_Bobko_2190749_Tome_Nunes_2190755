-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Maio-2016 às 15:27
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_bin NOT NULL,
  `ISBN` varchar(80) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `name`, `ISBN`) VALUES
(1, 'Lords of The Rings', '3453452-3454');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `aviao` (
  `id` int(11) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `lotacao` decimal(10,0) NOT NULL,
  `tipo_aviao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagemvenda`
--

CREATE TABLE `passagemvenda` (
  `id` int(11) NOT NULL,
  `id_voos` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `tipo_bilhete` enum('ida','id_volta') NOT NULL,
  `preco` float NOT NULL,
  `data_venda` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `Id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `morada` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nif` int(11) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil` int(11) NOT NULL,
  `Role` int(11) NOT NULL DEFAULT 0,
  `sessionid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voos`
--

CREATE TABLE `voos` (
  `Id` int(11) NOT NULL,
  `id_aviao` int(11) NOT NULL,
  `Aeroporto_Destino` varchar(255) NOT NULL,
  `Aeroporto_Origem` varchar(255) NOT NULL,
  `Data_destino` datetime NOT NULL,
  `data_origem` datetime NOT NULL,
  `distancia` int(11) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aviao`
--
ALTER TABLE `aviao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `passagemvenda`
--
ALTER TABLE `passagemvenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utilizador_id_user` (`id_utilizador`),
  ADD KEY `fk_voos_id_voos` (`id_voos`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `voos`
--
ALTER TABLE `voos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `pk_voos_aviao` (`id_aviao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aviao`
--
ALTER TABLE `aviao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `passagemvenda`
--
ALTER TABLE `passagemvenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `voos`
--
ALTER TABLE `voos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `passagemvenda`
--
ALTER TABLE `passagemvenda`
  ADD CONSTRAINT `fk_utilizador_id_user` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`Id`),
  ADD CONSTRAINT `fk_voos_id_voos` FOREIGN KEY (`id_voos`) REFERENCES `voos` (`Id`);

--
-- Limitadores para a tabela `voos`
--
ALTER TABLE `voos`
  ADD CONSTRAINT `pk_voos_aviao` FOREIGN KEY (`id_aviao`) REFERENCES `aviao` (`id`);
COMMIT;
