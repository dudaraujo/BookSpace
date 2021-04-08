<?php
require_once "classes/UsuUp.php";

if (!isset($_SESSION["usuario"])){
  header("location:login.php");
}else{
  $upd = new Update("bookspace", "localhost", "root", "");

  //estou pegando os dados do usuario logado
  $dados = $upd->dados($_SESSION["usuario"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados usuário</title>

  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css" />

  <link rel="stylesheet" href="style/css/style.css" />

  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="./CSS/nav.css">
  <link rel="stylesheet" href="./CSS/cadastro.css">
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
    <div class="col-12 text center my-5">
      <h1 class="text-center"> Seus Dados</h1>
    </div>

    <div class="row justify-content-center mb-5">
      <div class="col-sm-12 col-md-10 col-lg-8">
        <form method="POST" action="banco/updateUsu.php">
          <div class="form row">
            <div class="form-group col-sm-12">
              <input type="text" class="form-control" id="inputNome" placeholder="Nome" value='<?php echo $dados[0]["nome_usuario"] ?>' name="nome">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputEnd" placeholder="CPF" value='<?php echo $dados[0]["cpf"] ?>' name="cpf">
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputCEP" placeholder="RG" value='<?php echo $dados[0]["rg"] ?>' name="rg">
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputTel" placeholder="Telefone" value='<?php echo $dados[0]["telefone"] ?>' name="telefone">
            </div>

            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputTel" placeholder="E-mail" value='<?php echo $dados[0]["email"] ?>' name="email">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-sm-12">
              <input type="text" class="form-control" id="inputNome" placeholder="Cidade" value='<?php echo $dados[0]["cidade"] ?>' name="cidade">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputNome" placeholder="CEP" value='<?php echo $dados[0]["cep"] ?>' name="cep">
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputEnd" placeholder="Bairro" value='<?php echo $dados[0]["logradouro"] ?>' name="logradouro">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Número" value='<?php echo $dados[0]["numero"] ?>' name="numero">
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputEnd" placeholder="Complemento" value='<?php echo $dados[0]["complemento"] ?>' name="complemento">
            </div>
          </div>

          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value='<?php echo $dados[0]["senha"] ?>' name="senha">
            </div>
            <div class="form-group col-sm-6">
              <input type="password" class="form-control" id="Senha" placeholder="Confirmar Senha" value='<?php echo $dados[0]["senha"] ?>' name="confSenha">
            </div>
            <br> <br> <br> <br>
          </div>
          



          <div class="d-flex  justify-content-left">
            <div class="w-auto">
              <button type="submit" class="btn btn-warning">salvar</button>
              <button type="button" onclick="window.location.href = 'home.php'" class="btn btn-danger">cancelar</button>
            </div>
            <br><br>
          </div>

        </form>
      </div>

    </div>
  </div>

<br><br>
  <footer class="row bg-primary" id="footer"></footer>


  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="./scripts/mostra_senha.js"></script>

</body>
</html>