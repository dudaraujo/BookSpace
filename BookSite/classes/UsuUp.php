<?php
session_start();
require_once "Banco.php";

class Update extends Banco{

    function dados($u){
        $cmd = $this->banco->query("select * from pessoa where cod_usuario = '$u'");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return ($res);
    }

    function attDados($dados){
        $usu = $_SESSION["usuario"];
        $nome = $dados["nome"];
        $cpf = $dados["cpf"];
        $rg = $dados["rg"];
        $tel = $dados["telefone"];
        $email = $dados["email"];
        $senha = $dados["senha"];
        $cidade = $dados["cidade"];
        $cep = $dados["cep"];
        $logradouro= $dados["logradouro"];
        $num = $dados["numero"];
        $comp = $dados["complemento"];

        $this->banco->query("update dados set nome_usuario = '$nome', cpf = '$cpf', rg = '$rg', telefone = '$tel'  where cod_usuario = '$usu'");
        $this->banco->query("update usuario set email = '$email', senha = '$senha' where cod_usuario = '$usu'");
        $this->banco->query("update pessoa set cidade = '$cidade', cep = '$cep', logradouro = '$logradouro', numero = '$num', complemento = '$comp' where cod_usuario = '$usu'");
        header("location:../dados_usuario.php");
    }
}
?>