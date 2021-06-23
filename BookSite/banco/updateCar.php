<?php

require_once "../classes/Carrinho.php";

if (!isset($_POST["carriho"])){
$car = $_POST["carrinho"];
$carrinho = new Carrinho("bookspace", "localhost", "root", "");

$carrinho->apagar($car);

header("location:../desejos.php");
}else{
    header("location:../home.php");
}
?>