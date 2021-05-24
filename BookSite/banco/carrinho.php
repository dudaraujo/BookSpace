<?php
session_start();

$livro = $_POST["livro"];

?>
<form method='post' action='../Detalhes_livros.php' id='form'>
  <input type='hidden' name='livro' value = '<?php echo $livro?>'>
</form>
<?php

if (!empty($_POST) && isset($_SESSION['usuario'])){
$usuario = $_POST["cod_usuario"];
$logado = $_SESSION['usuario'];

?>

<?php

if ($usuario == $logado){
?>
    <script>
        document.getElementById("form").submit();
    </script>
<?php
}else{
    require_once "../classes/Carrinho.php";

    $carrinho= new Carrinho("bookspace", "localhost", "root", "");

    $carrinho->novoItem($livro, $logado);

    header("location:../carrinho.php");


}
}else{
header("location:../login.php");
}
?>

