-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Mar-2020 às 16:24
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetonti`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `codigo_entrada` int(80) NOT NULL,
  `codigo_estoque` int(80) NOT NULL,
  `quantidade` int(80) NOT NULL,
  `data_entrada` date NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `natureza` varchar(100) NOT NULL,
  `codigo_usuario` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `codigo_estoque` int(80) NOT NULL,
  `quantidade` int(80) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `codigo_usuario` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`codigo_estoque`, `quantidade`, `descricao`, `codigo_usuario`) VALUES
(5201236, 120, 'asdf', 4037);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `codigo_saida` int(80) NOT NULL,
  `codigo_estoque` int(80) NOT NULL,
  `quantidade` int(80) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data_saida` date NOT NULL,
  `setor` varchar(100) NOT NULL,
  `codigo_usuario` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usuario` int(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `perfil` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `email`, `senha`, `nome`, `perfil`) VALUES
(3194, 'adm@nti.com', '123456', 'Alifer', 1),
(4037, 'lucas.duarte@unieuro.edu.br', '4040', 'Lucas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`codigo_entrada`),
  ADD KEY `codigo_estoque` (`codigo_estoque`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`codigo_estoque`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`codigo_saida`),
  ADD KEY `codigo_estoque` (`codigo_estoque`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `codigo_entrada` int(80) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saida`
--
ALTER TABLE `saida`
  MODIFY `codigo_saida` int(80) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_ibfk_1` FOREIGN KEY (`codigo_estoque`) REFERENCES `estoque` (`codigo_estoque`),
  ADD CONSTRAINT `entrada_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `saida`
--
ALTER TABLE `saida`
  ADD CONSTRAINT `saida_ibfk_1` FOREIGN KEY (`codigo_estoque`) REFERENCES `estoque` (`codigo_estoque`),
  ADD CONSTRAINT `saida_ibfk_2` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
