<?php
session_start();
require_once "classes/Pesquisa.php";
$pesquisa = new Pesquisa("bookspace", "localhost", "root", "");

$busca = $pesquisa->allBooks();
$recomendacao = $pesquisa->recomendacao();
$ge = $pesquisa->randGenero();

?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/compiler/bootstrap.css"
    />

    <link rel="stylesheet" href="style/css/style.css" />

    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>

  </head>
  <body>
  <?php require_once "menu.php" ?>
<a href="cadastro.php">
<div class="card bg-dark text-white rounded mx-auto d-block w-50 mt-4">
<a href="cadastro.php" style="color: white;">
  <img class="card-img" src="Books_imgs/banner.jpg" alt="Card image" style='opacity: 60%;'>

  <div class="card-img-overlay mt-4 text-center">
    <h5 class="card-title display-4"><strong>Junte-se a nos</strong></h5>
    <p class="card-text"><h5>Venda seus livros de graça</h3></p>
  </div>
  </a>
</div>


  <?php
  
    if (isset($_COOKIE['historico'])){

      $hist = json_decode($_COOKIE['historico']);

      if(count($hist) >= 4){
        ?>
        <div class="container-fluid">
          <div class="pt-4">
            <div class="col-md">
              <strong><h3>Histórico</h3></strong>
            </div>
          </div>

          <div class="pt-4" id="carroussel">
            <div
              id="carouselExampleControls"
              class="carousel slide"
              data-ride="carousel"
            >

            
            <div class='carousel-inner'>
              <?php
              $divisao = intdiv(count($hist), 4);

              for($c1 = 0; $c1 < $divisao; $c1++){
              echo "
                <div class='carousel-item ";if($c1 == 0){echo "active'";}echo"'>";

                  for($ab = $c1 * 4; $ab < ($c1+1) * 4; $ab++){
                    $histId = $hist[$ab] - 1;
                  echo "
                  <div class='col-3 float-left'>
                    <img
                    class='d-block w-50'
                    src='./Books_imgs/imgs/".$busca[$hist[$ab] - 1]["Nome_BookImg"]."'
                    alt='3'
                    style='cursor:pointer;'
                    onclick='link(".$histId.")'
                  />
                    <p>".$busca[$hist[$ab] - 1]["nome_livro"]."</p>
                    <p>por: R$ ".$busca[$hist[$ab] - 1]["preço"]."</p>
                  </div>
                  ";
                  }

                echo "</div>";
              }
              ?>             

                <a
                  class="carousel-control-prev"
                  href="#carouselExampleControls"
                  role="button"
                  data-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#carouselExampleControls"
                  role="button"
                  data-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>

<?php
  
    if (!empty($recomendacao)){

      if (count($recomendacao) >=8){
        $rand_livros = array_rand($recomendacao, 8);
      }else{
        $rand_livros = array_rand($recomendacao, 4);
      }
      
      $newLivros = [];
      
      for ($i = 0; $i < count($rand_livros); $i++){
        array_push($newLivros, $rand_livros[$i]);
      }

        ?>
        <div class="container-fluid">
          <div class="pt-4">
            <div class="col-md">
              <strong><h3>Livros  que você talvez goste</h3></strong>
            </div>
          </div>

          <div class="pt-4" id="carroussel">
            <div
              id="recomendacoes"
              class="carousel slide"
              data-ride="carousel"
            >

            
            <div class='carousel-inner'>
              <?php
              $divisao = intdiv(count($rand_livros), 4);

              for($c = 0; $c < $divisao; $c++){
              echo "
                <div class='carousel-item ";if($c == 0){echo "active'";}echo"'>";

                  for($a = $c * 4; $a < ($c+1) * 4; $a++){
                  $abc = $recomendacao[$rand_livros[$a]] - 1;
                  echo "
                  <div class='col-3 float-left'>
                  
                    <img
                    class='d-block w-50'
                    src='./Books_imgs/imgs/".$busca[$abc]["Nome_BookImg"]."'
                    alt='3'
                    style='cursor:pointer;'
                    onclick='link(".$abc.")'
                    />
                    <p>".$busca[$abc]["nome_livro"]."</p>
                    <p>por: R$ ".$busca[$abc]["preço"]."</p>

                  </div>
                  ";
                  }

                echo "</div>";
              }
              ?>             

                <a
                  class="carousel-control-prev"
                  href="#recomendacoes"
                  role="button"
                  data-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#recomendacoes"
                  role="button"
                  data-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    ?>

    <form action='detalhes_livros.php' method='post' id='esco'>
      <input type='hidden' name='livro' id='input'>
    </form>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="scripts/recomendacao.js"></script>
  </body>
</html>
