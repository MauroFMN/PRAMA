SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `pramaN`;

--
-- Banco de dados: `pramaN`
--
CREATE DATABASE `pramaN` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pramaN`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Bairro`
--

CREATE TABLE `Bairro` (
  `codBairro` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Consulta`
--

CREATE TABLE `Consulta` (
  `codConsulta` int(11) NOT NULL,
  `numOrdem` int(11) DEFAULT NULL,
  `codEspecialidade` int(11) DEFAULT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `pre` float DEFAULT NULL,
  `diagnosticoProvavel` varchar(255) DEFAULT NULL,
  `motivoConsulta` varchar(255) DEFAULT NULL,
  `resumoSindromico` varchar(255) DEFAULT NULL,
  `antPatFamiliares` varchar(255) DEFAULT NULL,
  `antPatPessoais` varchar(255) DEFAULT NULL,
  `historicoDoencaAtual` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Email`
--

CREATE TABLE `Email` (
  `codEmail` int(11) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `codHospital` int(11) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Especialidade`
--

CREATE TABLE `Especialidade` (
  `codEspecialidade` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Especialidade`
--

INSERT INTO `Especialidade` (`codEspecialidade`, `nome`) VALUES
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
-- Estrutura da tabela `EspecialidadeMedico`
--

CREATE TABLE `EspecialidadeMedico` (
  `numOrdem` int(11) DEFAULT NULL,
  `codEspecialidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Medico`
--

CREATE TABLE `Medico` (
  `numOrdem` int(11) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensagens`
--

CREATE TABLE `Mensagens` (
  `idMensagen` int(11) NOT NULL,
  `idPessoa` int(11) NOT NULL,
  `idPessoa1` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Municipio`
--

CREATE TABLE `Municipio` (
  `codMunicipio` int(11) NOT NULL,
  `codProvincia` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Municipio`
--

INSERT INTO `Municipio` (`codMunicipio`, `codProvincia`, `nome`) VALUES
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
-- Estrutura da tabela `Parente`
--

CREATE TABLE `Parente` (
  `idParente` int(11) NOT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `idPessoa1` int(11) DEFAULT NULL,
  `grau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pertencer`
--

CREATE TABLE `Pertencer` (
  `codBairro` int(11) DEFAULT NULL,
  `codMunicipio` int(11) DEFAULT NULL,
  `nomeBairro` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pessoa`
--

CREATE TABLE `Pessoa` (
  `idPessoa` int(11) NOT NULL,
  `codProvincia` int(11) DEFAULT NULL,
  `nomeUtilizador` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `peso` float DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `genero` varchar(15) DEFAULT NULL,
  `estCivil` varchar(20) DEFAULT NULL,
  `tipoSang` varchar(10) DEFAULT NULL,
  `tipoUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Prescricao`
--

CREATE TABLE `Prescricao` (
  `codPrescricao` int(11) NOT NULL,
  `codConsulta` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Provincia`
--

CREATE TABLE `Provincia` (
  `codProvincia` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Provincia`
--

INSERT INTO `Provincia` (`codProvincia`, `nome`) VALUES
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
-- Estrutura da tabela `Rua`
--

CREATE TABLE `Rua` (
  `codRua` int(11) NOT NULL,
  `codBairro` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Telefone`
--

CREATE TABLE `Telefone` (
  `coTelefone` int(11) NOT NULL,
  `codHospital` int(11) DEFAULT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Trabalhar`
--

CREATE TABLE `Trabalhar` (
  `numOrdem` int(11) DEFAULT NULL,
  `codHospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `UnHospitalar`
--

CREATE TABLE `UnHospitalar` (
  `codHospital` int(11) NOT NULL,
  `codProvincia` int(11) DEFAULT NULL,
  `idPessoa` int(11) DEFAULT NULL,
  `nomeUnHosp` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Bairro`
--
ALTER TABLE `Bairro`
  ADD PRIMARY KEY (`codBairro`);

--
-- Índices para tabela `Consulta`
--
ALTER TABLE `Consulta`
  ADD PRIMARY KEY (`codConsulta`),
  ADD KEY `numOrdem` (`numOrdem`),
  ADD KEY `codEspecialidade` (`codEspecialidade`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- Índices para tabela `Email`
--
ALTER TABLE `Email`
  ADD PRIMARY KEY (`codEmail`),
  ADD KEY `idPessoa` (`idPessoa`),
  ADD KEY `codHospital` (`codHospital`);

--
-- Índices para tabela `Especialidade`
--
ALTER TABLE `Especialidade`
  ADD PRIMARY KEY (`codEspecialidade`);

--
-- Índices para tabela `EspecialidadeMedico`
--
ALTER TABLE `EspecialidadeMedico`
  ADD KEY `numOrdem` (`numOrdem`),
  ADD KEY `codEspecialidade` (`codEspecialidade`);

--
-- Índices para tabela `Medico`
--
ALTER TABLE `Medico`
  ADD PRIMARY KEY (`numOrdem`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- Índices para tabela `Mensagens`
--
ALTER TABLE `Mensagens`
  ADD PRIMARY KEY (`idMensagen`),
  ADD KEY `idPessoa` (`idPessoa`),
  ADD KEY `idPessoa1` (`idPessoa1`);

--
-- Índices para tabela `Municipio`
--
ALTER TABLE `Municipio`
  ADD PRIMARY KEY (`codMunicipio`),
  ADD KEY `codProvincia` (`codProvincia`);

--
-- Índices para tabela `Parente`
--
ALTER TABLE `Parente`
  ADD PRIMARY KEY (`idParente`),
  ADD KEY `idPessoa` (`idPessoa`),
  ADD KEY `idPessoa1` (`idPessoa1`);

--
-- Índices para tabela `Pertencer`
--
ALTER TABLE `Pertencer`
  ADD KEY `codBairro` (`codBairro`),
  ADD KEY `codMunicipio` (`codMunicipio`);

--
-- Índices para tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `codProvincia` (`codProvincia`);

--
-- Índices para tabela `Prescricao`
--
ALTER TABLE `Prescricao`
  ADD PRIMARY KEY (`codPrescricao`),
  ADD KEY `codConsulta` (`codConsulta`);

--
-- Índices para tabela `Provincia`
--
ALTER TABLE `Provincia`
  ADD PRIMARY KEY (`codProvincia`);

--
-- Índices para tabela `Rua`
--
ALTER TABLE `Rua`
  ADD PRIMARY KEY (`codRua`),
  ADD KEY `codBairro` (`codBairro`);

--
-- Índices para tabela `Telefone`
--
ALTER TABLE `Telefone`
  ADD PRIMARY KEY (`coTelefone`),
  ADD KEY `codHospital` (`codHospital`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- Índices para tabela `Trabalhar`
--
ALTER TABLE `Trabalhar`
  ADD KEY `numOrdem` (`numOrdem`),
  ADD KEY `codHospital` (`codHospital`);

--
-- Índices para tabela `UnHospitalar`
--
ALTER TABLE `UnHospitalar`
  ADD PRIMARY KEY (`codHospital`),
  ADD KEY `codProvincia` (`codProvincia`),
  ADD KEY `idPessoa` (`idPessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Bairro`
--
ALTER TABLE `Bairro`
  MODIFY `codBairro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Consulta`
--
ALTER TABLE `Consulta`
  MODIFY `codConsulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Medico`
--
ALTER TABLE `Medico`
  MODIFY `numOrdem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Mensagens`
--
ALTER TABLE `Mensagens`
  MODIFY `idMensagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Municipio`
--
ALTER TABLE `Municipio`
  MODIFY `codMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de tabela `Parente`
--
ALTER TABLE `Parente`
  MODIFY `idParente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Prescricao`
--
ALTER TABLE `Prescricao`
  MODIFY `codPrescricao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Provincia`
--
ALTER TABLE `Provincia`
  MODIFY `codProvincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `Rua`
--
ALTER TABLE `Rua`
  MODIFY `codRua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Telefone`
--
ALTER TABLE `Telefone`
  MODIFY `coTelefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `UnHospitalar`
--
ALTER TABLE `UnHospitalar`
  MODIFY `codHospital` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Consulta`
--
ALTER TABLE `Consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `Medico` (`numOrdem`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`codEspecialidade`) REFERENCES `Especialidade` (`codEspecialidade`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `Email`
--
ALTER TABLE `Email`
  ADD CONSTRAINT `email_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`),
  ADD CONSTRAINT `email_ibfk_2` FOREIGN KEY (`codHospital`) REFERENCES `UnHospitalar` (`codHospital`);

--
-- Limitadores para a tabela `EspecialidadeMedico`
--
ALTER TABLE `EspecialidadeMedico`
  ADD CONSTRAINT `especialidademedico_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `Medico` (`numOrdem`),
  ADD CONSTRAINT `especialidademedico_ibfk_2` FOREIGN KEY (`codEspecialidade`) REFERENCES `Especialidade` (`codEspecialidade`);

--
-- Limitadores para a tabela `Medico`
--
ALTER TABLE `Medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `Mensagens`
--
ALTER TABLE `Mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`),
  ADD CONSTRAINT `mensagens_ibfk_2` FOREIGN KEY (`idPessoa1`) REFERENCES `Pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `Municipio`
--
ALTER TABLE `Municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`codProvincia`) REFERENCES `Provincia` (`codProvincia`);

--
-- Limitadores para a tabela `Parente`
--
ALTER TABLE `Parente`
  ADD CONSTRAINT `parente_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`),
  ADD CONSTRAINT `parente_ibfk_2` FOREIGN KEY (`idPessoa1`) REFERENCES `Pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `Pertencer`
--
ALTER TABLE `Pertencer`
  ADD CONSTRAINT `pertencer_ibfk_1` FOREIGN KEY (`codBairro`) REFERENCES `Bairro` (`codBairro`),
  ADD CONSTRAINT `pertencer_ibfk_2` FOREIGN KEY (`codMunicipio`) REFERENCES `Municipio` (`codMunicipio`);

--
-- Limitadores para a tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  ADD CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`codProvincia`) REFERENCES `Provincia` (`codProvincia`);

--
-- Limitadores para a tabela `Prescricao`
--
ALTER TABLE `Prescricao`
  ADD CONSTRAINT `prescricao_ibfk_1` FOREIGN KEY (`codConsulta`) REFERENCES `Consulta` (`codConsulta`);

--
-- Limitadores para a tabela `Rua`
--
ALTER TABLE `Rua`
  ADD CONSTRAINT `rua_ibfk_1` FOREIGN KEY (`codBairro`) REFERENCES `Bairro` (`codBairro`);

--
-- Limitadores para a tabela `Telefone`
--
ALTER TABLE `Telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`codHospital`) REFERENCES `UnHospitalar` (`codHospital`),
  ADD CONSTRAINT `telefone_ibfk_2` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `Trabalhar`
--
ALTER TABLE `Trabalhar`
  ADD CONSTRAINT `trabalhar_ibfk_1` FOREIGN KEY (`numOrdem`) REFERENCES `Medico` (`numOrdem`),
  ADD CONSTRAINT `trabalhar_ibfk_2` FOREIGN KEY (`codHospital`) REFERENCES `UnHospitalar` (`codHospital`);

--
-- Limitadores para a tabela `UnHospitalar`
--
ALTER TABLE `UnHospitalar`
  ADD CONSTRAINT `unhospitalar_ibfk_1` FOREIGN KEY (`codProvincia`) REFERENCES `Provincia` (`codProvincia`),
  ADD CONSTRAINT `unhospitalar_ibfk_2` FOREIGN KEY (`idPessoa`) REFERENCES `Pessoa` (`idPessoa`);
