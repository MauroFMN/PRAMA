-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 23-Maio-2022 às 04:21
-- Versão do servidor: 5.7.34
-- versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `praman`
--
CREATE DATABASE IF NOT EXISTS `praman` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `praman`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

DROP TABLE IF EXISTS `bairro`;
CREATE TABLE IF NOT EXISTS `bairro` (
  `codBairro` int(11) NOT NULL AUTO_INCREMENT,
  `codMunicipio` int(11) DEFAULT NULL,
  `nomeBairro` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codBairro`),
  KEY `codMunicipio` (`codMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`codBairro`, `codMunicipio`, `nomeBairro`) VALUES
(1, 92, 'Cassenda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `codConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `numOrdem` varchar(20) DEFAULT NULL,
  `codEspecialidade` int(11) DEFAULT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `dataConsulta` datetime DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `diagnosticoProvavel` varchar(255) DEFAULT NULL,
  `motivoConsulta` varchar(255) DEFAULT NULL,
  `resumoSindromico` varchar(255) DEFAULT NULL,
  `antPatFamiliares` varchar(255) DEFAULT NULL,
  `antPatPessoais` varchar(255) DEFAULT NULL,
  `historicoDoencaAtual` varchar(255) DEFAULT NULL,
  `estadoConsulta` varchar(20) NOT NULL,
  PRIMARY KEY (`codConsulta`),
  KEY `numOrdem` (`numOrdem`),
  KEY `idPessoa` (`idPessoa`),
  KEY `codEspecialidade` (`codEspecialidade`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`codConsulta`, `numOrdem`, `codEspecialidade`, `idPessoa`, `dataConsulta`, `preco`, `diagnosticoProvavel`, `motivoConsulta`, `resumoSindromico`, `antPatFamiliares`, `antPatPessoais`, `historicoDoencaAtual`, `estadoConsulta`) VALUES
(3, 'PraJa', 14, 1, '2022-02-17 10:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Cancelada'),
(4, 'PraJa', 1, 1, '2022-03-31 08:00:00', 1500, 'Gripe', 'Dores de cabeça, nos músculos e nariz a pingar.', 'Gripe', NULL, NULL, NULL, 'Atendida'),
(5, 'PraJa', 15, 18, '2022-03-31 09:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Activo'),
(6, 'PraJa', 38, 2, '2022-03-31 09:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Activo'),
(7, 'PraJa', 1, 1, '2022-04-01 10:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Activo'),
(8, 'PraJa', 2, 1, '2022-04-01 10:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Activo'),
(9, 'PraJa', 1, 18, '2022-04-07 10:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Activo'),
(10, 'PraJa', 1, 18, '2022-04-07 08:00:00', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Activo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `codEmail` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`codEmail`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`codEmail`, `idPessoa`, `endereco`) VALUES
(1, 1, 'exemplo1@exemplo.com'),
(2, 2, 'exemplo2@exemplo.com'),
(3, 3, 'exemplo3@exemplo.com'),
(4, 4, 'exemplo4@exemplo.com'),
(5, 5, 'clinicaexemplo1@exemplo.com'),
(7, 8, 'google@gmail.com'),
(8, 9, 'franciscokinaile@gmail.com'),
(9, 10, 'franciscopedro@gmail.com'),
(10, 11, 'fernandoassis@gmail.com'),
(11, 12, 'fernandoassis@gmail.com'),
(12, 13, 'fernandaassis@gmail.com'),
(13, 14, 'fernandaassis@gmail.com'),
(14, 15, 'erigui@gmail.com'),
(15, 16, 'armando@gmail.com'),
(16, 17, 'nuduma@gmail.com'),
(17, 18, 'domingasM@email.co.ao'),
(18, 19, 'belashospitalpark@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
CREATE TABLE IF NOT EXISTS `especialidade` (
  `codEspecialidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codEspecialidade`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`codEspecialidade`, `nome`) VALUES
(1, 'Clínico Geral'),
(2, 'Anatomia Patológica'),
(3, 'Anestesiologia'),
(4, 'Angiologia e Cirurgia Vascular'),
(5, 'Cardiologia'),
(6, 'Cardiologia Pediátrica'),
(7, 'Cirurgia Cardíaca'),
(8, 'Cirurgia Cardiotorácica'),
(9, 'Cirurgia Geral'),
(10, 'Cirurgia Maxilofacial'),
(11, 'Cirurgia Pediátrica'),
(12, 'Cirurgia Plástica Reconstrutiva e Estética'),
(13, 'Cirurgia Torácica'),
(14, 'Dermatovenereologia'),
(15, 'Doenças Infecciosas'),
(16, 'Endocrinologia e Nutrição'),
(17, 'Estomatologia'),
(18, 'Gastrenterologia'),
(19, 'Genética Médica'),
(20, 'Ginecologia/Obstetrícia'),
(21, 'Imunoalergologia'),
(22, 'Imuno-hemoterapia'),
(23, 'Farmacologia Clínica'),
(24, 'Hematologia Clínica'),
(25, 'Medicina Desportiva'),
(26, 'Medicina do Trabalho'),
(27, 'Medicina Física e Reabilitação'),
(28, 'Medicina Geral e Familiar'),
(29, 'Medicina Intensiva'),
(30, 'Medicina Interna'),
(31, 'Medicina Legal'),
(32, 'Medicina Nuclear'),
(33, 'Medicina Tropical'),
(34, 'Nefrologia'),
(35, 'Neurocirurgia'),
(36, 'Neurologia'),
(37, 'Neurorradiologia'),
(38, 'Oftalmologia'),
(39, 'Oncologia Médica'),
(40, 'Ortopedia'),
(41, 'Otorrinolaringologia'),
(42, 'Patologia Clínica'),
(43, 'Pediatria'),
(44, 'Pneumologia'),
(45, 'Psiquiatria'),
(46, 'Psiquiatria da Infância e da Adolescência'),
(47, 'Radiologia'),
(48, 'Radioncologia'),
(49, 'Reumatologia'),
(50, 'Saúde Pública'),
(51, 'Urologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidademedico`
--

DROP TABLE IF EXISTS `especialidademedico`;
CREATE TABLE IF NOT EXISTS `especialidademedico` (
  `numOrdem` varchar(20) DEFAULT NULL,
  `codEspecialidade` int(11) DEFAULT NULL,
  KEY `codEspecialidade` (`codEspecialidade`),
  KEY `numOrdem` (`numOrdem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `especialidademedico`
--

INSERT INTO `especialidademedico` (`numOrdem`, `codEspecialidade`) VALUES
('numOrdem01', 1),
('MEDICOORDEM', 1),
('NUMERO46', 1),
('NUMERO46', 2),
('NUMERO46', 3),
('NUMERO46', 4),
('Medicina123', 1),
('Medicina123', 2),
('Medicina123', 3),
('MedicoPraJA', 2),
('MedicoPraJA', 3),
('MedicoPraJA', 4),
('PraJa', 1),
('PraJa', 2),
('PraJa', 3),
('PraJa', 4),
('PraJa', 5),
('PraJa', 6),
('PraJa', 7),
('PraJa', 8),
('PraJa', 9),
('PraJa', 10),
('PraJa', 11),
('PraJa', 12),
('PraJa', 13),
('PraJa', 14),
('PraJa', 15),
('PraJa', 16),
('PraJa', 17),
('PraJa', 18),
('PraJa', 19),
('PraJa', 20),
('PraJa', 21),
('PraJa', 22),
('PraJa', 23),
('PraJa', 24),
('PraJa', 25),
('PraJa', 26),
('PraJa', 27),
('PraJa', 28),
('PraJa', 29),
('PraJa', 30),
('PraJa', 31),
('PraJa', 32),
('PraJa', 33),
('PraJa', 34),
('PraJa', 35),
('PraJa', 36),
('PraJa', 37),
('PraJa', 38),
('PraJa', 39),
('PraJa', 40),
('PraJa', 41),
('PraJa', 42),
('PraJa', 43),
('PraJa', 44),
('PraJa', 45),
('PraJa', 46),
('PraJa', 47),
('PraJa', 48),
('PraJa', 49),
('PraJa', 50),
('PraJa', 51);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horariomedico`
--

DROP TABLE IF EXISTS `horariomedico`;
CREATE TABLE IF NOT EXISTS `horariomedico` (
  `codHorarioMedico` int(11) NOT NULL AUTO_INCREMENT,
  `diaSemana` varchar(40) NOT NULL,
  `horarioAtendimento` varchar(400) NOT NULL,
  `numOrdem` varchar(20) NOT NULL,
  PRIMARY KEY (`codHorarioMedico`),
  KEY `numOrdem` (`numOrdem`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `horariomedico`
--

INSERT INTO `horariomedico` (`codHorarioMedico`, `diaSemana`, `horarioAtendimento`, `numOrdem`) VALUES
(1, 'Segunda', '08:00, 11:00, ', 'PraJa'),
(2, 'Terça', '08:00, 16:00, ', 'PraJa'),
(3, 'Quarta', '08:00, 13:00, ', 'PraJa'),
(4, 'Quinta', '08:00, 11:00, ', 'PraJa'),
(5, 'Sexta', '10:00, 21:00, ', 'PraJa'),
(6, 'Sabado', '08:00, 12:00, ', 'PraJa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

DROP TABLE IF EXISTS `medico`;
CREATE TABLE IF NOT EXISTS `medico` (
  `numOrdem` varchar(20) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `descricao` varchar(200) NOT NULL,
  PRIMARY KEY (`numOrdem`),
  UNIQUE KEY `numOrdem` (`numOrdem`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`numOrdem`, `idPessoa`, `descricao`) VALUES
('Medicina123', 15, 'Trabalhador com mais de 20 anos de experiência, mas só tenho 19 anos.'),
('MEDICOORDEM', 10, ''),
('MedicoPraJA', 16, 'Medico profissional com mais de 20 anos de experiência, mas só tenho 19 anos.'),
('Numero45', 11, ''),
('NUMERO46', 14, ''),
('NUMERO47', 13, ''),
('numOrdem01', 4, ''),
('PraJa', 17, 'Novo profissional de saúde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
  `idMensagen` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) NOT NULL,
  `idPessoa1` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `dataEnvio` datetime NOT NULL,
  PRIMARY KEY (`idMensagen`),
  KEY `idPessoa` (`idPessoa`),
  KEY `idPessoa1` (`idPessoa1`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`idMensagen`, `idPessoa`, `idPessoa1`, `msg`, `dataEnvio`) VALUES
(1, 17, 1, 'Boa tarde Sr. Mauro', '2022-02-22 04:56:27'),
(2, 1, 17, 'Boa tarde Dr.Nduma', '2022-02-22 04:56:56'),
(3, 17, 1, 'Boa tarde Sr. Mauro', '2022-02-22 04:57:08'),
(4, 1, 17, 'Boa tarde Dr.Nduma', '2022-02-22 04:57:18'),
(5, 17, 1, 'Boa tarde Sr. Mauro', '2022-02-22 04:57:20'),
(6, 1, 17, 'Boa tarde Dr.Nduma', '2022-02-22 04:57:22'),
(7, 17, 1, 'Boa tarde Sr. Mauro', '2022-02-22 04:57:29'),
(8, 1, 17, 'Boa tarde Dr.Nduma', '2022-02-22 04:57:31'),
(9, 17, 1, 'Boa tarde Sr. Mauro', '2022-02-22 05:00:57'),
(10, 17, 1, 'Boa tarde Sr. Mauro', '2022-02-22 05:00:59'),
(11, 1, 17, 'Boa noite doutor...', '2022-02-22 06:14:14'),
(12, 17, 1, 'Boa noite Sr. Mauro', '2022-02-22 06:16:02'),
(13, 17, 1, 'Em que lhe posso ser útil?', '2022-02-22 06:16:59'),
(14, 1, 17, 'Era apenas para testar o chat', '2022-02-22 06:17:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `codMunicipio` int(11) NOT NULL,
  `codProvincia` int(11) DEFAULT NULL,
  `nome` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codMunicipio`),
  KEY `codProvincia` (`codProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`codMunicipio`, `codProvincia`, `nome`) VALUES
(1, 1, 'Dande'),
(2, 1, 'Dembos'),
(3, 1, 'Nambuangongo'),
(4, 1, 'Bula-Atumba'),
(5, 1, 'Ambriz'),
(6, 1, 'Pango Aluquém'),
(7, 2, 'Benguela'),
(8, 2, 'Ganda'),
(9, 2, 'Lobito'),
(10, 2, 'Catumbela'),
(11, 2, 'Bocoio'),
(12, 2, 'Balombo'),
(13, 2, 'Cubal'),
(14, 2, 'Baia Farta'),
(15, 2, 'Caimbambo'),
(16, 2, 'Chongoroi'),
(17, 3, 'Andulo'),
(18, 3, 'Chitembo'),
(19, 3, 'Cuito'),
(20, 3, 'Camacupa'),
(21, 3, 'Chinguar'),
(22, 3, 'Catabola'),
(23, 3, 'Cunhinga'),
(24, 3, 'Cuemba'),
(25, 3, 'Nharêa'),
(26, 4, 'Cabinda'),
(27, 4, 'Cacongo'),
(28, 4, 'Buco Zau'),
(29, 4, 'Belize'),
(30, 5, 'Menongue'),
(31, 5, 'Mavinga'),
(32, 5, 'Dirico'),
(33, 5, 'Cuito Cuanavale'),
(34, 5, 'Cuchi'),
(35, 5, 'Rivungo'),
(36, 5, 'Calai'),
(37, 5, 'Cuangar'),
(38, 5, 'Nancova'),
(39, 6, 'Cazengo'),
(40, 6, 'Golungo Alto'),
(41, 6, 'Cambambe'),
(42, 6, 'Samba Cajú'),
(43, 6, 'Ambaca'),
(44, 6, 'Lucala'),
(45, 6, 'Banga'),
(46, 6, 'Bolongongo'),
(47, 6, 'Quiculungo'),
(48, 6, 'Ngonguembo'),
(49, 7, 'Sumbe'),
(50, 7, 'Libolo'),
(51, 7, 'Amboím'),
(52, 7, 'Cassongue'),
(53, 7, 'Porto Amboím'),
(54, 7, 'Quibala'),
(55, 7, 'Seles'),
(56, 7, 'Cela'),
(57, 7, 'Mussende'),
(58, 7, 'Quilenda'),
(59, 7, 'Ebo'),
(60, 7, 'Conda'),
(61, 8, 'Ombadja'),
(62, 8, 'Cuanhama'),
(63, 8, 'Curoca'),
(64, 8, 'Cahama'),
(65, 8, 'Cuvelai'),
(66, 8, 'Namacunde'),
(67, 9, 'Bailundo'),
(68, 9, 'Huambo'),
(69, 9, 'Londuimbali'),
(70, 9, 'Caála'),
(71, 9, 'Chicala – Choloanga'),
(72, 9, 'Cachiungo'),
(73, 9, 'Mungo'),
(74, 9, 'Longonjo'),
(75, 9, 'Ucuma'),
(76, 9, 'Ecunha'),
(77, 9, 'Chinjenje'),
(78, 10, 'Caconda'),
(79, 10, 'Gambos'),
(80, 10, 'Humpata'),
(81, 10, 'Lubango'),
(82, 10, 'Cuvango'),
(83, 10, 'Quipungo'),
(84, 10, 'Chibia'),
(85, 10, 'Quilengues'),
(86, 10, 'Caluquembe'),
(87, 10, 'Matala'),
(88, 10, 'Jamba'),
(89, 10, 'Chipindo'),
(90, 10, 'Chicomba'),
(91, 10, 'Cacula'),
(92, 11, 'Luanda'),
(93, 11, 'Icolo e Bengo'),
(94, 11, 'Quiçama'),
(95, 11, 'Cacuaco'),
(96, 11, 'Cazenga'),
(97, 11, 'Viana'),
(98, 11, 'Belas'),
(99, 11, 'Talatona'),
(100, 11, 'Kilamba Kiaxi'),
(101, 12, 'Cuilo'),
(102, 12, 'Caungula'),
(103, 12, 'Chitato'),
(104, 12, 'Lubalo'),
(105, 12, 'Capenda Camulemba'),
(106, 12, 'Cuango'),
(107, 12, 'Lucapa'),
(108, 12, 'Cambulo'),
(109, 12, 'Xá-Muteba'),
(110, 12, 'Lóvua'),
(111, 13, 'Saurimo'),
(112, 13, 'Muconda'),
(113, 13, 'Cacolo'),
(114, 13, 'Dala'),
(115, 14, 'Calandula'),
(116, 14, 'Malanje'),
(117, 14, 'Cacuso'),
(118, 14, 'Massango'),
(119, 14, 'Marimba'),
(120, 14, 'Quela'),
(121, 14, 'Quirima'),
(122, 14, 'Cangandala'),
(123, 14, 'Cahombo'),
(124, 14, 'Kunda dya Baze'),
(125, 14, 'Cambundi Catembo'),
(126, 14, 'Mucari'),
(127, 14, 'Kiwaba Nzoji'),
(128, 14, 'Luquembo'),
(129, 15, 'Moxico'),
(130, 15, 'Luchazes'),
(131, 15, 'Alto Zambeze'),
(132, 15, 'Bundas'),
(133, 15, 'Luacano'),
(134, 15, 'Cameia'),
(135, 15, 'Camanongue'),
(136, 15, 'Luau'),
(137, 15, 'Léua'),
(138, 16, 'Moçamedes'),
(139, 16, 'Tômbua'),
(140, 16, 'Bibala'),
(141, 16, 'Virei'),
(142, 16, 'Camucuio'),
(143, 17, 'Dange – Quitexe'),
(144, 17, 'Bungo'),
(145, 17, 'Ambuíla'),
(146, 17, 'Negage'),
(147, 17, 'Puri'),
(148, 17, 'Maquela do Zombo'),
(149, 17, 'Damba'),
(150, 17, 'Pombo'),
(151, 17, 'Bembe'),
(152, 17, 'Milunga'),
(153, 17, 'Songo'),
(154, 17, 'Quimbele'),
(155, 17, 'Alto Cauale'),
(156, 17, 'Uíge'),
(157, 17, 'Mucaba'),
(158, 17, 'Buengas'),
(159, 18, 'Soyo'),
(160, 18, 'Mbanza Kongo'),
(161, 18, 'Nzeto'),
(162, 18, 'Tomboco'),
(163, 18, 'Cuimba'),
(164, 18, 'Nóquii');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parente`
--

DROP TABLE IF EXISTS `parente`;
CREATE TABLE IF NOT EXISTS `parente` (
  `idParente` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa1` int(11) DEFAULT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `grau` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idParente`),
  KEY `idPessoa` (`idPessoa`),
  KEY `idPessoa1` (`idPessoa1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUtilizador` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `genero` varchar(25) DEFAULT NULL,
  `estCivil` varchar(25) DEFAULT NULL,
  `tipoSang` varchar(10) DEFAULT NULL,
  `tipoUser` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `codMunicipio` int(11) NOT NULL,
  `documentoIdentificacao` varchar(100) NOT NULL,
  `numeroDocumento` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`idPessoa`),
  KEY `codMunicipio` (`codMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nomeUtilizador`, `password`, `nome`, `peso`, `dataNasc`, `genero`, `estCivil`, `tipoSang`, `tipoUser`, `endereco`, `codMunicipio`, `documentoIdentificacao`, `numeroDocumento`, `foto`) VALUES
(1, 'MauroM', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Mauro Neto', 60, '1986-06-15', 'Masculino', 'Solteiro', NULL, 'Paciente', '', 92, '', '', ''),
(2, 'ErmelindaVD', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Ermelinda Van~Dunem', 80, '1987-03-31', 'Femenino', NULL, NULL, 'Paciente', '', 92, '', '', ''),
(3, 'RosalinaM', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Rosalina Congo', 60, '1995-04-01', 'Femenino', 'Solteira', NULL, 'Paciente', '', 92, '', '', ''),
(4, 'EvaldoM', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Evaldo Miranda', 60, '1995-05-26', 'Masculino', 'Solteiro', NULL, 'Medico', '', 92, '', '', ''),
(5, 'MuralhaN', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Clínica Muralha da China', NULL, NULL, NULL, NULL, NULL, 'UHospitalar', 'Prenda', 92, 'NIF', '1005044598LA051', ''),
(8, 'google', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Google Com', 15, '2021-04-08', 'Masculino', 'Solteiro', 'B+', 'Paciente', 'Viana de Luanda de Luanda', 97, '', '', ''),
(9, 'pacientedecostume', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Francisco Kinaile Magalhães', 78, '1994-03-11', 'Masculino', 'Casado', 'A-', 'Paciente', 'Benfica do Cazenga', 96, 'Bilhete de Identidade', '009808007LA045', ''),
(10, 'franciscopedro', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Francisco Salomão Pedro', 67, '1996-06-05', 'Masculino', 'Solteiro', 'A+', 'Medico', 'Bairro Luanda', 92, 'Passaporte', '009889LA03904', ''),
(11, 'fernandoassis', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Fernando de Assis', 56, '1992-10-12', 'Masculino', 'Viuvo', 'A-', 'Medico', 'Rua Matala Kizema', 3, 'Bilhete de Identidade', '009808007LA022', ''),
(12, 'fernandoassis', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Fernando de Assis', 56, '1992-10-12', 'Masculino', 'Viuvo', 'A-', 'Paciente', 'Rua Matala Kizema', 3, 'Bilhete de Identidade', '009808007LA022', ''),
(13, 'fernandaassis2', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Fernanda Assis', 67, '1992-09-12', 'Femenino', 'Solteiro', 'AB-', 'Medico', 'Cazengo', 96, 'Bilhete de Identidade', '99839009LA039', ''),
(14, 'fernandaassis', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Fernanda Assis', 67, '1992-09-12', 'Femenino', 'Solteiro', 'AB-', 'Medico', 'Cazengo', 96, 'Bilhete de Identidade', '99889009LA039', ''),
(15, 'paulinha', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Paula Almeida Andrade', 56, '1990-02-12', 'Femenino', 'Viuvo', 'AB+', 'Medico', 'Benfica de Luanda', 92, 'Bilhete de Identidade', '0098990', ''),
(16, 'armando2', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Armando Francisco', 89, '1999-11-12', 'Masculino', 'Casado', 'AB+', 'Medico', 'Bairro das Ingombotas', 92, 'Bilhete de Identidade', '9989908', ''),
(17, 'nduma', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Pedro Nduma', 89, '2000-09-19', 'Masculino', 'Solteiro', 'B+', 'Medico', 'Icolo e Bengo - Quissama', 93, 'Bilhete de Identidade', '009889LA03902', ''),
(18, 'DomingasM', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Domingas Torres Cordeiro da Mata', 95, '1966-05-26', 'Femenino', 'Solteiro', 'AB-', 'Paciente', 'Rua dos Quarteis', 97, 'Bilhete de Identidade', '005044589LA050', ''),
(19, 'belashospitalpark', 'f0ba5b711ee0c226c7df8805a7cfeef3', 'Belas Hospital Park', NULL, NULL, NULL, NULL, NULL, 'UHospitalar', 'Belas de Luanda', 98, 'NIF', '10998899', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prescricao`
--

DROP TABLE IF EXISTS `prescricao`;
CREATE TABLE IF NOT EXISTS `prescricao` (
  `tipo` varchar(50) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `codPrescricao` int(11) NOT NULL AUTO_INCREMENT,
  `codConsulta` int(11) DEFAULT NULL,
  PRIMARY KEY (`codPrescricao`),
  KEY `codConsulta` (`codConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `prescricao`
--

INSERT INTO `prescricao` (`tipo`, `descricao`, `codPrescricao`, `codConsulta`) VALUES
('Prescrição', 'Tomar Anti-Gripine 3x por dia de 8 em 8 horas durante 3 dias.', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `codProvincia` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`codProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `provincia`
--

INSERT INTO `provincia` (`codProvincia`, `nome`) VALUES
(1, 'Bengo'),
(2, 'Benguela'),
(3, 'Bié'),
(4, 'Cabinda'),
(5, 'Cuando-Cubango'),
(6, 'Cuanza Norte'),
(7, 'Cuanza Sul'),
(8, 'Cunene'),
(9, 'Huambo'),
(10, 'Huíla'),
(11, 'Luanda'),
(12, 'Lunda Norte'),
(13, 'Lunda Sul'),
(14, 'Malange'),
(15, 'Moxico'),
(16, 'Namibe'),
(17, 'Uíge'),
(18, 'Zaire');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rua`
--

DROP TABLE IF EXISTS `rua`;
CREATE TABLE IF NOT EXISTS `rua` (
  `codRua` int(11) NOT NULL AUTO_INCREMENT,
  `nomeRua` varchar(50) DEFAULT NULL,
  `numeroRua` varchar(10) DEFAULT NULL,
  `codBairro` int(11) DEFAULT NULL,
  PRIMARY KEY (`codRua`),
  KEY `codBairro` (`codBairro`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rua`
--

INSERT INTO `rua` (`codRua`, `nomeRua`, `numeroRua`, `codBairro`) VALUES
(1, NULL, 'Rua 3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE IF NOT EXISTS `telefone` (
  `coTelefone` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`coTelefone`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`coTelefone`, `idPessoa`, `numero`) VALUES
(1, 1, 911111111),
(2, 2, 911111112),
(3, 3, 911111113),
(4, 4, 911111114),
(5, 5, 222222221),
(7, 8, 912334555),
(8, 9, 987778999),
(9, 10, 988990234),
(10, 11, 98889099),
(11, 12, 98889099),
(12, 13, 988899899),
(13, 14, 988899899),
(14, 15, 988898),
(15, 16, 98878987),
(16, 17, 8789),
(17, 18, 912345678),
(18, 19, 987778999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhar`
--

DROP TABLE IF EXISTS `trabalhar`;
CREATE TABLE IF NOT EXISTS `trabalhar` (
  `numOrdem` varchar(20) DEFAULT NULL,
  `codHospital` int(11) DEFAULT NULL,
  KEY `numOrdem` (`numOrdem`),
  KEY `codHospital` (`codHospital`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `trabalhar`
--

INSERT INTO `trabalhar` (`numOrdem`, `codHospital`) VALUES
('numOrdem01', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unhospitalar`
--

DROP TABLE IF EXISTS `unhospitalar`;
CREATE TABLE IF NOT EXISTS `unhospitalar` (
  `codHospital` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) DEFAULT NULL,
  `sectorSNS` varchar(200) NOT NULL,
  `subsectorSNS` varchar(200) NOT NULL,
  `nPacientesDiario` int(11) NOT NULL,
  PRIMARY KEY (`codHospital`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unhospitalar`
--

INSERT INTO `unhospitalar` (`codHospital`, `idPessoa`, `sectorSNS`, `subsectorSNS`, `nPacientesDiario`) VALUES
(1, 5, '', '', 0),
(2, 19, 'publico', 'SS das FAA', 78);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `bairro_ibfk_1` FOREIGN KEY (`codMunicipio`) REFERENCES `municipio` (`codMunicipio`);

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `medico` (`numOrdem`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`codEspecialidade`) REFERENCES `especialidade` (`codEspecialidade`);

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `especialidademedico`
--
ALTER TABLE `especialidademedico`
  ADD CONSTRAINT `especialidademedico_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `medico` (`numOrdem`),
  ADD CONSTRAINT `especialidademedico_ibfk_2` FOREIGN KEY (`codEspecialidade`) REFERENCES `especialidade` (`codEspecialidade`),
  ADD CONSTRAINT `especialidademedico_ibfk_3` FOREIGN KEY (`numOrdem`) REFERENCES `medico` (`numOrdem`);

--
-- Limitadores para a tabela `horariomedico`
--
ALTER TABLE `horariomedico`
  ADD CONSTRAINT `horariomedico_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `medico` (`numOrdem`);

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`),
  ADD CONSTRAINT `mensagens_ibfk_2` FOREIGN KEY (`idPessoa1`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`codProvincia`) REFERENCES `provincia` (`codProvincia`);

--
-- Limitadores para a tabela `parente`
--
ALTER TABLE `parente`
  ADD CONSTRAINT `parente_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`),
  ADD CONSTRAINT `parente_ibfk_2` FOREIGN KEY (`idPessoa1`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `pessoa_ibfk_2` FOREIGN KEY (`codMunicipio`) REFERENCES `municipio` (`codMunicipio`);

--
-- Limitadores para a tabela `prescricao`
--
ALTER TABLE `prescricao`
  ADD CONSTRAINT `prescricao_ibfk_1` FOREIGN KEY (`codConsulta`) REFERENCES `consulta` (`codConsulta`);

--
-- Limitadores para a tabela `rua`
--
ALTER TABLE `rua`
  ADD CONSTRAINT `rua_ibfk_1` FOREIGN KEY (`codBairro`) REFERENCES `bairro` (`codBairro`);

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `trabalhar`
--
ALTER TABLE `trabalhar`
  ADD CONSTRAINT `trabalhar_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `medico` (`numOrdem`),
  ADD CONSTRAINT `trabalhar_ibfk_2` FOREIGN KEY (`codHospital`) REFERENCES `unhospitalar` (`codHospital`);

--
-- Limitadores para a tabela `unhospitalar`
--
ALTER TABLE `unhospitalar`
  ADD CONSTRAINT `unhospitalar_ibfk_2` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`idPessoa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
