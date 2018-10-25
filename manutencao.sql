-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2018 às 20:22
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manutencao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conserto`
--

CREATE TABLE `conserto` (
  `id` int(11) NOT NULL,
  `patri_maq` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `est_resp` int(11) NOT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  `defeito` varchar(60) NOT NULL,
  `conserto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conserto`
--

INSERT INTO `conserto` (`id`, `patri_maq`, `local`, `est_resp`, `data_entrada`, `data_saida`, `defeito`, `conserto`) VALUES
(1, 454567, 1, 1, '2018-10-10', NULL, 'teste', NULL),
(2, 454567, 1, 1, '2018-10-10', NULL, 'teste', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagiario`
--

CREATE TABLE `estagiario` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estagiario`
--

INSERT INTO `estagiario` (`id`, `nome`) VALUES
(1, 'Gabriel batista de Carvalho'),
(2, 'Rodolfo'),
(3, 'Higor'),
(4, 'Pablo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id` int(11) NOT NULL,
  `predio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id`, `predio`) VALUES
(1, 'Prédio 1'),
(2, 'Prédio 2'),
(3, 'Prédio de História'),
(4, 'Prédio de Psicologia'),
(5, 'Prédio Nova Central');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `email` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquina`
--

CREATE TABLE `maquina` (
  `patrimonio` int(11) NOT NULL,
  `processador` varchar(8) NOT NULL,
  `mem_ram` varchar(8) NOT NULL,
  `hd` varchar(8) NOT NULL,
  `mac` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maquina`
--

INSERT INTO `maquina` (`patrimonio`, `processador`, `mem_ram`, `hd`, `mac`) VALUES
(454567, 'i5', '2gb', '1tb', 'ha-3h-y4-hs-83-js-83'),
(456776, 'i7', '16gb', '2tb', 'hg-76-8u-oi-9o-09-hf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conserto`
--
ALTER TABLE `conserto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `predio_id_fk` (`local`) USING BTREE,
  ADD KEY `estagiario_id_fk` (`est_resp`) USING HASH,
  ADD KEY `maquina_patri_fk` (`patri_maq`) USING BTREE;

--
-- Indexes for table `estagiario`
--
ALTER TABLE `estagiario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estagiario_id` (`id`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`patrimonio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conserto`
--
ALTER TABLE `conserto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estagiario`
--
ALTER TABLE `estagiario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `local`
--
ALTER TABLE `local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maquina`
--
ALTER TABLE `maquina`
  MODIFY `patrimonio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456777;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conserto`
--
ALTER TABLE `conserto`
  ADD CONSTRAINT `estagiario_id_fk` FOREIGN KEY (`est_resp`) REFERENCES `estagiario` (`id`),
  ADD CONSTRAINT `local_id_fk` FOREIGN KEY (`local`) REFERENCES `local` (`id`),
  ADD CONSTRAINT `maquina_patri_fk` FOREIGN KEY (`patri_maq`) REFERENCES `maquina` (`patrimonio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
