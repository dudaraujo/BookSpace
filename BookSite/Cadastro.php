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

  <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
  <link rel="stylesheet" href="./CSS/cadastro.css">
  <link rel="stylesheet" href="./CSS/footer.css">
</head>

<body>
  
  <?php require_once "menu.php" ?>


  <div class="container-fluid">
    <div class="col-12 text center my-5">
      <h1 class="text-center">Cadastre-se</h1>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="col-sm-12 col-md-10 col-lg-8">
        <form method="POST" action="banco/novoUsuario.php" id="dados-form" novalidate>
          <div class="form row">
            <div class="form-group col-md-12">
              <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" yep>
              <?php 
              
              if (isset($_SESSION["nome"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["nome"]
                ."</div>";
                unset($_SESSION["nome"]);
              }
              
              ?>
            </div>
          </div>

          <div class="form row mt-4">
            <div class="form-group col-md-12">
              <input type="email" class="form-control" id="inputTel" placeholder="E-mail" name="email" maxlength="30" yep>
              <?php 
              
              if (isset($_SESSION["email"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["email"]
                ."</div>";
                unset($_SESSION["email"]);
              }
              
              ?>

            </div>
          </div>

          <div class="form-row mt-4">
            <div class="form-group col-md-12">
                <input type="number" class="form-control" id="inputTel" placeholder="Telefone" name="telefone" >                
            </div>
          </div>

          <div class="form row mt-4">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Cidade" name="cidade" yep>
              <?php 
              
              if (isset($_SESSION["cid"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["cid"]
                ."</div>";
                unset($_SESSION["cid"]);
              }
              
              ?>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Estado" name="estado" yep>
              <?php 
              
              if (isset($_SESSION["estado"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["estado"]
                ."</div>";
                unset($_SESSION["estado"]);
              }
              
              ?>
            </div>
          </div>

          <div class="form row mt-4">
            <div class="form-group col-md-12">
              <div class="input-group md-3">
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" name="senha" yep>
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">
                    <img  id="olho"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII="
                />
                  </span>
                </div>
                <?php 
              
              if (isset($_SESSION["senha"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["senha"]
                ."</div>";
                unset($_SESSION["senha"]);
              }
              
              ?>
              </div>
            </div>
            <br> <br> <br> <br>
          </div>


          <div class="d-flex  justify-content-center">
            <div class="w-25">
              <button type="submit" class="btn btn-primary btn-center btn-block ">Cadastrar</button>
            </div>
          </div>
        </form>
        <br><br>
      </div>

    </div>


    
  </div>



  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="./scripts/mostra_senha.js"></script>

</body>
</html>