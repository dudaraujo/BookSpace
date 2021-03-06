<?php
require_once "../classes/Login.php";

if (!empty($_POST)){
$nome = $_POST["nome"];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$tel = $_POST['telefone'];
$email = $_POST['email'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$senha = $_POST['senha'];
$confSenha = $_POST['confSenha'];

//criando objeto login
$login = new Login("bookspace", "localhost", "root", "");

//criando usuario
$login->novoUsuario($nome, $cpf, $rg, $tel, $email, $cidade, $cep, $bairro, $numero, $complemento, $senha);

}
else{
    header("location:../Cadastro.html");
}

?>