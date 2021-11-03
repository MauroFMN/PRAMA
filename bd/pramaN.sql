drop database pramaN;
create database pramaN;
use pramaN;


CREATE TABLE Prescricao (
tipo varchar(50),
descricao varchar(250),
codPrescricao int PRIMARY KEY auto_increment,
codConsulta int
);

CREATE TABLE Provincia (
codProvincia int PRIMARY KEY auto_increment,
nome varchar(50)
);

CREATE TABLE Municipio (
codMunicipio int PRIMARY KEY auto_increment,
codProvincia int,
nome varchar(50),
FOREIGN KEY(codProvincia) REFERENCES Provincia (codProvincia)
);

CREATE TABLE Bairro (
nome varchar(100),
codBairro int PRIMARY KEY auto_increment
);

CREATE TABLE Rua (
codRua int PRIMARY KEY auto_increment,
nome varchar(50),
numero varchar(10),
codBairro int,
FOREIGN KEY(codBairro) REFERENCES Bairro (codBairro)
);

CREATE TABLE EspecialidadeMedico (
numOrdem int,
codEspecialidade int
);

CREATE TABLE Consulta (
codConsulta int PRIMARY KEY auto_increment,
numOrdem int,
codEspecialidade int,
idPessoa int,
data date,
hora time,
preço float,
diagnosticoProvavel varchar(255),
motivoConsulta varchar(255),
resumoSindromico varchar(255),
antPatFamiliares varchar(255),
antPatPessoais varchar(255),
historicoDoencaAtual varchar(255)
);

CREATE TABLE Pertencer (
codBairro int,
codMunicipio int,
nomeBairro varchar(50),
FOREIGN KEY(codBairro) REFERENCES Bairro (codBairro),
FOREIGN KEY(codMunicipio) REFERENCES Municipio (codMunicipio)
);

CREATE TABLE Especialidade (
codEspecialidade int PRIMARY KEY,
nome varchar(100)
);

CREATE TABLE Telefone (
coTelefone int PRIMARY KEY auto_increment,
codHospital int,
idPessoa int,
numero int
);

CREATE TABLE Parente (
idParente int PRIMARY KEY auto_increment,
idPessoa int,
idPessoa1 int,
grau varchar(50)
);

CREATE TABLE Email (
codEmail int PRIMARY KEY,
idPessoa int,
codHospital int,
endereco varchar(250)
);

CREATE TABLE Trabalhar (
numOrdem int,
codHospital int
);

CREATE TABLE Medico (
numOrdem int PRIMARY KEY auto_increment,
idPessoa int
);

CREATE TABLE Pessoa (
idPessoa int PRIMARY KEY auto_increment,
codProvincia int,
nomeUtilizador varchar(100),
password varchar(150),
nome varchar(200),
peso float,
dataNasc date,
genero varchar(15),
estCivil varchar(20),
tipoSang varchar(10),
FOREIGN KEY(codProvincia) REFERENCES Provincia (codProvincia)
);

CREATE TABLE UnHospitalar (
nomeUnHosp varchar(150),
codHospital int PRIMARY KEY auto_increment,
codProvincia int,
idPessoa int,
FOREIGN KEY(codProvincia) REFERENCES Provincia (codProvincia),
FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa)
);

CREATE TABLE Mensagens (
idMensagen int PRIMARY KEY auto_increment,
idPessoa int NOT NULL,
idPessoa1 int(255) NOT NULL,
msg varchar(1000) NOT NULL
);

ALTER TABLE Prescricao ADD FOREIGN KEY(codConsulta) REFERENCES Consulta (codConsulta);
ALTER TABLE EspecialidadeMedico ADD FOREIGN KEY(numOrdem) REFERENCES Medico (numOrdem);
ALTER TABLE EspecialidadeMedico ADD FOREIGN KEY(codEspecialidade) REFERENCES Especialidade (codEspecialidade);
ALTER TABLE Consulta ADD FOREIGN KEY(numOrdem) REFERENCES Medico (numOrdem);
ALTER TABLE Consulta ADD FOREIGN KEY(codEspecialidade) REFERENCES Especialidade (codEspecialidade);
ALTER TABLE Consulta ADD FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa);
ALTER TABLE Telefone ADD FOREIGN KEY(codHospital) REFERENCES UnHospitalar (codHospital);
ALTER TABLE Telefone ADD FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa);
ALTER TABLE Parente ADD FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa);
ALTER TABLE Parente ADD FOREIGN KEY(idPessoa1) REFERENCES Pessoa (idPessoa);
ALTER TABLE Email ADD FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa);
ALTER TABLE Email ADD FOREIGN KEY(codHospital) REFERENCES UnHospitalar (codHospital);
ALTER TABLE Trabalhar ADD FOREIGN KEY(numOrdem) REFERENCES Medico (numOrdem);
ALTER TABLE Trabalhar ADD FOREIGN KEY(codHospital) REFERENCES UnHospitalar (codHospital);
ALTER TABLE Medico ADD FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa);
ALTER TABLE Mensagens ADD FOREIGN KEY(idPessoa) REFERENCES Pessoa (idPessoa);
ALTER TABLE Mensagens ADD FOREIGN KEY(idPessoa1) REFERENCES Pessoa (idPessoa);
