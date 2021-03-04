create database BookSpace;
USE BookSpace;

CREATE TABLE Dados (
Cod_Dados int not null primary key auto_increment,
Nome_Usuario varchar(30) not null,
Data_Nasc date not null,
CPF varchar(11) not null,
RG varchar(20) not null,
Telefone int not null,
Cod_Usuario int not null
)engine=innodb;

CREATE TABLE Usuario (
Cod_Usuario int not null primary key auto_increment,
Email varchar(30) not null,
Senha varchar(15) not null
)engine=innodb;

ALTER TABLE Dados
ADD CONSTRAINT fk_Usuario_Dados
FOREIGN KEY (Cod_Usuario)
REFERENCES Usuario (Cod_Usuario);

CREATE TABLE Endereco (
Cod_Endereco int not null primary key auto_increment,
CEP varchar(20) not null,
Logradouro varchar(45) not null,
Numero int not null,
Cidade varchar(20) not null,
Complemento varchar(40),
Cod_Dados int not null
)engine=innodb;

ALTER TABLE Endereco
ADD CONSTRAINT fk_Dados_Endereco
FOREIGN KEY (Cod_Dados)
REFERENCES Dados (Cod_Dados);

CREATE TABLE Livro (
Cod_Livro int not null primary key auto_increment,
Nome_Livro varchar(50) not null,
Ano date not null,
Peso decimal not null,
Altura decimal not null,
Quant_Pag int not null,
Edicao varchar(10) not null,
Descricao varchar(500) not null,
Idioma varchar(15) not null,
Preço decimal not null,
Cod_Editora int not null,
Cod_Genero int not null,
Cod_Dados int not null,
Cod_Autor int not null
)engine=innodb;

ALTER TABLE Livro
ADD CONSTRAINT fk_Dados_Livro
FOREIGN KEY (Cod_Dados)
REFERENCES Dados (Cod_Dados);

CREATE TABLE Genero (
Cod_Genero int not null primary key auto_increment,
Nome_Genero varchar(20) not null
)engine=innodb;

ALTER TABLE Livro
ADD CONSTRAINT fk_Genero_Livro
FOREIGN KEY (Cod_Genero)
REFERENCES Genero (Cod_Genero);

CREATE TABLE Editora (
Cod_Editora int not null primary key auto_increment,
Nome_Editora varchar(20) not null
)engine=innodb;

ALTER TABLE Livro
ADD CONSTRAINT fk_Editora_Livro
FOREIGN KEY (Cod_Editora)
REFERENCES Editora (Cod_Editora);

CREATE TABLE Autor (
Cod_Autor int not null primary key auto_increment,
Nome_Autor varchar(20) not null
)engine=innodb;

ALTER TABLE Livro
ADD CONSTRAINT fk_Autor_Livro
FOREIGN KEY (Cod_Autor)
REFERENCES Autor (Cod_Autor);

CREATE TABLE BookImg (
Cod_BookImg int not null primary key auto_increment,
Nome_BookImg varchar(15) not null unique,
referencia_BookImg varchar(25) not null,
Cod_Livro int not null
)engine=innodb;

ALTER TABLE BookImg
ADD CONSTRAINT fk_Livro_BookImg
FOREIGN KEY (Cod_Livro)
REFERENCES Livro (Cod_Livro);







