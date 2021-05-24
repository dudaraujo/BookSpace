<?php
require_once "Banco.php";

class Carrinho extends Banco{
    function novoItem($idLivro, $id_usuario){
        if ($idLivro !="" && $id_usuario != "" && $this->verifica($idLivro, $id_usuario)){
            $this->banco->query("insert into carrinho(cod_livro, cod_usuario) values ('$idLivro', '$id_usuario')");
        }
    }
    
    function verifica($id, $usu){
        $cmd = $this->banco->query("select * from carrinho where cod_livro = '$id' and cod_usuario = '$usu'");
        $res = $cmd->fetch(PDO::FETCH_ASSOC);

        if (empty($res)){
            return true;
        }
    }

    function apagar($car){
        if ($car != ""){
            $this->banco->query("delete from carrinho where cod_carrinho = '$car'");
        } 
    }
}
?>