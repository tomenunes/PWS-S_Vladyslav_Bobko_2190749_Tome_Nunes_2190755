-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2021 às 21:54
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `webapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aeroportos`
--

CREATE TABLE `aeroportos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aeroportos`
--

INSERT INTO `aeroportos` (`id`, `nome`) VALUES
(1, 'lisboa'),
(2, 'porto'),
(3, 'madrid'),
(4, 'roma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviaos`
--

CREATE TABLE `aviaos` (
  `id` int(11) NOT NULL,
  `referencia` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `lotacao` decimal(10,0) NOT NULL,
  `tipo_aviao` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `aviaos`
--

INSERT INTO `aviaos` (`id`, `referencia`, `lotacao`, `tipo_aviao`) VALUES
(1, 'A1111111', '145', 'teste'),
(2, 'A222222', '160', 'teste'),
(4, 'A333333', '12', 'teste'),
(5, 'A444444', '150', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escalas`
--

CREATE TABLE `escalas` (
  `id` int(11) NOT NULL,
  `id_voos` int(11) NOT NULL,
  `id_aviao` int(11) NOT NULL,
  `id_aeroporto_origem` int(11) NOT NULL,
  `id_aeroporto_destino` int(11) NOT NULL,
  `data_destino` datetime NOT NULL,
  `data_origem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `escalas`
--

INSERT INTO `escalas` (`id`, `id_voos`, `id_aviao`, `id_aeroporto_origem`, `id_aeroporto_destino`, `data_destino`, `data_origem`) VALUES
(1, 1, 1, 1, 4, '2021-08-17 18:34:00', '2021-06-22 18:34:00'),
(2, 1, 1, 2, 1, '2021-06-24 10:50:09', '2021-06-01 10:50:09'),
(3, 2, 2, 1, 1, '2027-06-14 16:17:00', '2021-06-16 16:17:00'),
(4, 2, 1, 2, 2, '2021-06-08 15:47:37', '2021-05-29 16:50:37'),
(5, 2, 5, 2, 3, '2021-07-09 00:00:00', '2021-06-09 17:24:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagemvendas`
--

CREATE TABLE `passagemvendas` (
  `id` int(11) NOT NULL,
  `id_voos` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `tipo_bilhete` enum('ida','ida_volta') CHARACTER SET utf8mb4 NOT NULL,
  `preco` float NOT NULL,
  `data_venda` datetime NOT NULL DEFAULT current_timestamp(),
  `checkin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Extraindo dados da tabela `passagemvendas`
--

INSERT INTO `passagemvendas` (`id`, `id_voos`, `id_utilizador`, `tipo_bilhete`, `preco`, `data_venda`, `checkin`) VALUES
(1, 1, 1, 'ida', 18, '2021-06-07 18:09:21', 1),
(2, 1, 1, 'ida', 200, '2021-06-21 11:43:17', 0),
(3, 1, 1, 'ida', 200, '2021-06-21 11:43:45', 0),
(4, 5, 1, 'ida_volta', 800, '2021-06-21 12:15:35', 0),
(5, 1, 1, 'ida_volta', 400, '2021-06-21 15:03:20', 0),
(6, 1, 1, 'ida_volta', 400, '2021-06-21 15:05:19', 0),
(7, 1, 1, 'ida_volta', 400, '2021-06-21 15:05:29', 0),
(8, 1, 1, 'ida_volta', 400, '2021-06-21 15:08:36', 0),
(9, 1, 1, 'ida_volta', 400, '2021-06-21 15:08:44', 0),
(10, 6, 1, 'ida', 350, '2021-06-21 15:12:34', 0),
(11, 6, 1, 'ida', 350, '2021-06-21 15:13:02', 0),
(12, 6, 1, 'ida', 350, '2021-06-21 15:13:33', 0),
(13, 6, 1, 'ida', 350, '2021-06-21 15:15:44', 1),
(14, 6, 1, 'ida', 350, '2021-06-21 15:18:38', 0),
(15, 6, 1, 'ida', 350, '2021-06-21 15:19:14', 0),
(16, 6, 1, 'ida', 350, '2021-06-21 15:21:23', 0),
(17, 6, 1, 'ida', 350, '2021-06-21 15:26:24', 0),
(18, 4, 1, 'ida', 140, '2021-06-21 16:03:13', 0),
(19, 4, 1, 'ida', 140, '2021-06-21 16:03:42', 0),
(20, 4, 1, 'ida', 140, '2021-06-21 16:03:58', 0),
(21, 4, 1, 'ida', 140, '2021-06-21 16:04:42', 0),
(22, 1, 6, 'ida', 200, '2021-06-21 20:42:01', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nif` int(11) NOT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `Role` enum('Passageiro','operadorcheckin','gestorvoo','admin') NOT NULL DEFAULT 'Passageiro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`Id`, `nome`, `morada`, `email`, `nif`, `telefone`, `username`, `password`, `Role`) VALUES
(1, 'Gestor de voo', NULL, 'gestorvoo@teste.com', 2147483647, NULL, '', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'gestorvoo'),
(2, 'passageiro', NULL, 'passageiro@teste.com', 2147483647, NULL, '', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'Passageiro'),
(3, 'admin', NULL, 'admin@teste.com', 2147483647, NULL, '', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'admin'),
(4, 'Operador check-in', NULL, 'operadorcheckin@teste.com', 2147483647, NULL, '', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'operadorcheckin'),
(5, '122', NULL, '122@sad', 122, NULL, '122', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'Passageiro'),
(6, 'Tomé Nunes', 'lote 2', 'tome.nunes1@gmail.com', 1234567, '965163413', '11111', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'Passageiro'),
(7, 'teste', NULL, 'teste@teste', 1234, NULL, 'teste', 'kh1TlVwiCoY8nF0z3UUynG90RxxSLqXUbqg42NSDgFU=', 'Passageiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voos`
--

CREATE TABLE `voos` (
  `Id` int(11) NOT NULL,
  `preco` float NOT NULL,
  `id_aeroporto_inicial` int(11) NOT NULL,
  `id_aeroporto_final` int(11) NOT NULL,
  `data_inicial` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `escalas_total` int(11) NOT NULL,
  `estado` enum('Agendado','Ativo','Finalizado','') NOT NULL DEFAULT 'Agendado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `voos`
--

INSERT INTO `voos` (`Id`, `preco`, `id_aeroporto_inicial`, `id_aeroporto_final`, `data_inicial`, `data_final`, `escalas_total`, `estado`) VALUES
(1, 200, 1, 3, '2021-06-08 12:31:36', '2021-07-09 12:31:50', 1, 'Agendado'),
(2, 14, 1, 3, '2021-06-08 12:31:40', '2021-07-09 12:31:50', 3, 'Agendado'),
(3, 290, 1, 3, '2021-06-27 12:31:46', '2021-07-09 12:31:50', 0, 'Agendado'),
(4, 140, 1, 4, '2021-06-10 16:27:00', '2021-10-21 16:27:00', 0, 'Finalizado'),
(5, 400, 1, 4, '2021-06-02 18:28:00', '2021-09-15 18:28:00', 0, 'Agendado'),
(6, 350, 2, 4, '2021-06-30 18:53:00', '2021-08-31 18:53:00', 0, 'Agendado'),
(7, 123, 1, 4, '2021-06-17 17:24:00', '2021-09-29 17:25:00', 0, 'Finalizado');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aeroportos`
--
ALTER TABLE `aeroportos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aviaos`
--
ALTER TABLE `aviaos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `escalas`
--
ALTER TABLE `escalas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aero_escala` (`id_aeroporto_destino`),
  ADD KEY `fk_escala_aero` (`id_aeroporto_origem`),
  ADD KEY `fk_voos_escalas` (`id_voos`),
  ADD KEY `fk_escala_aviao` (`id_aviao`);

--
-- Índices para tabela `passagemvendas`
--
ALTER TABLE `passagemvendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utilizador_id_user` (`id_utilizador`),
  ADD KEY `fk_voos_id_voos` (`id_voos`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Índices para tabela `voos`
--
ALTER TABLE `voos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_aeroport_inicial` (`id_aeroporto_inicial`),
  ADD KEY `fk_aeroport_final` (`id_aeroporto_final`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aviaos`
--
ALTER TABLE `aviaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `escalas`
--
ALTER TABLE `escalas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `passagemvendas`
--
ALTER TABLE `passagemvendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `voos`
--
ALTER TABLE `voos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `escalas`
--
ALTER TABLE `escalas`
  ADD CONSTRAINT `fk_aero_escala` FOREIGN KEY (`id_aeroporto_destino`) REFERENCES `aeroportos` (`id`),
  ADD CONSTRAINT `fk_escala_aero` FOREIGN KEY (`id_aeroporto_origem`) REFERENCES `aeroportos` (`id`),
  ADD CONSTRAINT `fk_escala_aviao` FOREIGN KEY (`id_aviao`) REFERENCES `aviaos` (`id`),
  ADD CONSTRAINT `fk_voos_escalas` FOREIGN KEY (`id_voos`) REFERENCES `voos` (`Id`);

--
-- Limitadores para a tabela `passagemvendas`
--
ALTER TABLE `passagemvendas`
  ADD CONSTRAINT `fk_utilizador_id_user` FOREIGN KEY (`id_utilizador`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `fk_voos_id_voos` FOREIGN KEY (`id_voos`) REFERENCES `voos` (`Id`);

--
-- Limitadores para a tabela `voos`
--
ALTER TABLE `voos`
  ADD CONSTRAINT `fk_aeroport_final` FOREIGN KEY (`id_aeroporto_final`) REFERENCES `aeroportos` (`id`),
  ADD CONSTRAINT `fk_aeroport_inicial` FOREIGN KEY (`id_aeroporto_inicial`) REFERENCES `aeroportos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
