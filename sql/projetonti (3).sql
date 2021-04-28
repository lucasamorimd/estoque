-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Mar-2020 às 18:39
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
  `codigo_estoque` bigint(255) NOT NULL,
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
  `codigo_estoque` bigint(255) NOT NULL,
  `quantidade` int(80) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `codigo_usuario` int(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`codigo_estoque`, `quantidade`, `descricao`, `codigo_usuario`) VALUES
(6008050077, 0, 'CAIXA DE CABOS UTP 305 METROS CAT5]', 4037),
(6008130005, 0, 'CANALETA P/PAREDE PVC BRANCO COM ADESIVO AUTO COLANTE 20X20]', 4037),
(6102010073, 0, 'DESKTOP CORE I3 - ESTACAO AVANCADA, PROCES. INTEL CORE I3, PLACA DE REDE GIGABIT, 4GB DE MEMORIA DDR', 4037),
(6102010221, 0, 'DESKTOP CORE I5 65000, 8GB DE MEMORIA, HD 1Tb, MARCA LENOVO/DELL/HP, SEM SO, 2 ANOS DE GARANTIA ONSI', 4037),
(6102010226, 0, 'DESKTOP CORE I5, HD 500GB, 6GB DE MEMORIA, MARCA LENOVO/DELL/HP', 4037),
(6201040003, 0, 'ABRACADEIRA AMARR CAB NYLON 6,6 COMP 151MM LARG 3,70MM ESP 1,10MM DIAM MAX AMARRACAO 34MM]', 4037),
(6201040031, 0, 'ABRACADEIRA MATERIAL:VELCRO ROLO C/3M  COR: PRETO. (ELETRICA).]', 4037),
(6406010023, 8, 'CAIXA DE CABOS UTP 305 METROS CAT5', 3194),
(6406010024, 4, 'CAIXA DE CABOS UTP 305 METROS CAT6', 3194),
(6406010187, 100, 'CABO DE FORCA P/ CPU.PARA EQUIPAMENTOS DE INFORMATICA', 3194),
(6406010210, 14, 'FONTE - ATX 500W', 3194),
(6406010224, 7, 'HD - 500GB SATA 2 7200 RPM', 3194),
(6406010391, 2, 'FONTE PARA COMPUTADOR DELL OPTIPLEX 360', 3194),
(6406010396, 5, 'HD SSD KINGSTON 2.5 240GB A400 SATA III, LEITURAS: 500MBs GRAVACOES 350MBs SA400S3', 3194),
(6406010468, 15, 'SPIRADUTO 1/2 POLEGADA, BRANCO. ROLO 10 METROS', 3194),
(6406010472, 0, 'IDENTIFICADOR DE CABOS, REFERENCIA GHI-500, MARCA SPARTEC]', 4037),
(6406010511, 0, 'FONTE LENOVO PS-3181-02 180W THINKCENTRE M82 E73 M92 14 PINOS', 3194),
(6406010537, 0, 'FONTE MODELO L180AS-00 PARA DELL VOSTRO 3250', 3194),
(6406010601, 20, 'MOUSE USB', 3194),
(6406010615, 0, 'MEMÃ“RIA 4GB MARCA MUSHKIN 2400MHZ UDIMM PARA DESKTOP', 3194),
(6406010684, 0, 'FONTE MODELO: APA005 PARA ALL IN ONE LENOVO THINKCENTRE E73Z', 3194),
(6412040072, 0, 'MARCA TEXTO COR VERDE MARCA PILOT - UND', 4037),
(6511010044, 0, 'SERVICO DE CABEAMENTO (PASSAGEM DE CABOS UTP, FIBRA, TELEFONIA)]', 4037);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `codigo_saida` int(80) NOT NULL,
  `codigo_estoque` bigint(255) NOT NULL,
  `quantidade` int(80) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data_saida` date NOT NULL,
  `setor` varchar(100) NOT NULL,
  `codigo_usuario` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saida`
--

INSERT INTO `saida` (`codigo_saida`, `codigo_estoque`, `quantidade`, `descricao`, `data_saida`, `setor`, `codigo_usuario`) VALUES
(1, 6406010601, 1, 'MOUSE USB', '2020-03-07', 'Financeiro', 4037),
(2, 6406010601, 1, 'MOUSE USB', '2020-03-11', 'CONTAS A PAGAR', 4027);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tonners`
--

CREATE TABLE `tonners` (
  `codigo_tonners` bigint(255) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `codigo_usuario` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usuario` int(80) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `nome`, `email`, `senha`, `perfil`) VALUES
(3194, 'Alifer', 'alifer@nti.com', '123456', 1),
(4027, 'Jean Victor', 'jean@nti.com', '123456', 1),
(4037, 'Lucas Amorim', 'lucas@nti.com', '4040', 1);

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
-- Indexes for table `tonners`
--
ALTER TABLE `tonners`
  ADD PRIMARY KEY (`codigo_tonners`),
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
  MODIFY `codigo_saida` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

--
-- Limitadores para a tabela `tonners`
--
ALTER TABLE `tonners`
  ADD CONSTRAINT `tonners_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
