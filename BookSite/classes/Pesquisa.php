<?php
require_once "Banco.php";

class Pesquisa extends Banco{
//busca sem filtro
function pesquisar($b){
        $t = "%".$b."%";
        $res = array();

        if (!empty($b)){
        $cmd = $this->banco->query("select * from busca where nome_livro like '$t' 
        group by cod_livro");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($res);
    }

//pede os generos do livro
function generosLivro($id){
    if (!empty($id)){
        $comando = $this->banco->query("select G.nome_genero, G.cod_genero from livro_genero LG
        inner join genero G 
        on G.cod_genero = LG.cod_genero and LG.cod_livro = '$id';");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
    }
}

//pede os generos do livro
 function generos(){
            $comando = $this->banco->query("select * from genero order by nome_genero");
            $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
            return ($resp);
    }

//pede os dados do livro
function dadosLivro($id){
    if (!empty($id)){
        $comando = $this->banco->query("select L.*, A.nome_autor, E.nome_editora from livro L
        inner join autor A
        on A.cod_autor = L.cod_autor
        inner join editora E
        on E.cod_editora = L.cod_editora
        where L.cod_livro = '$id';");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
    }
}

//pega as fotos
function fotosLivro($id){
    if (!empty($id)){
        $comando = $this->banco->query("select * from bookimg where cod_livro = '$id';");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
    }
}

//pega os comentarios do livro
function comentarios($id){
    if (!empty($id)){
        $comando = $this->banco->query("select C.comentario, D.nome_usuario from comentarios C
        inner join dados D
        on D.cod_usuario = C.cod_usuario
        where C.cod_usuario = '$id'");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
    }
}

//pega os anuncios
function anuncios($id){
    if (!empty($id)){
        $comando = $this->banco->query("select L.cod_livro ,L.nome_livro, L.preço, B.nome_bookimg from livro L
        inner join bookimg B
        on L.cod_livro = B.cod_livro
        where L.cod_usuario = '$id'
        group by L.cod_livro
        order by cod_livro desc");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
    }
}

//carrinho
function carrinho($id){
    if (!empty($id)){
        $comando = $this->banco->query("select C.cod_carrinho, L.cod_livro ,L.nome_livro, L.preço, E.estado, E.cidade, Im.nome_bookimg from carrinho C
        inner join livro L
        on C.cod_livro = L.cod_livro
        inner join dados D
        on D.cod_usuario = L.cod_usuario
        inner join endereco E
        on E.cod_dados = D.cod_dados
        inner join bookimg Im
        on Im.cod_livro = L.cod_livro
        where C.cod_usuario = '$id'
        group by L.cod_livro
        order by C.cod_carrinho desc");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
    }
}

//todos livros
function allBooks(){
    $comando = $this->banco->query("select * from busca group by cod_livro");
        $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
        return ($resp);
}

//escolhendo um genero pra recomendaçao
function randGenero(){
    $comando = $this->banco->query("select cod_genero, if(count(cod_genero) >= 4, 1, 0) m4 from livro_genero group by cod_genero");
    $recomendacao = $comando->fetchAll(PDO::FETCH_ASSOC);

    $count = array_column($recomendacao, "m4");
    $filtro = array_keys($count, 1);
    $generos = array_column($recomendacao, "cod_genero");
    
    $genero_aleatorio = array_rand($filtro, 1);
    
    $escolhido = $filtro[$genero_aleatorio];

    return $generos[$escolhido];
}

//criando uma lista de recomendacoes aleatoria
function recomendacao(){
    $randGenero = $this->randGenero();
    
    $comando = $this->banco->query("select cod_livro from  livro_genero where cod_genero = '$randGenero'");
    $resp = $comando->fetchAll(PDO::FETCH_ASSOC);

    $livros = array_column($resp, "cod_livro");

    return $livros;
}

//pegando dados do usuario
function dadosUsu($id){
    $comando = $this->banco->query("select D.nome_usuario, D.telefone, E.estado, E.cidade from dados D 
    inner join endereco E
    where D.cod_usuario = '$id'
    group by D.cod_dados");

    $resp = $comando->fetchAll(PDO::FETCH_ASSOC);
    return $resp;
}

//avaliacoes do livro
function avaliacoes($id){
    $comando = $this->banco->query("select avg(nota) media, count(nota) quant from avaliacao where cod_livro = '$id'");
    $resp = $comando->fetchAll(PDO::FETCH_ASSOC);

    return $resp;
}
}
?>