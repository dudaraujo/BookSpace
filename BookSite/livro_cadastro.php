<?php
session_start();

if (!isset($_SESSION["usuario"])){
  header("location:login.php");
}else{
  require_once "classes/Pesquisa.php";
  $generos = new Pesquisa("bookspace", "localhost", "root", "");
  $lista = $generos->generos();
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

  <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
  <link rel="stylesheet" href="CSS/cadastro_livro.CSS">
  <link rel="stylesheet" href="./CSS/footer.css">
</head>

<body>

<?php require_once "menu.php" ?>

<div class="container-fluid">
    <div class="col-12 text center my-5">
      <h1 class="text-center"> Cadastre o livro</h1>
    </div>
    <div class="row justify-content-center mb-5">
      <div class="col-sm-12 col-md-10 col-lg-8">
        <form method="POST" action="banco/novoLivro.php" enctype="multipart/form-data" id="dados-form">
          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
              <?php 
              
              if (isset($_SESSION["nome"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["nome"]
                ."</div>";
                unset($_SESSION["nome"]);
              }
              
              ?>
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputAuthor" placeholder="Autor" name="autor">
              <?php 
              
              if (isset($_SESSION["autor"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["autor"]
                ."</div>";
                unset($_SESSION["autor"]);
              }
              
              ?>
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-12">
              <input type="text" class="form-control" id="inputEditor" placeholder="Editora" name="editora">
              <?php 
              
              if (isset($_SESSION["editora"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["editora"]
                ."</div>";
                unset($_SESSION["editora"]);
              }
              
              ?>
            </div>
            
          </div>

          <div class="form-row">
              <div class="form-group col-sm-12" id="generos">
                <div class="input-group">
                  <select class="form-control" name="genero[]" aria-label="Genero" aria-describedby="basic-addon2">
                    <option>Generos</option>

                    <?php 
                      for ($i = 0; $i < count($lista); $i++){
                        echo "<option value='".$lista[$i]['Cod_Genero']."'>".$lista[$i]['Nome_Genero']."</option>";
                      }
                    ?>

                  </select>
                  <div class="input-group-append">
                    <button class="btn btn-primary" id="adc" type="button">+</button>
                    <button class="btn btn-danger" id="remove" type="button">-</button>
                </div>
                </div>
                
                <?php
                if (isset($_SESSION['values'])){
                  $count = count($_SESSION['values']);
                  for ($f = 1; $f < $count; $f++){
                    echo "
                      <select class='form-control mt-3' name='genero[]' aria-label='Genero' aria-describedby='basic-addon2'>
                        <option>Generos</option>";

                          for ($i = 0; $i < count($lista); $i++){
                            echo "<option value='".$lista[$i]['Cod_Genero']."'>".$lista[$i]['Nome_Genero']."</option>";
                          }
                      echo "</select>";
                    unset($_SESSION['values']);
                  }
                }
                ?>
              </div>
              <?php 
              
              if (isset($_SESSION["genero"])){
                echo "<div class='alert alert-danger mt-1 col-sm-12' >".
                  $_SESSION["genero"]
                ."</div>";
                unset($_SESSION["genero"]);
              }
              ?>
          </div>

          <div class="form-group">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder='Descrição do livro' name="descricao"></textarea>
            <?php 
              
              if (isset($_SESSION["descricao"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["descricao"]
                ."</div>";
                unset($_SESSION["descricao"]);
              }
              
              ?>
          </div>

          <div class="form row">
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputLang" placeholder="Idioma" name="idioma">
              <?php 
              
              if (isset($_SESSION["idioma"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["idioma"]
                ."</div>";
                unset($_SESSION["idioma"]);
              }
              
              ?>
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputQuant" placeholder="Quantidade de páginas" name="pag">
              <?php 
              
              if (isset($_SESSION["pag"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["pag"]
                ."</div>";
                unset($_SESSION["pag"]);
              }
              
              ?>
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
              <?php 
              
              if (isset($_SESSION["ediçao"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["ediçao"]
                ."</div>";
                unset($_SESSION["ediçao"]);
              }
              
              ?>
            </div>
            <div class="form-group col-sm-3">
              <input type="text" class="form-control" id="inputYear" placeholder="Ano" name="ano">
              <?php 
              
              if (isset($_SESSION["ano"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["ano"]
                ."</div>";
                unset($_SESSION["ano"]);
              }
              
              ?>
            </div>
          </div>
          <div class="form row">
            <div class="form-group col-sm-6">
              <label for='selecao-arquivo'> <img src="./Books_imgs/adicionar_foto.jpeg" class="img-thumbnail"
                  id="input_img"></label>
              <input id='selecao-arquivo' type='file' class="upload" name="arquivos[]" multiple>
              <div id="imgs">
              </div>
              <?php 
              
              if (isset($_SESSION["fotos"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["fotos"]
                ."</div>";
                unset($_SESSION["fotos"]);
              }
              
              ?>
            </div>
            <div class="form-group col-sm-6">
              <input type="text" class="form-control" id="inputNome" placeholder="Valor R$" name="valor">
              <?php 
              
              if (isset($_SESSION["valor"])){
                echo "<div class='alert alert-danger mt-1'>".
                  $_SESSION["valor"]
                ."</div>";
                unset($_SESSION["valor"]);
              }
              
              ?>
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
    <footer class="row bg-primary" id="footer"></footer>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <script src="./scripts/Image_show.js"></script>
  <script src="./scripts/clone.js"></script>
</body>

</html>