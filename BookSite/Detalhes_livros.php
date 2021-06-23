<?php
session_start();

if (!isset($_POST['livro'])){
  header('location:home.php');
}else{
  require_once('classes/Pesquisa.php');
  $pesquisa = new Pesquisa("bookspace", "localhost", "root", "");

  $livro = $_POST['livro'];
  $info = $pesquisa->dadosLivro($livro);
  $fotos = $pesquisa->fotosLivro($livro);
  $generos = $pesquisa->generosLivro($livro);
  $comentarios = $pesquisa->comentarios($livro);

  if (!isset($_COOKIE['historico'])){
    $arr = array($livro);
    setcookie("historico", json_encode($arr), (time() + (1 * 24 * 3600)));
  }else{
    $novo = json_decode($_COOKIE['historico']);

    if($novo[0] != $livro){
      array_unshift($novo, $livro);
    }

    setcookie("historico", json_encode($novo), (time() + (1 * 24 * 3600)));
  }
}
?>

<?php
$anunciante =$info[0]['Cod_Usuario'];
$dados_anun = $pesquisa->dadosUsu($anunciante);

$avaliacoes = $pesquisa->avaliacoes($livro);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalhes do livro</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/compiler/bootstrap.css"
    />

    <link rel="stylesheet" href="style/css/style.css" />

    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
    <link rel="stylesheet" href="./CSS/altera_color.CSS">
    <link rel="stylesheet" href="./CSS/comments.css">
  </head>
  <body>
    
    <?php
    require_once "menu.php";
    ?>

    <div class="container-fluid">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-6">
            <div class="d-flex justify-content-center">
              <img
                class="d-block w-50 mb-4 mt-4"
                <?php echo "src='./Books_imgs/imgs/".$fotos[0]["Nome_BookImg"]."'"?>
                id="imgPr"
                style='height: 400px;'
              />
            </div>
            <div class="d-flex justify-content-center">
              <div class="col-md-3 d-flex justify-content-around">
              <?php
              for ($i = 0; $i < count($fotos); $i++){
                echo "
                  <img
                    src='./Books_imgs/imgs/".$fotos[$i]["Nome_BookImg"]."'
                    class='img-fluid img-thumbnail mr-2'
                    alt=''
                    title=''
                    name='img'
                    style='cursor: pointer;'
                  />";
              }
                ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <h1 class="mb-5"><?php echo $info[0]["Nome_Livro"];?></h1>
            
              <div class="container mb-5">
                <div class="row">
                  <div class="col-4">
                    <h2 class="mb-3">R$<?php echo $info[0]["Preço"];?></h2>
                  </div>
                  <div class="col text-center">
                    <form action="banco/carrinho.php" method="post">                
                    <button type="submit" class="btn btn-primary">MInha lista</button>
                    <input type="hidden" value='<?php echo $livro ?>' name="livro">
                    <input type="hidden" value='<?php echo $info[0]["Cod_Usuario"] ?>' name="cod_usuario">
                    </form>
                  </div>
                </div>
              </div>              
            
          <div class="col-md-12">
            <div class="card">
              <div class="card-body border border-4 border-primary">
                <h5 class="card-title text-center"><?php echo strtoupper($dados_anun[0]["nome_usuario"]) ?></h5>
                
                <div class="container mt-4">
                  <div class="row">
                    <div class="col-sm-5">
                      <img src="./Books_imgs/download.png" class="d-inline w-75">
                    </div>
                    <div class="col-sm">
                      
                      <p> <?php echo $dados_anun[0]['estado']."/".$dados_anun[0]["cidade"] ?> </p>
                      <?php if ($dados_anun[0]['telefone'] != 0){ echo $dados_anun[0]['telefone'];} ?>
                      
                      <p> <?php 
                        $stars = intval($avaliacoes[0]["media"]);

                        echo "<p>".$avaliacoes[0]["quant"]." avaliações:</p>";
                        
                        for($i = 0; $i < $stars; $i++){
                          echo "<img src='Books_imgs/starOn.png' style='width: 35px;'>";
                        }
                        for ($i = 0; $i < 5 - $stars; $i++){
                          echo "<img src='Books_imgs/starOff.png' style='width: 35px;'>";
                        }
                      ?> 
                      </p>

                    </div>
                  </div>
                </div>

                <div class="text-center mt-4">
                <div class="btn-group" role="group" aria-label="Exemplo básico">
                
                <form action='chat.php' method='post'>   
                <button type='submit' class="btn btn-primary mr-5 ml-2">Chat</button>
                <input type="hidden" name='anunciante' value='<?php echo $info[0]["Cod_Usuario"] ?>'>
                </form>

                <button type='button' class="btn btn-primary mr-5" data-toggle="modal" data-target="#exampleModalCenter">
                Avaliar</button>

                </div>

                </div>

              </div>
            </div>
          </div>
        </div>

          <div class="col-md-9 mt-5">
            <h2>Descrição</h2>
            <p>
                  <?php
                  echo $info[0]["Descricao"];
                  ?>
            </p>
          </div>

          <div class="col-md-9 mt-3">
            <h2>Características</h2>
            <div class="container">
                <div class="row">
                  <div class="col bg-secondary">Título</div>
                  <div class="col bg-secondary"><?php echo $info[0]["Nome_Livro"];?></div>
                  <div class="w-100"></div>
                  <div class="col">Ano</div>
                  <div class="col"><?php echo $info[0]["Ano"];?></div>
                  <div class="w-100"></div>
                  <div class="col bg-secondary">Peso</div>
                  <div class="col bg-secondary">
                  <?php if ($info[0]["Peso"] != 0){
                    echo $info[0]["Peso"];
                  }else{
                    echo "Não informado";
                  }?>                 
                  </div>
                  <div class="w-100"></div>
                  <div class="col">Altura</div>
                  <div class="col">
                  <?php if ($info[0]["Altura"] != 0){
                    echo $info[0]["Altura"];
                  }else{
                    echo "Não informado";
                  }?>
                  </div>
                  <div class="w-100"></div>
                  <div class="col bg-secondary">Quantidade de páginas</div>
                  <div class="col bg-secondary"><?php echo $info[0]["Quant_Pag"];?></div>
                  <div class="w-100"></div>
                  <div class="col">Edição</div>
                  <div class="col"><?php echo $info[0]["Edicao"];?></div>
                  <div class="w-100"></div>
                  <div class="col bg-secondary">Idioma</div>
                  <div class="col bg-secondary"><?php echo $info[0]["Idioma"];?></div>
                  <div class="w-100"></div>
                  <div class="col">Editora</div>
                  <div class="col"><?php echo $info[0]["nome_editora"];?></div>
                  <div class="w-100"></div>
                  <div class="col bg-secondary">Generos</div>
                  <div class="col bg-secondary"><?php 
                  for ($i = 0; $i < count($generos); $i++){
                    if ($i != count($generos) - 1){
                    echo $generos[$i]["nome_genero"].",";
                    }else{
                      echo $generos[$i]["nome_genero"];
                    }
                  }
                  ?></div>
                  <div class="w-100"></div>
                  <div class="col">Autor</div>
                  <div class="col"><?php echo $info[0]["nome_autor"];?></div>
              </div>
          </div>

          <div class="mt-5">
            <h2>Mais livros do gênero</h2>

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

          <div class="col-md-9 mt-5">

            <h2 class="mb-5">Comentários</h2>

            <div class="card mb-5">
            <form action = "banco/novoComentario.php" method="post">
                  <input type='hidden' name='livro' value='<?php echo $livro?>'>
                <div class="d-flex align-items-center ">
                  <div class="h-25 w-25">
                    <img class="d-block w-50 rounded-circle ml-4 img-fluid" src="./Books_imgs/download.png" >
                  </div>
                    <textarea id="placeholder" placeholder='Add Your Comment' class="position-relative" name='comentario'></textarea>
                    <div class="but">
                      <input class="comment" type="submit" value='Comment'>
                      <button class="clear" id='clear' type="button">Cancel</button>
                    </div>
                </div>
              </form>
            </div>
            <?php

            for ($i = 0; $i < count($comentarios); $i++){
            echo "
            <div class='card mb-4'>
              <div class='card-body d-flex '>
                <div class='h-25 perfil_width'>
                  <img class='d-block foto_perfil rounded-circle ml-4 mr-4' src='./Books_imgs/download.png' >
                </div>
                <div class='d-block mr-5'>
                  <h5 >".$comentarios[$i]["nome_usuario"]."</h5>
                  <p >".
                    $comentarios[$i]["comentario"]
                  ."</p>
                </div>
              </div>
            </div>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>


<!--pop up-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fluid 1" role="document" style>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Avaliação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id = "list-stars">
            <img src='Books_imgs/starOff.png' name='star' id='1' style='cursor: pointer;'>
            <img src='Books_imgs/starOff.png' name='star' id='2' style='cursor: pointer;'>
            <img src='Books_imgs/starOff.png' name='star' id='3' style='cursor: pointer;'>
            <img src='Books_imgs/starOff.png' name='star' id='4' style='cursor: pointer;'>
            <img src='Books_imgs/starOff.png' name='star' id='5' style='cursor: pointer;'>
            </div>
            <form action='banco/novaAvaliacao.php' method='post' id='form-nota'>
            <input type='hidden' name='nota' id='nota'>
            <input type="hidden" value='<?php echo $livro ?>' name="livro">
            <input type="hidden" value='<?php echo $info[0]["Cod_Usuario"] ?>' name="cod_usuario">
            </form>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>



    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="./scripts/comments.js"></script>
    <script src="./scripts/imgDet.js"></script>
  </body>
</html>
