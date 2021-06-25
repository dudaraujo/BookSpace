<?php

class Banco{
    protected $banco;

//fazendo conexão com o banco
function __construct($db, $host, $usuario, $senha){
try{
    $this->banco = new PDO("mysql:dbname=".$db.";host=".$host,$usuario,"root");
}
catch(PDOException $e){
    echo "erro com o banco:".$e->getMessage();
    exit();
}
catch(Exception $e){
    echo "erro generico:".$e->getMessage();
    exit();
}
}
}
?>