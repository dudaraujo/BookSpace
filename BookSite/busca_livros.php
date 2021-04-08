<?php

session_start();

require_once "classes/Pesquisa.php";

$pesquisa = new Pesquisa("bookspace", "localhost", "root", "");
// a var cou é um contador de anuncios
$cou = 0;

// estou fazendo uma busca sem filtro
if (isset($_GET["busca"]) and !isset($_POST["check"])){
  $busca = $pesquisa->pesquisar($_GET["busca"]);
}
//busca com filtro de genero
elseif(isset($_GET["busca"]) and isset($_POST["check"])){
  $ch = $_POST["check"];
  $busca = $pesquisa->filtrar($_GET["busca"], $ch);
  
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

    <link
      rel="stylesheet"
      href="node_modules/font-awesome/css/font-awesome.css"
    />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid">
      <div class="navbar-brand mb-0 d-flex justify-content-center align-items-center" >
          <a href="home.php"
            ><img
              src="./Books_imgs/even_little_book.png"
              class="img-fluid"
              alt="little_book"
          /></a>
          <strong><h2 class="pt-1">BookSpace</h2></strong>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsite">
            <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navdrop">
                            Menu
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="./livro_cadastro.php">Cadastrar</a>
                            <a class="dropdown-item" href="./dados_usuario.php">Minha conta</a>
                            <a class="dropdown-item" href="#">Categorias</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <form class="form-inline" action="busca_livros.php">
                <input class="form-control ml-2 " type="search" placeholder="search..." name="busca">
                <button class="btn btn-warning" type="subtmit">search</button>
                <?php
                  if (!isset($_SESSION["usuario"])){
                    echo "<a href='login.php' class='btn btn-primary ml-3' id='login'>login</a>";
                  }else{
                  echo "<a href='sair.php' class='btn btn-primary ml-3' id='login'>sair</a>";
                  }
                  ?>
            </form>
        </div>
    </div>
  </nav>
    <div class="container-fluid">
          <div class="container" id="categories_content">
            <div class="row mt-4">
              <div class="col-md-3">
                <div class="card border-light card_filter">
                  <div class="card-header"><strong>Filtro</strong></div>
                  <div class="card-body">

                  <form method="post">
                  <label for="Romance">Romance</label>  
                  <input type ="checkbox" id="Romance" name="check[]" value="romance">
                  <br>

                  <label for="ação">ação</label>  
                  <input type ="checkbox" id="ação" name="check[]" value="ação">
                  <br>

                 <label for="infanto">infanto-juvenil</label> 
                  <input type ="checkbox" id="infanto" name="check[]" value="infanto-juvenil">
                  <br>

                  <label for="estrangeiro">estrangeiro</label> 
                  <input type ="checkbox" id="estrangeiro" name="check[]" value="estrangeiro">
                  <br>

                  <label for="Biografias">Biografias</label> 
                  <input type ="checkbox" id="Biografias" name="check[]" value="Biografias">
                  <br>

                  <label for="mangás/gibis">mangás/gibis</label> 
                  <input type ="checkbox" id="mangás/gibis" name="check[]" value="manga">
                  <br>

                  <label for="terror/suspense">terror/suspense</label> 
                  <input type ="checkbox" id="terror/suspense" name="check[]" value="terror">
                  <br>

                  <label for="auto ajuda">auto ajuda</label> 
                  <input type ="checkbox" id="auto ajuda" name="check[]" value="auto ajuda">
                  <br>

                  <label for="religioso">religioso</label> 
                  <input type ="checkbox" id="religioso" name="check[]" value="religioso">
                  <br>

                  <label for="infantis">infantis</label> 
                  <input type ="checkbox" id="infantis" name="check[]" value="infantis">
                  <br>
                  
                  <label for="acadêmicos">acadêmicos</label> 
                  <input type ="checkbox" id="acadêmicos" name="check[]" value="acadêmicos">
                  <br>

                  <label for="fantasia">fantasia</label> 
                  <input type ="checkbox" id="fantasia" name="check[]" value="fantasia">
                  <br><br>

                  <input type="hidden" name="busca" value="$busca">

                  <button class="btn btn-primary ml-3" type="subtmit">filtrar</button>

                  </form>

                  </div>
                </div>
              </div>
              <div class="col-md-9" id="results_cards">

              <?php
                if (!empty($busca)){
                for ($i = 0; $i<count($busca); $i++){
                  if ($busca[$i]["C"] == 1){
                echo "
                <div class='card mb-4'>
                  <div class='card-body d-flex '>
                    <div class='h-25 w-25'>";

                      echo "<img class='d-block w-50' src='Books_imgs/imgs/".$busca[$i]["Nome_BookImg"]."' >";
                    
                    echo  "</div>
                      <div class='book_information'>
                        <div class='book_title mb-'>";

                          echo "<h4 class='card-title'>".$busca[$i]["nome_livro"]."</h4>";

                        echo "</div>
                            <div class='price mb-'>";

                              echo "<h5>R$".$busca[$i]["preço"]."</h5>";

                            echo "</div>
                            <div class='location mb-'>";

                              echo "<p>São paulo, ".$busca[$i]["cidade"]."</p>";
                              
                            echo"</div>
                            <div class='visit_button'>";

                              echo "<a href='#' class='btn btn-primary'>Visitar livro</a>";

                           echo "</div>
                      </div>      
                  </div>
                </div>";
                $cou += 1;
                }       
                }
                }
                if ($cou == 0){
                  echo "<h1>sem resultados</h1>";
                }
                ?>
                
                
              </div>


            
                
            </div>
          </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
