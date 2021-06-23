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
Cidade varchar(20) not null,
Cod_Dados int not null
)engine=innodb;

ALTER TABLE Endereco
ADD CONSTRAINT fk_Dados_Endereco
FOREIGN KEY (Cod_Dados)
REFERENCES Dados (Cod_Dados);

CREATE TABLE Livro (
Cod_Livro int not null primary key auto_increment,
Nome_Livro varchar(50) not null,
Ano date,
ISBN varchar(17) not null,
Quant_Pag int not null,
Edicao varchar(10) not null,
Descricao varchar(500) not null,
Idioma varchar(15) not null,
Peso decimal,
Altura decimal,
Conservacao varchar(250),
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
Nome_BookImg varchar(30) not null unique,
referencia_BookImg varchar(25),
Cod_Livro int not null
)engine=innodb;

ALTER TABLE BookImg
ADD CONSTRAINT fk_Livro_BookImg
FOREIGN KEY (Cod_Livro)
REFERENCES Livro (Cod_Livro);

ALTER TABLE Livro
MODIFY COLUMN Ano int;

ALTER TABLE Livro
DROP CONSTRAINT fk_Genero_Livro;

ALTER TABLE Livro
DROP COLUMN Cod_Genero;

ALTER TABLE Genero
ADD Cod_Livro int not null;

ALTER TABLE Genero
ADD CONSTRAINT fk_Livro_Genero
FOREIGN KEY (Cod_Livro)
REFERENCES Livro(Cod_Livro);

ALTER TABLE BookImg
DROP COLUMN referencia_BookImg;

ALTER TABLE Livro
DROP CONSTRAINT fk_Dados_Livro;

ALTER TABLE Livro
DROP COLUMN Cod_Dados;

ALTER TABLE Livro
ADD COLUMN Cod_Usuario int not null;

ALTER TABLE Livro
ADD CONSTRAINT fk_Usuario_Livro
FOREIGN KEY (Cod_Usuario)
REFERENCES Usuario(Cod_Usuario);

ALTER TABLE dados
DROP COLUMN RG;

ALTER TABLE dados
DROP COLUMN CPF;

ALTER TABLE dados
DROP COLUMN Telefone;

ALTER TABLE dados
DROP COLUMN Data_Nasc;

ALTER TABLE endereco
ADD Estado varchar(10) not null;

CREATE TABLE Comentarios(
Cod_Comentario int not null primary key auto_increment,
Comentario varchar(500) not null,
Cod_Livro int not null,
Cod_Usuario int not null
)engine=innodb;

ALTER TABLE Comentarios
ADD CONSTRAINT fk_Livro_Comentarios
FOREIGN KEY (Cod_Livro)
REFERENCES Livro (Cod_Livro);

ALTER TABlE Comentarios
ADD CONSTRAINT fk_Usuario_Comentarios
FOREIGN KEY (Cod_Usuario)
REFERENCES Usuario (Cod_Usuario);

ALTER TABLE Genero
DROP CONSTRAINT fk_Livro_Genero;

CREATE TABLE Livro_Genero(
Cod_Livro_Genero int not null primary key auto_increment,
Cod_Genero int not null,
Cod_Livro int not null
)engine=innodb;

ALTER TABLE Livro_Genero
ADD CONSTRAINT fk_Genero_Livro_Genero
FOREIGN KEY (Cod_Genero)
REFERENCES Genero(Cod_Genero);

ALTER TABLE Livro_Genero
ADD CONSTRAINT fk_Livro_Livro_Genero
FOREIGN KEY (Cod_Livro)
REFERENCES Livro(Cod_Livro);

ALTER TABLE Genero
DROP COLUMN Cod_Livro;

ALTER TABLE dados
ADD Telefone int; 

CREATE TABLE Avaliacao (
Cod_Avaliacao int not null primary key auto_increment,
nota int,
Cod_Livro int not null,
Cod_Usuario int not null
)engine=innodb;

ALTER TABLE Avaliacao 
ADD CONSTRAINT fk_Livro_Avaliacao
FOREIGN KEY (Cod_Livro)
REFERENCES Livro (Cod_Livro);

ALTER TABLE Avaliacao 
ADD CONSTRAINT fk_Usuario_Avaliacao
FOREIGN KEY (Cod_Usuario)
REFERENCES Usuario (Cod_Usuario);

CREATE TABLE Carrinho (
Cod_Carrinho int not null primary key auto_increment,
Cod_Livro int not null,
Cod_Usuario int not null
)engine=innodb;

ALTER TABLE Carrinho 
ADD CONSTRAINT fk_Livro_Carrinho
FOREIGN KEY (Cod_Livro)
REFERENCES Livro (Cod_Livro);

ALTER TABLE Carrinho 
ADD CONSTRAINT fk_Usuario_Carrinho
FOREIGN KEY (Cod_Usuario)
REFERENCES Usuario (Cod_Usuario);

create view busca as
select I.Nome_BookImg, L.nome_livro, L.preço, E.cidade, E.estado, L.cod_livro from livro L
inner join dados D
on D.cod_usuario = L.cod_usuario
inner join  endereco E
on E.cod_dados = D.cod_dados
inner join bookimg I
on I.cod_livro = L.cod_livro;

create view pessoa as
select U.cod_usuario, U.email, U.senha, D.nome_usuario, D.telefone, E.cidade, E.estado from usuario U
inner join dados D
on D.cod_usuario = U.cod_usuario
inner join endereco E
on E.cod_dados = D.cod_dados;

insert into genero(nome_genero) values("ação");
insert into genero(nome_genero) values("adulto");
insert into genero(nome_genero) values("aventura");
insert into genero(nome_genero) values("comedia");
insert into genero(nome_genero) values("drama");
insert into genero(nome_genero) values("espacial");
insert into genero(nome_genero) values("esportes");
insert into genero(nome_genero) values("gastronomia");
insert into genero(nome_genero) values("historico");
insert into genero(nome_genero) values("terror");
insert into genero(nome_genero) values("hq");
insert into genero(nome_genero) values("mangas");
insert into genero(nome_genero) values("infantil");
insert into genero(nome_genero) values("jogos");
insert into genero(nome_genero) values("sci-fi");
insert into genero(nome_genero) values("misterio");
insert into genero(nome_genero) values("musica");
insert into genero(nome_genero) values("romance");
insert into genero(nome_genero) values("policial");
insert into genero(nome_genero) values("sobrenatural");
insert into genero(nome_genero) values("suspense");
insert into genero(nome_genero) values("vida escolar");
insert into genero(nome_genero) values("Administração");
insert into genero(nome_genero) values("Negócios");
insert into genero(nome_genero) values("Economia");
insert into genero(nome_genero) values("autoajuda");
insert into genero(nome_genero) values("ciências");
insert into genero(nome_genero) values("computação");
insert into genero(nome_genero) values("infantojuvenil");
insert into genero(nome_genero) values("ficção");
insert into genero(nome_genero) values("religioso");
insert into genero(nome_genero) values("turismo");
insert into genero(nome_genero) values("Idiomas");

create table conversa(
	cod_conversa int not null auto_increment primary key,
    usuario_1 int not null,
    usuario_2 int not null,
    hora date not null
)engine=innodb;

create table msg(
	cod_msg int not null auto_increment primary key,
	cod_conversa int not null,
    msg_to int not null,
    msg_from int not null,
    msg varchar(2500) not null,
	hora date not null
)engine=innodb;

ALTER TABLE conversa 
ADD CONSTRAINT fk_usuario_Conversa
FOREIGN KEY (usuario_1)
REFERENCES Usuario (Cod_Usuario);

ALTER TABLE conversa 
ADD CONSTRAINT fk_usuario2_Conversa
FOREIGN KEY (usuario_2)
REFERENCES Usuario (Cod_Usuario);

ALTER TABLE msg 
ADD CONSTRAINT fk_msg_Conversa
FOREIGN KEY (cod_conversa)
REFERENCES conversa (cod_conversa);

ALTER TABLE msg 
ADD CONSTRAINT fk_from_usuario
FOREIGN KEY (msg_from)
REFERENCES Usuario (Cod_Usuario);

ALTER TABLE msg
ADD CONSTRAINT fk_to_usuario
FOREIGN KEY (msg_to)
REFERENCES Usuario (Cod_Usuario);
