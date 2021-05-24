<?php
require_once "../classes/UsuUp.php";
$dados = $_POST;

$up = new Update("bookspace", "localhost", "root", "");

$up->attDados($dados);

?>