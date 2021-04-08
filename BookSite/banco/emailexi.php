<?php
require_once "../classes/Login.php";

$email = $_POST["email"];
$login = new Login("bookspace", "localhost", "root", "");

$exi = $login->veriEmail($email);

if($exi){
   echo "existe";
}else{
    echo "nao existe";
}