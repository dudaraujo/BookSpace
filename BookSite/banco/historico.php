<?php

session_start();

require_once "./classes/Chat.php";

$usu = $_SESSION['usuario'];

$chat = new Chat("bookspace","localhost","root","root");

$hist = $chat->historico($usu);

$usuarios = $chat->usuarios();


for($i = 0; $i < count($hist); $i++){
  $conversa = $hist[$i]['usuario_1'] == $usu ? $hist[$i]['usuario_2']: $hist[$i]['usuario_1'];
  $conversa--;
  $lastMessage = $chat->lastMessage($hist[$i]['cod_conversa']);
  $hora = $hist[$i]["hora"];
  
  echo "
  <tr onclick='setId(".$hist[$i]['cod_conversa'].")'>
    <td><img src='./Books_imgs/download.png' alt=''
      class='profile-image rounded-circle'></td>
    <td>".$usuarios[$conversa]['Nome_Usuario']."<br> <small>".$lastMessage[0]["msg"]."</small></td>
    <td><small>".substr($hora, 10, 6)."</small></td>
  </tr>";
}


?>