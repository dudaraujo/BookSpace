<?php

require_once('../classes/Livro.php');

if (!isset($_SESSION['usuario'])){
    header("location:../login.php");
}else{
    $usu = $_SESSION['usuario'];
    $vendedor = $_POST['cod_usuario'];
    $id_livro = $_POST['livro'];
    ?>

    <form action='../Detalhes_livros.php' method='post' id='form'>
        <input type='hidden' name='livro' value='<?php echo $id_livro; ?>'>
    </form>

    <?php

    if($_POST['nota'] != ""){
        $nota = $_POST['nota'];

        if ($usu != $vendedor){
            $livro = new Livro("bookspace", "localhost", "root", "");

            $livro->novaAvaliacao($nota, $id_livro, $usu );
        }else{
            ?>

            <script>
            document.querySelector("#form").submit()
            </script>

            <?php
        }
    }
}
?>

<script>
document.querySelector("#form").submit()
</script>
