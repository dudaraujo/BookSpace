<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Livros</title>

    <link
      rel="stylesheet"
      href="node_modules/bootstrap/compiler/bootstrap.css"
    />

    <link rel="stylesheet" href="style/css/style.css" />

    <link
      rel="stylesheet"
      href="node_modules/font-awesome/css/font-awesome.css"
    />
    <link rel="stylesheet" href="./CSS/login_page.CSS" />
    <link rel="stylesheet" href="./CSS/animations.CSS" />
    
  </head>

  <body>
    <div class="container">
      <div class="d-flex align-items-center justify-content-left lt_book animate-up">
        <div class="book">
          <a href="home.php"><img src="./Books_imgs/little_book.png" class="img-fluid" alt="book" /></a>
        </div>
        <div class="written">
          <h1 class="title text-light">BookSpace</h1>
        </div>
      </div>

      <div class="col-12 text center my-5 animate-up" id="login_title">
        <h2 class="text-center text-light">Fazer login usando sua conta</h2>
      </div>

      <div class="formulario animate-up">

      <div id="msg" <?php 
        if(isset($_SESSION['erro'])){
          echo "class='alert alert-danger'";
          }?>>
        <?php 
        if(isset($_SESSION['erro'])){
          echo $_SESSION['erro'];
          unset($_SESSION["erro"]);
          }?>
      </div>
      
        <form method="POST" action="banco/veriLogin.php" id="dados-form" novalidate>
          <div>
            <input
              type="email"
              class="form-control form-control-lg"
              id="email"
              aria-describedby="emailHelp"
              placeholder="Email"
              name="email"
            />
          </div>
  <br>
          <div class="form-group">
            <input
              type="password"
              class="form-control form-control-lg"
              id="password"
              placeholder="Senha"
              name="senha"
            />          
          </div>

          <button type="submit" class="btn btn-info btn-lg btn-block">
            Entrar</button
          ><br />

          <div class="under_enter animate-up">
            <div class="text-center">
              <a href="Cadastro.php" class="text-light"> Criar conta </a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  </body>
</html>
