<?php
session_start();
require_once "Banco.php";

class Livro extends Banco{

//metodos

//cadastro do livro
function novoLivro($nome, $autor, $editora, $genero, $idioma, $pag, $peso, $altura, $ediçao, $ano, $valor, $fotos, $usuario, $descricao){
    if ($this->validacao($nome, $autor, $editora, $genero, $idioma, $pag, $peso, $altura, $ediçao, $ano, $valor, $fotos, $usuario, $descricao)){
        ?>
        <script>history.back()</script>
        <?php
    }else{
    $this->banco->query("insert into livro(nome_livro, peso, altura, quant_pag, edicao, idioma, preço, cod_editora, cod_usuario, cod_autor, ano, descricao)values
     ('$nome', '$peso', '$altura', '$pag', '$ediçao', '$idioma', '$valor', '{$this->editora($editora)}', '$usuario', {$this->autor($autor)}, '$ano', '$descricao')");
    $id_l = $this->banco->lastInsertId();
    $this->Fotos($fotos, $id_l);
    $this->genero($genero, $id_l);
    header("location:../meus_anuncios.php"); 
    }
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
    $this->banco->query("insert into livro_genero(cod_genero, cod_livro)values ('$g[$i]', '$id')");
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

//novo comentario
function newComent($livro, $comentario, $usu){
if ($comentario != ""){
$this->banco->query("insert into comentarios (cod_livro, comentario, cod_usuario) values ('$livro', '$comentario', '$usu')");
}
}
//nova avaliaçao
function novaAvaliacao($nota, $livro, $usuario){

    if ($this->veriAvaliacao($livro, $usuario)){
        $this->banco->query("insert into avaliacao(nota, cod_livro, cod_usuario) values('$nota', '$livro', '$usuario')");
    }else{
        //update
        $this->banco->query("update avaliacao  set nota = '$nota' where cod_usuario = '$usuario' and cod_livro = '$livro'");
    }
}

//verifica avaliação
function veriAvaliacao($livro, $usuario){
    $cmd = $this->banco->query("select * from avaliacao where cod_livro = '$livro' and cod_usuario = '$usuario'");
    $res = $cmd->fetch(PDO::FETCH_ASSOC);
    
    if (empty($res)){
        return true;
    }
}

//validacao dos campos
function validacao($nome, $autor, $editora, $genero, $idioma, $pag, $peso, $altura, $ediçao, $ano, $valor, $fotos, $usuario, $descricao){
    $erro = false;
    $prox = true;
    $_SESSION["values"] = $genero;
    $_SESSION['galeria'] = $fotos;

    if ($nome == null){
        $_SESSION["nome"] = "preencha o campo";
        $erro = true;
    }

    if ($autor == null){
        $_SESSION["autor"] = "preencha o campo";
        $erro = true;
    }

    if ($editora == null){
        $_SESSION["editora"] = "preencha o campo";
        $erro = true;
    }

    for ($i = 0; $i < count($genero); $i++){
        if (!is_numeric($genero[$i])){
            $_SESSION["genero"] = "selecione os generos";
            $erro = true;
            $prox = false;
        }
    }

    if ($prox){
        $repetidos = array_unique( array_diff_assoc( $genero, array_unique( $genero ) ) );
        if ($repetidos != null){
            $_SESSION["genero"] = "Não é permitido generos repetidos!";
            $erro = true;
        }
    }

    if ($idioma == null){
        $_SESSION["idioma"] = "preencha o campo";
        $erro = true;
    }

    if ($pag == null){
        $_SESSION["pag"] = "preencha o campo";
        $erro = true;
    }

    if ($ediçao== null){
        $_SESSION["ediçao"] = "preencha o campo";
        $erro = true;
    }

    if ($ano == null){
        $_SESSION["ano"] = "preencha o campo";
        $erro = true;
    }

    if ($valor == null){
        $_SESSION["valor"] = "preencha o campo";
        $erro = true;
    }

    if ($fotos['size'][0] == 0) {
        $_SESSION["fotos"] = "Coloque pelo menos uma foto";
        $erro = true;
    }else{
        $nomes = $fotos["name"];
        $arquivos_permitidos = ["png", "jpeg", "jpg"];
        
        
        for ($i = 0; $i<count($nomes); $i++){
            $extensao = explode(".", $nomes[$i]);
            $extensao = end($extensao);
        
            //verificando se a extensao ta certa
            if (in_array($extensao, $arquivos_permitidos) === false){
                $_SESSION["fotos"] = "Extensão de arquivos não permitida, por favor coloque fotos";
                $erro = true;
            }
        }       
    }

    if ($descricao == null){
        $_SESSION["descricao"] = "preencha o campo";
        $erro = true;
    }

    return $erro;
    
}

}

?>