-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Abr-2023 às 16:07
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `location_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_edificio`
--

CREATE TABLE `tb_edificio` (
  `cod_edificio` int(11) NOT NULL,
  `Endereco` varchar(40) NOT NULL,
  `Longitude` varchar(20) NOT NULL,
  `Latitude` varchar(20) NOT NULL,
  `cod_quarteirao` int(11) NOT NULL,
  `name_user` varchar(20) NOT NULL,
  `Data_hora` varchar(20) NOT NULL,
  `cod_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_edificio`
--

INSERT INTO `tb_edificio` (`cod_edificio`, `Endereco`, `Longitude`, `Latitude`, `cod_quarteirao`, `name_user`, `Data_hora`, `cod_usuario`) VALUES
(4, 'Kilamba', '13.2581591', '-8.9987715', 1, 'Nginamau', '2022-08-13 17:14', 109),
(7, 'Golf', '13.2581591', '-8.9987715', 1, 'Nginamau', '2022-08-27 18:47', 109);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `cod_mensagem` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `userna` varchar(20) NOT NULL,
  `cooordenada` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_mensagem`
--

INSERT INTO `tb_mensagem` (`cod_mensagem`, `cod_usuario`, `userna`, `cooordenada`) VALUES
(23, 133, 'Edgar', 'Lat: 7777777-Log: 1122323 -Golf'),
(24, 133, 'Edgar', 'Lat: 23232-Log: 1122323 -Golf'),
(25, 133, 'Edgar', 'Lat: 7777777-Log: 1122323 -Kilamba'),
(26, 133, 'Edgar', 'Lat: 7777777-Log: 1122323 -avo'),
(27, 133, 'Edgar', 'Lat: 7666-Log: 455 -avo'),
(28, 133, 'Edgar', 'Lat: 7777777-Log: 1122323 -Kilamba'),
(29, 133, 'Edgar', 'Lat: 23232-Log: 1122323 -Kilamba'),
(30, 133, 'Edgar', 'Lat: 7777777-Log: 1122323 -Kilamba'),
(31, 133, 'Edgar', 'Lat: 23232-Log: 1122323 -Kilamba');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel_acesso`
--

CREATE TABLE `tb_nivel_acesso` (
  `Cod_Nivel` int(11) NOT NULL,
  `Nivel` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_nivel_acesso`
--

INSERT INTO `tb_nivel_acesso` (`Cod_Nivel`, `Nivel`) VALUES
(1, 'Administracao'),
(2, 'Tecnico'),
(3, 'Visistante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_quarteirao`
--

CREATE TABLE `tb_quarteirao` (
  `cod_quarteirao` int(11) NOT NULL,
  `Desigancao_Quarteirao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_quarteirao`
--

INSERT INTO `tb_quarteirao` (`cod_quarteirao`, `Desigancao_Quarteirao`) VALUES
(1, 'Quarteirao A'),
(2, 'Quarteirao B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `cod_usuario` int(11) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `cod_nivel` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`cod_usuario`, `Login`, `Senha`, `cod_nivel`, `status`, `Email`) VALUES
(109, 'Edgarteste', '1234', 1, 0, 'albertokosi123@gmail.com'),
(133, 'Edgar', '1234', 3, 0, 'lemos@gmail.com'),
(134, 'admin', '1234', 1, 1, 'aass@');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_edificio`
--
ALTER TABLE `tb_edificio`
  ADD PRIMARY KEY (`cod_edificio`),
  ADD KEY `tb_edificio_ibfk_1` (`cod_quarteirao`),
  ADD KEY `tb_edificio_ibfk_2` (`cod_usuario`);

--
-- Índices para tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`cod_mensagem`),
  ADD KEY `tb_mensagem_ibfk_2` (`cod_usuario`);

--
-- Índices para tabela `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  ADD PRIMARY KEY (`Cod_Nivel`) USING BTREE;

--
-- Índices para tabela `tb_quarteirao`
--
ALTER TABLE `tb_quarteirao`
  ADD PRIMARY KEY (`cod_quarteirao`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`cod_usuario`) USING BTREE,
  ADD KEY `tb_usuario_ibfk_1` (`cod_nivel`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_edificio`
--
ALTER TABLE `tb_edificio`
  MODIFY `cod_edificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_nivel_acesso`
--
ALTER TABLE `tb_nivel_acesso`
  MODIFY `Cod_Nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_quarteirao`
--
ALTER TABLE `tb_quarteirao`
  MODIFY `cod_quarteirao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_edificio`
--
ALTER TABLE `tb_edificio`
  ADD CONSTRAINT `tb_edificio_ibfk_1` FOREIGN KEY (`cod_quarteirao`) REFERENCES `tb_quarteirao` (`cod_quarteirao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_edificio_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD CONSTRAINT `tb_mensagem_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`cod_nivel`) REFERENCES `tb_nivel_acesso` (`Cod_Nivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
