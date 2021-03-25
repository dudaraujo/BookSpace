<?php
session_start();

if (!isset($_SESSION["usuario"])){
  header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de livro</title>
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css" />

  <link rel="stylesheet" href="style/css/style.css" />

  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="CSS/nav.css" />
  <link rel="stylesheet" href="CSS/cadastro_livro.CSS">
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
                <input class="form-control ml-2 " type="search" placeholder="search...">
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
    <div class="col-12 text center my-5">
      <h1 class="text-center"> Cadastre o livro</h1>
    </div>
    <div class="row justify-content-center mb-5">
      <div class="col-sm-12 col-md-10 col-lg-8">
        <form method="POST" action="banco/novoLivro.php" enctype="multipart/form-data" >
          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputAuthor" placeholder="Autor" name="autor">
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-12">
              <input type="text" class="form-control" id="inputEditor" placeholder="Editora" name="editora">
            </div>
            <div class="form-group col-sm-12" id="generos">
            <button type="button" onClick="teste()" style="width: 30px; background-color: #ADD8E6; color: white;">+</button>
              <input type="text" class="form-control" id="inputGender" placeholder="Gênero" name="genero[]">
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputLang" placeholder="Idioma" name="idioma">
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputQuant" placeholder="Quantidade de páginas" name="pag">
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-3">
              <input type="text" class="form-control" id="inputweight" placeholder="Peso" name="peso">
            </div>
            <div class="form-group col-sm-3">
              <input type="text" class="form-control" id="inputHeight" placeholder="Altura" name="altura">
            </div>
            <div class="form-group col-sm-3">
              <input type="text" class="form-control" id="inputEdition" placeholder="Edição" name="ediçao">
            </div>
            <div class="form-group col-sm-3">
              <input type="text" class="form-control" id="inputYear" placeholder="Ano" name="ano">
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-6">
              <label for='selecao-arquivo'> <img src="./Books_imgs/adicionar_foto.jpeg" class="img-thumbnail"
                  id="input_img"></label>
              <input id='selecao-arquivo' type='file' class="upload" name="arquivos[]" multiple>
              <img class="img-thumbnail" id="show_img">
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Valor R$" name="valor">
            </div>
            <br> <br> <br> <br>
          </div>
          <div class="d-flex  justify-content-center">
            <div class="w-25">
              <button type="submit" class="btn btn-primary btn-center btn-block ">cadastrar</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  <footer class="row bg-primary" id="footer"></footer>


  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="./scripts/Image_show.js"></script>
  <script src="./scripts/clone.js"></script>
</body>

</html>