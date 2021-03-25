<?php
session_start();
require_once "Banco.php";

class Livro extends Banco{

//metodos

//cadastro do livro
function novoLivro($nome, $autor, $editora, $genero, $idioma, $pag, $peso, $altura, $ediçao, $ano, $valor, $fotos, $usuario){
    $this->banco->query("insert into livro(nome_livro, peso, altura, quant_pag, edicao, idioma, preço, cod_editora, cod_usuario, cod_autor, ano)values
     ('$nome', '$peso', '$altura', '$pag', '$ediçao', '$idioma', '$valor', '{$this->editora($editora)}', '$usuario', {$this->autor($autor)}, '$ano')");
    $id_l = $this->banco->lastInsertId();
    $this->Fotos($fotos, $id_l);
    $this->genero($genero, $id_l);
   header("location:../home.php");
    
}


//verifica se o autor existe e cadastra
private function autor($a){
    $this->cadAutor($a);
    $cmd = $this->banco->query("select * from autor where nome_autor= '$a'");
    return $cmd->fetchColumn();
}

//cadastra o autor
private function cadAutor($a){
    $cmd = $this->banco->query("select * from autor where nome_autor= '$a'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    if (empty($res)){
        $this->banco->query("insert into autor(nome_autor)values ('$a')");
        $cmd = $this->banco->query("select * from autor where nome_autor= '$a'");
    }
}



//cadastra o genero
private function genero($g, $id){
    for ($i = 0; $i < count($g); $i++){
    $this->banco->query("insert into genero(nome_genero, cod_livro)values ('$g[$i]', '$id')");
    }
}


//verifica se a editora existe e cadastra
private function editora($e){
    $this->cadEditora($e);
    $cmd = $this->banco->query("select * from editora where nome_editora= '$e'");
    return $cmd->fetchColumn();
}

//cadastra editora
private function cadEditora($e){
    $cmd = $this->banco->query("select * from editora where nome_editora= '$e'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);

    if (empty($res)){
        $this->banco->query("insert into editora(nome_editora)values ('$e')");
        $cmd = $this->banco->query("select * from editora where nome_editora= '$e'");
    }
}

//upload de fotos
function Fotos($fotos, $id){

$nomes = $fotos["name"];
$arquivos_permitidos = ["png", "jpeg", "jpg"];


for ($i = 0; $i<count($nomes); $i++){
    $extensao = explode(".", $nomes[$i]);
    $extensao = end($extensao);
    $nomes[$i] = $_SESSION["usuario"]. "-" . $id. "-" . $nomes[$i];

    //verificando se a extensao ta certa
    if (in_array($extensao, $arquivos_permitidos)){

        //fazendo upload
        $this->banco->query("insert into bookimg (Nome_BookImg, cod_livro) values('$nomes[$i]', '$id')");
        move_uploaded_file($fotos["tmp_name"][$i], "../Books_imgs/imgs/".$nomes[$i]);
    }
}
}

}

?>