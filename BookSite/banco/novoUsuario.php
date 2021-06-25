<?php
require_once "./classes/Login.php";

if (!empty($_POST)){
$nome = $_POST["nome"];
$tel = $_POST['telefone'];
$email = $_POST['email'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$senha = $_POST['senha'];

//criando objeto login
$login = new Login("bookspace", "localhost", "root", "root");

//criando usuario
$login->novoUsuario($nome, $tel, $email, $cidade, $estado ,$senha);

}
else{
    header("location:../Cadastro.html");
}

?>