<?php
session_start();
require_once "classes/Chat.php";

$chat = new Chat("bookspace","localhost","root","");

if(!isset($_SESSION['usuario'])){
  header("location:home.php");
}

$usuarios = $chat->usuarios();

$usu = $_SESSION['usuario'];

if (isset($_POST['anunciante'])){
  if ($_POST['anunciante'] == $usu){
    header('location:chat.php');
  }
  $conve = $chat->qualConv($usu, $_POST['anunciante']);

  if($conve){
    ?>
    <script> id = <?php echo $conve[0]['cod_conversa']; ?> </script>
    <?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teste Scroll</title>

    <link
      rel="stylesheet"
      href="node_modules/bootstrap/compiler/bootstrap.css"
    />

    <link rel="stylesheet" href="style/css/style.css" />
    
    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>

    <link rel="stylesheet" href="./CSS/chat.CSS">
  </head>

  <body>


  <?php
    require_once "menu.php";
    ?>

    <div class="container-fluid">
          <div class="container shadow-lg">
            <div class="row chat-top mt-4 rounded">
              <div class="col-sm-4  border-right border-secondary">
                <h3>Histórico</h3>
              </div>
              <div class="col-md-8" id="perfil">
                        <?php 
                        if (isset($_POST['anunciante'])){
                          echo "<input type='hidden' id='anunciante' value='".$_POST['anunciante']."'>";
                          echo "
                          <img src='./Books_imgs/download.png' alt='' class='profile-image rounded-circle'>
                          <span class='ml-2'>".$usuarios[$_POST['anunciante'] -1]['Nome_Usuario']."</span>";
                        }
                        ?>
              </div>

            </div>
            <div class="row">
                <div class="col-sm-4 historic">
                    <div class="historic-table-scroll">
                      <table class="table table-hover" id="historico">
                          
                      </table>
                    </div>
                </div> 
                <div class="col-sm-8 message-area">
                  <div class="message-area-scroll">
                      <div id="aviso">
                        <?php 
                        if (!isset($_POST['anunciante'])){
                          echo "Nenhuma conversa selecionada.";
                        }
                        ?>
                      </div>
                    <table class="table table-borderless" id="conversa">
                    </table>
                  </div>

                <div id="enviar" class="
                       <?php 
                        if (!isset($_POST['anunciante'])){
                          echo "d-none";
                        }
                        ?>
                ">
                  <div class='row message-box p-2'>
                    <div class='col-sm-2'>
                      <button type='button' class='btn btn-outline-dark'>
                        <i class='fas fa-images'></i>
                      </button>
                    </div>
                    <div class='col-sm-8'>
                        <input type='text' id='mensagem' class='form-control' placeholder='Digite aqui...'>
                    </div>
                    <div class='col-sm-2'>

                      <button type='button' class='btn btn-outline-info' onclick='novaMsg()'> 
                        <i class='fas fa-location-arrow'></i>
                      </button>
                    
                    </div>
                    </div>
                    </div>
                </div>
                
            </div>
          </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="scripts/chat.js"></script>
  </body>
</html>