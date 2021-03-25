<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/compiler/bootstrap.css"
    />

    <link rel="stylesheet" href="style/css/style.css" />

    <link
      rel="stylesheet"
      href="node_modules/font-awesome/css/font-awesome.css"
    />
    <link rel="stylesheet" href="CSS/nav.css" />
    <link rel="stylesheet" href="CSS/home.css" />
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
             
              <form class="form-inline" method="get" action="busca_livros.php">
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
      <div class="pt-4">
        <div class="col-md">
          <strong><h3>destaques</h3></strong>
        </div>
      </div>

      <div class="pt-4" id="carroussel">
        <div
          id="carouselExampleControls"
          class="carousel slide"
          data-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="col-3 float-left">
                <img
                class="d-block w-50"
                src="./Books_imgs/Diario_banana.jpg"
                alt="3"
              />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>

              <div class="col-3 float-left">
                <img
                  class="d-block w-50"
                  src="./Books_imgs/Diario_banana.jpg"
                  alt="3"
                />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>

              <div class="col-3 float-left">
                <img
                  class="d-block w-50"
                  src="./Books_imgs/Diario_banana.jpg"
                  alt="3"
                />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>

              <div class="col-3 float-left">
                <img
                class="d-block w-50"
                src="./Books_imgs/Diario_banana.jpg"
                alt="3"
              />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>
            </div>

            <div class="carousel-item">
              <div class="col-3 float-left">
                <img
                class="d-block w-50"
                src="./Books_imgs/Diario_banana.jpg"
                alt="3"
              />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>

              <div class="col-3 float-left">
                <img
                class="d-block w-50"
                src="./Books_imgs/Diario_banana.jpg"
                alt="3"
              />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>

              <div class="col-3 float-left">
                <img
                class="d-block w-50"
                src="./Books_imgs/Diario_banana.jpg"
                alt="3"
              />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>

              <div class="col-3 float-left">
                <img
                class="d-block w-50"
                src="./Books_imgs/Diario_banana.jpg"
                alt="3"
              />
                <p>Nome: </p>
                <p>por: R$ </p>
              </div>
            </div>

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

    
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>