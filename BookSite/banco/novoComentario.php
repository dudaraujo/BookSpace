<?php

require_once "../classes/Livro.php";

if (!isset($_SESSION["usuario"])){
    header("location:../login.php");
  }else{
    $usu = $_SESSION['usuario'];
    $id = $_POST["livro"];
    $comentario = $_POST['comentario'];
    
    //criando objeto
    $Livro = new Livro("bookspace", "localhost", "root", "");

    //comentario
    $Livro->newComent($id, $comentario, $usu);
    
  }

?>

<form method='post' action='../Detalhes_livros.php' id='form'>
  <input type='hidden' name='livro' value = '<?php echo $id?>'>
</form>

<script>
document.getElementById("form").submit();
</script>