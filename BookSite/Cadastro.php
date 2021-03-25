<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>

  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css" />

  <link rel="stylesheet" href="style/css/style.css" />

  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="./CSS/nav.css">
  <link rel="stylesheet" href="CSS/cadastro.css">
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
                <input class="form-control ml-2 " type="search" placeholder="search..." name="busca" >
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
      <h1 class="text-center">Cadastre-se</h1>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="col-sm-12 col-md-10 col-lg-8">
        <form method="POST" action="banco/novoUsuario.php">
          <div class="form row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputEnd" placeholder="CPF" name="cpf">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputCEP" placeholder="RG" name="rg">
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputTel" placeholder="Telefone" name="telefone">
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputTel" placeholder="E-mail" name="email">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" id="inputNome" placeholder="Cidade" name="cidade">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputNome" placeholder="CEP" name="cep">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputEnd" placeholder="Bairro" name="bairro">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Número" name="numero">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputEnd" placeholder="Complemento" name="complemento">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-md-6">
              <div class="input-group md-3">
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" name="senha">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">
                    <img  id="olho"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="
                />
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group col-md-6">
              <input type="password" class="form-control" id="Senha" placeholder="Confirmar Senha" name="confSenha"> 
            </div>
            <br> <br> <br> <br>
          </div>




          <div class="d-flex  justify-content-center">
            <div class="w-25">
              <button type="submit" class="btn btn-primary btn-center btn-block ">cadastrar</button>
            </div>
          </div>

        </form>
      </div>

    </div>


    
  </div>


  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="./scripts/mostra_senha.js"></script>

</body>
</html>