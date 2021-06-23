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
        $tel = $dados["telefone"];
        $email = $dados["email"];
        $senha = $dados["senha"];
        $cidade = $dados["cidade"];
        $estado = $dados["estado"];

        if ($this->validacao($nome, $tel, $email, $cidade, $estado, $senha)){
            ?>
                <script>history.back()</script>
            <?php
        }else{
        $this->banco->query("update dados set nome_usuario = '$nome', telefone = '$tel'  where cod_usuario = '$usu'");
        $this->banco->query("update usuario set email = '$email', senha = '$senha' where cod_usuario = '$usu'");
        $this->banco->query("update pessoa set cidade = '$cidade', estado = '$estado' where cod_usuario = '$usu'");
        header("location:../dados_usuario.php");
        }
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
        $dad = $this->dados($_SESSION["usuario"]);

        if($dad[0]['email'] != $email){
        $_SESSION["email"] = "Email já existe, por favor digite outro";
        $erro = true;
        }
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

//verifica se o email existe
function veriEmail($e){
    $cmd = $this->banco->query("select * from usuario where email= '$e'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);

    if (!empty($res)){
        return true;
    }
}

}
?>