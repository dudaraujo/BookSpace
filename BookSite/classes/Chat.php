<?php
require_once "Banco.php";

class Chat extends Banco{
    function historico($id){
        $comando = $this->banco->query("select * from conversa where usuario_1 = '$id' or usuario_2 = '$id' order by hora desc");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);

        return $resp;
    }

    function usuarios(){
        $comando = $this->banco->query("select * from dados");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resp;
    }

    function lastMessage($id){
        $comando = $this->banco->query("select * from msg where cod_conversa = '$id' order by cod_msg desc ");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resp;
    }

    function mensagens($id){
        $comando = $this->banco->query("select * from msg where cod_conversa = '$id'");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resp;
    }

    function qualConv($usu, $vende){
        $comando = $this->banco->query("select * from msg where msg_from = '$usu' and msg_to = '$vende'
        or msg_from = '$vende' and msg_to = '$usu'");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resp;
    }

    function newMessage($from, $to, $conversa, $msg){
       if ($conversa){
           $this->banco->query("insert into msg(cod_conversa, msg_to, msg_from, msg) values('$conversa', '$to', '$from', '$msg')");
           $this->updateHour($conversa);
       }else{
           $this->banco->query("insert into conversa(usuario_1, usuario_2) values('$from', $to)");

           $cod_conv = $this->novaConv($from, $to);

           $this->banco->query("insert into msg(cod_conversa, msg_to, msg_from, msg) values('$cod_conv', '$to', '$from', '$msg')");
           $this->updateHour($cod_conv);

           return $cod_conv;
       }
    }

    function updateHour($conversa){
        $hora = $this->atualHora();

        $this->banco->query("update conversa set hora = '$hora' where cod_conversa = $conversa");
    }

    function novaConv($from, $to){
        $comando = $this->banco->query("select * from conversa where usuario_1 = '$from' and usuario_2 = '$to'");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return $resp[0]['cod_conversa'];
    }

    function atualHora(){
        $timezone = new DateTimeZone('America/Sao_Paulo');
        $agora = new DateTime('now', $timezone);
        $hora = $agora->format('Y-m-d H:i:s');

        return $hora;
    }
}
?>