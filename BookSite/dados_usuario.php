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

  <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
  <link rel="stylesheet" href="./CSS/cadastro.css">
  <link rel="stylesheet" href="./CSS/footer.css">
</head>

<body>
  
<?php require_once "menu.php" ?>

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
            <div class="form-group col-sm-12">
              <input type="text" class="form-control" id="inputNome" placeholder="Estado" value='<?php echo $dados[0]["estado"] ?>' name="estado">
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



  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="./scripts/mostra_senha.js"></script>

</body>
</html>