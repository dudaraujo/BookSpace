<?php

session_start();
require_once "classes/Pesquisa.php";

$pesquisa = new Pesquisa("bookspace", "localhost", "root", "");
// a var cou é um contador de anuncios
$cou = 0;

//generos do banco
$generos = $pesquisa->generos();

// estou fazendo uma busca sem filtro
if (isset($_GET["busca"]) and $_GET["busca"] != ""){
  $busca = $pesquisa->pesquisar($_GET["busca"]);                        
}
else{
  header("location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscar livros</title>

    <link
      rel="stylesheet"
      href="node_modules/bootstrap/compiler/bootstrap.css"
    />

    <link rel="stylesheet" href="style/css/style.css" />
    
    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>

  </head>

  <body>
    <?php require_once "menu.php" ?>


    <div class="container-fluid ">
          <div class="container" id="categories_content">
            <div class="row mt-4">
              <div class="col-md-3">
                <div class="card border-ligthcard_filter">
                  <div class="card-header"><strong><a href="#demo" data-toggle="collapse">Generos</a></strong></div>
                  <div class="card-body">
                  
                  <form method="post">
                  <div id="demo" class="collapse">
                  <?php
                  for ($i = 0; $i < count($generos); $i++){
                    echo "<label for='".$generos[$i]['Nome_Genero']."'>".$generos[$i]['Nome_Genero']."</label>";
                    echo "<input type ='checkbox' class='form-check-input ml-2' id='".$generos[$i]['Nome_Genero']."'' name='check[]' value='".$generos[$i]['Nome_Genero']."'>
                    <br>";
                  }
                  ?>      
                  </div>                       

                  </div>
                </div>

              <div class="card-header mt-3"><strong style="color: #007bff;">Preço</strong></div>
                  <div class="form row mt-3">

                    <div class="form-group col-sm-6">
                      <input type="text" class="form-control" id="min" placeholder="MIN">
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <input type="text" class="form-control" id="max" placeholder="MAX">
                    </div>   

                  </div>

              <div class="card-header mt-3"><strong style="color: #007bff;">Localização</strong></div>
                  <div class="form row mt-3">

                    <div class="form-group col-sm-6">
                      <input type="text" class="form-control" id="estado" placeholder="Estado">
                    </div>
                    
                    <div class="form-group col-sm-6">
                      <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                    </div>   

                  </div>

                <button class="btn btn-primary mt-3 mx-auto d-block" type="button" onClick="Pesquisar()">filtrar</button>
                </form>
              </div>
              
              <div class="col-md-9">
              <div id="results_cards">

              <?php
                if (!empty($busca)){
                for ($i = 0; $i<count($busca); $i++){
                echo "
                <div class='card mb-4' name='livro' id='list-livro'>
                  <div class='card-body d-flex '>
                    <div class='h-25 w-25'>";

                      echo "<img class='d-block w-50' src='Books_imgs/imgs/".$busca[$i]["Nome_BookImg"]."' >";
                    
                    echo  "</div>
                      <div class='book_information'>
                        <div class='book_title mb-'>";

                          echo "<h4 class='card-title'>".$busca[$i]["nome_livro"]."</h4>";

                        echo "</div>
                            <div class='price mb-'>";

                              echo "<h5 id='preço'>R$".$busca[$i]["preço"]."</h5>";

                            echo "</div>
                            <div class='location mb-'>";

                              echo "<p name='localiza'>".$busca[$i]['estado'].", ".$busca[$i]["cidade"]."</p>";
                              
                            echo"</div>
                            <div class='visit_button'>";

                              echo "<form action='Detalhes_livros.php' method='post'>";
                              echo "<button type='submit' class='btn btn-primary'>Visitar livro</a>";
                              echo "<input type='hidden' name='livro' value='".$busca[$i]["cod_livro"]."'>";
                              echo "</form>";
                           echo "</div>
                      </div>";  

                      $generosLivro = $pesquisa->generosLivro($busca[$i]["cod_livro"]);
                      for ($g = 0; $g < count($generosLivro); $g++){
                         echo "<input type='hidden' name='generos[]' value='".$generosLivro[$g]['nome_genero']."'>";
                     }

                echo" </div>
                </div>";
                $cou += 1;   
                }
                  ?>  
                <?php
                }
                if ($cou == 0){
                  echo "<div id='Sresu'><h1>sem resultados</h1></div>";
                }
                ?>

                </div>

                <div id="novaDiv"></div>
                
                <?php
                if ($cou > 0){
                ?>
                <nav aria-label='paginacao' id='pags'>
                <ul class='pagination justify-content-center'>
                  <li class='page-item' role='button' id='first'>
                    <div class='page-link' aria-label='Primero'>
                      <span aria-hidden='true'>&laquo;</span>
                      <span class='sr-only'>Primeiro</span>
                    </div>                    
                  </li>
                  
                  <li class='page-item' id='prev' role='button'><div class='page-link' >Anterior</div></li>

                  <div class='btn-group' id='numbers'>
                  <li class='page-item' role='button'><div class='page-link'>1</div></li>
                  </div>

                  <li class='page-item' role='button' id='next'><div class='page-link'>Proximo</div></li>
                  
                  <li class='page-item' role='button' id='last'>
                    <div class='page-link' aria-label='Ultimo'>
                      <span aria-hidden='true'>&raquo;</span>
                      <span class='sr-only'>Ultimo</span>
                    </div>
                  </li>
                </ul>
              </nav>

              <?php } ?>   

              </div>
            </div>
          </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="scripts/paginacao.js"></script>
    <script src="scripts/filtros.js"></script>
  </body>
</html>
