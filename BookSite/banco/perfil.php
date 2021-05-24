<?php
session_start();
require_once "../classes/Chat.php";

$chat = new Chat("bookspace","localhost","root","");

$cod_conversa = $_POST['cod_conversa'];

$msg = $chat->mensagens($cod_conversa);

$usuarios = $chat->usuarios();

$usu = $_SESSION['usuario'];

$nome = $msg[0]['msg_to'] == $usu ? $usuarios[$msg[0]['msg_from'] - 1]["Nome_Usuario"] : $usuarios[$msg[0]['msg_to'] -1]["Nome_Usuario"] ;
$anunciante = $msg[0]['msg_to'] == $usu ? $usuarios[$msg[0]['msg_from'] - 1]["Cod_Usuario"] : $usuarios[$msg[0]['msg_to'] -1]["Cod_Usuario"] ;

echo "<input type='hidden' id='anunciante' value='".$anunciante."'>";
echo "
<img src='./Books_imgs/download.png' alt='' class='profile-image rounded-circle'>
<span class='ml-2'>".$nome."</span>";

?>