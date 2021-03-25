<?php

session_start();

require_once "Banco.php";

class Login extends Banco{

//verificando email e senha e fazendo login
function verificaLogin($email, $senha){
    $cmd = $this->banco->query("select * from usuario where email= '$email' and senha = '$senha'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);

    if (empty($res)){
        header("location:../login.php");
    }
    else{
        $cmd = $this->banco->query("select * from usuario where email= '$email' and senha = '$senha'");
        $usu = $cmd->fetchColumn();
        $_SESSION["usuario"] = $usu;
        header("location:../home.php");
    }
}

//criando novo usuario
function novoUsuario($no, $cpf, $rg, $tel, $email, $cid, $cep, $bairro, $num, $comp, $s){
    if ($this->veriEmail($email)){
        header("location:../Cadastro.php");
    }
    else{
        $this->banco->query("insert into usuario(email, senha) values('$email', '$s')");
        $this->dadosUsuario($no, $cpf, $rg, $tel, $email);
        $this->endereço($cid, $cep, $bairro, $num, $comp, $email);
        header("location:../login.php");
    }
}

//verifica se o email existe
private function veriEmail($e){
    $cmd = $this->banco->query("select * from usuario where email= '$e'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);

    if (!empty($res)){
        return true;
    }
}

//registrando endereço
private function endereço($cid, $cep, $bairro, $num, $comp, $e){
    $this->banco->query("insert into endereco(cep, logradouro, numero, cidade, complemento, cod_dados) values
    ('$cep', '$bairro', '$num', '$cid', '$comp', '{$this->qualDados($e)}')");
}

//registrando dados do usuario
private function dadosUsuario($n, $cpf, $rg, $t, $e){
    $this->banco->query("insert into dados(nome_usuario, cpf, rg, telefone, cod_usuario) 
    values('$n', '$cpf', '$rg', '$t', '{$this->qualUsuario($e)}') ");
}

//esta vendo qual o cod_usuario
private function qualUsuario($e){
    $cmd = $this->banco->query("select * from usuario where email= '$e'");
    return $cmd->fetchColumn();
}

//estou vendo qual o cod_dados
private function qualDados($e){
    $cmd = $this->banco->query("select * from dados where cod_usuario= '{$this->qualUsuario($e)}'");
    return $cmd->fetchColumn();
}

}
?>