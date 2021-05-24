<?php
session_start();
require_once "../classes/Chat.php";

$chat = new Chat("bookspace","localhost","root","");

$cod_conversa = $_POST['cod_conversa'];

$msg = $chat->mensagens($cod_conversa);

$usu = $_SESSION['usuario'];


for($i = 0; $i < count($msg); $i++){

    if ($msg[$i]['msg_to'] == $usu){
        echo "
        <tr>
            <td  class='w-100'>
            <p class='bg-primary p-2 mt-2 mr-5 shadow-sm
            text-white float-left rounded'>
            ".$msg[$i]['msg']."
            </p>
            </td>
        </tr>";
    }else{
        echo "
        <tr>
            <td class='w-100'>
            <p class='bg-info p-2 ml-5 mt-2 mr-5 shadow-sm
            text-white float-right rounded'>
            ".$msg[$i]['msg']."
            </p>
            </td>
        </tr>";
    }
}


?>