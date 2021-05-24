<?php
session_start();

if (!isset($_SESSION["usuario"])){
  header("location:login.php");
}else{

$id = $_SESSION["usuario"];

require_once "classes/Pesquisa.php";

$pesquisa = new Pesquisa("bookspace", "localhost", "root", "");

$anuncios = $pesquisa->anuncios($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus anuncios</title>
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css" />

    <link rel="stylesheet" href="style/css/style.css" />
  
    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
  </head>
<body>
<?php require_once "menu.php" ?>

  <div class="container-fluid">
      <div class="col-md-10 mt-5 ml-5 pl-5">
        <h3 class="ml-5">Meus anúncios</h3>

        <?php

        if (!empty($anuncios)){
        
        for ($i = 0; $i < count($anuncios); $i++){
        echo "<div class='card mt-4 ml-5'>
            <div class='card-body d-flex '>
              <div class='h-25 w-25'>
                <img class='d-block w-50' src='./Books_imgs/imgs/".$anuncios[$i]["nome_bookimg"]."' >
              </div>
                <div class='book_information card-body d-flex justify-content-between'>
                    <div class='inform'>
                        <div class='book_title'>
                          <h4 class='card-title'>".$anuncios[$i]["nome_livro"]."</h4>
                        </div>
                            <div class='price'>
                              <h5>R$".$anuncios[$i]["preço"]."</h5>
                          </div>
                    </div>
                      <div class='botões'>
                          <div class='ver_compra mb-3'>
                          <form action='Detalhes_livros.php' method='post'>
                            <button type='submit' class='btn btn-outline-primary btn-block'>Ver anúncio</button>
                            <input type='hidden' name='livro' value='".$anuncios[$i]["cod_livro"]."'>
                          </form>
                            </div>
                          <div class='editar'>
                                <a href='#' class='btn btn-outline-primary btn-block'>Editar anúncio</a>
                          </div>
                      </div>
                </div>      
            </div>
        </div>";
        }
        }else{
          echo "<p class='ml-5 mt-3'>Você ainda não fez nenhum anúncio</p>";
        }
        ?>
        
      </div>
  </div>


  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>