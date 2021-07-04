<?php
require_once "./classes/Livro.php";

//pegando dados do form
$nome = $_POST["nome"];
$autor = $_POST["autor"];
$editora = $_POST["editora"];
$genero = $_POST["genero"];
$idioma = $_POST["idioma"];
$pag = $_POST["pag"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];
$ediçao = $_POST["ediçao"];
$ano = $_POST["ano"];
$valor = $_POST["valor"];
$descricao = $_POST["descricao"];
$fotos = $_FILES["arquivos"];

//criando objeto
$Livro = new Livro("bookspace", "localhost", "root", "root");

//cadastrando livro
$Livro->novoLivro($nome, $autor, $editora, $genero, $idioma, $pag, $peso, $altura, $ediçao, $ano, $valor, $fotos, $_SESSION["usuario"], $descricao );


?>