<?php
session_start();
require_once "../classes/Chat.php";

$chat = new Chat("bookspace","localhost","root","");

$usu = $_SESSION['usuario'];

if (isset($_POST)){
    if (isset($_POST['conversa'])){
        $conversa = $_POST['conversa'];
    }else{
        $conversa = false;
    }
    $msg = $_POST['send'];
    $anun = $_POST['anunciante'];

    $id = $chat->newMessage($usu, $anun, $conversa, $msg);

    echo $id;
}

?>