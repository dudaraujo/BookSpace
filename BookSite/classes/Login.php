<?php

session_start();

require_once "Banco.php";

class Login extends Banco{

//verificando email e senha e fazendo login
function verificaLogin($email, $senha){
    $cmd = $this->banco->query("select * from usuario where email= '$email' and senha = '$senha'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);

    if (empty($res)){
        $_SESSION["erro"] = "Email ou Senha invalidos!";
        ?>
        <script>history.back()</script>
        <?php
    }
    else{
        $cmd = $this->banco->query("select * from usuario where email= '$email' and senha = '$senha'");
        $usu = $cmd->fetchColumn();
        $_SESSION["usuario"] = $usu;
        header("location:../home.php");
    }
}

//criando novo usuario
function novoUsuario($no, $tel, $email, $cid, $estado, $s){
    if ($this->validacao($no, $tel, $email, $cid, $estado, $s)){
        ?>
            <script>history.back()</script>
        <?php
    }
    else{
        $this->banco->query("insert into usuario(email, senha) values('$email', '$s')");
        $this->dadosUsuario($no, $tel, $email);
        $this->endereço($cid, $estado, $email);
        header("location:../login.php");
    }
}


//verifica se o email existe
function veriEmail($e){
    $cmd = $this->banco->query("select * from usuario where email= '$e'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);

    if (!empty($res)){
        return true;
    }
}

//registrando endereço
private function endereço($cid,$estado, $e){
    $this->banco->query("insert into endereco(cidade, estado, cod_dados) values
    ('$cid', '$estado', '{$this->qualDados($e)}')");
}

//registrando dados do usuario
private function dadosUsuario($n, $t, $e){
    $this->banco->query("insert into dados(nome_usuario, telefone, cod_usuario) 
    values('$n', '$t', '{$this->qualUsuario($e)}') ");
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

//validando campos
function validacao($no, $tel, $email, $cid, $estado, $s){
    $erro = false;
    $uppercase = preg_match('@[A-Z]@', $s);
    $lowercase = preg_match('@[a-z]@', $s);
    $number    = preg_match('@[0-9]@', $s);
    $specialChars = preg_match('@[^\w]@', $s);

    if ($no == null){
        $_SESSION["nome"] = "preencha o campo";
        $erro = true;
    }

    if ($email == null){
        $_SESSION["email"] = "preencha o email";
        $erro = true;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION["email"] = "Digite um email valido!";
        $erro = true;
    }elseif ($this->veriEmail($email)){
        $_SESSION["email"] = "Email já existe, por favor digite outro";
        $erro = true;
    }

    if ($cid == null){
        $_SESSION["cid"] = "preencha o campo";
        $erro = true;
    }

    if ($estado == null){
        $_SESSION["estado"] = "preencha o campo";
        $erro = true;
    }

    if ($s == null){
        $_SESSION["senha"] = "preencha a senha⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀";
        $erro = true;
    }
    elseif (strlen($s) < 8) {
        $_SESSION["senha"] = "Sua senha deve conter no minimo 8 caracteres!⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀";
        $erro = true;
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars){
        $_SESSION["senha"] = "Senha muito fraca! A senha deve conter no minimo 1 letra maiuscula, 1 letra minuscula, 1 caractere especial e 1 numero";
        $erro = true;
    }

    return $erro;

}

}

?>