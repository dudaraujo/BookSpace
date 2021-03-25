<?php
require_once "Banco.php";

class Pesquisa extends Banco{
function pesquisar($b){
        $t = "%".$b."%";
        $res = array();

        if (!empty($b)){
        $cmd = $this->banco->query("select *, if (1 = 1, true, false) C from busca where nome_livro like '$t' 
        group by cod_livro");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        }
        return ($res);
    }
function filtrar($b, $f){
        $t = "%".$b."%";
        $res = array();
        $count = count($f);

        if (!empty($b)){
        $ar = "";
        foreach ($f as $k => $v) {
                if (end($f) != $v){
                $ar.="'".$v."',";
                }
                else{
                $ar.="'".$v."'";
                }
        }
        $cmd = $this->banco->query("select *, if (count(cod_livro) = '$count', true, false) C from busca where nome_livro like '$t' and nome_genero in ($ar)
        group by cod_livro");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($res);
}
}
?>