<?php
session_start();
// excluir a sessão
unset($_SESSION["usuario"]);
header("location:home.php");
?>