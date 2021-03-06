<?php
require_once "../classes/Login.php";


//estou verificando se os formularios foram preenchidos
if (!empty($_POST)){

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

//criando objeto login
$login = new Login("bookspace", "localhost", "root", "");

//estou verificando se o email existe e fazendo login
$login->verificaLogin($email, $senha);

}


?>