<?php
session_start();

if (!isset($_SESSION["usuario"])){
  header("location:login.php");
}else{
  require_once('classes/Pesquisa.php');
  $pesquisa = new Pesquisa("bookspace", "localhost", "root", "");
  $id = $_SESSION['usuario'];
  $carrinho = $pesquisa->carrinho($id);
  $total = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de desejos</title>
    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css" />

    <link rel="stylesheet" href="style/css/style.css" />
  
    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
    <link rel="stylesheet" href="./CSS/footer.css">
</head>
<body>
    
<?php require_once "menu.php" ?>

  <div class="container-fluid">
      <div class="col-md-10 mt-5 ml-5 pl-5">
        <h3 class="ml-5">MInha lista</h3>
        
        <?php
        if (!empty($carrinho)){
          for ($i = 0; $i < count($carrinho); $i++){
          echo "
          <div class='card mt-4 ml-5'>
              <div class='card-body d-flex '>
                <div class='h-25 w-25'>
                  <img class='d-block w-50' src='./Books_imgs/imgs/".$carrinho[$i]["nome_bookimg"]."' >
                </div>
                  <div class='book_information card-body d-flex justify-content-between'>
                      <div class='inform'>
                          <div class='book_title'>
                            <h4 class='card-title'>".$carrinho[$i]["nome_livro"]."</h4>
                          </div>
                              <div class='price'>
                                <h5>R$".$carrinho[$i]["preço"]."</h5>
                            </div>
                            <div class='location'>
                                <p>".$carrinho[$i]["estado"].", ".$carrinho[$i]["cidade"]."</p>
                              </div>
                      </div>
                        <div class='botões'>               
                            <div class='editar'>                   
                                  <form method='post' action='Detalhes_livros.php'>                   
                                    <button type='submit' class='btn btn-outline-primary btn-block mb-3'>Ver anúncio</button>  
                                    <input type='hidden' name='livro' value='".$carrinho[$i]["cod_livro"]."'>
                                    </form>
                                  <form method='post' action='banco/updateCar.php'>
                                    <button type='submit' class='btn btn-outline-danger btn-block'>
                                        <i class='fa fa-trash'></i>
                                    </button>   
                                    <input type='hidden' value='".$carrinho[$i]["cod_carrinho"]."' name='carrinho'>
                                  </form>                         
                            </div>
                        </div>                       
                  </div>      
              </div>
          </div>";
          }          

        }else{
          echo "<p class='ml-5 mt-3'>Não há nada na lista</p>";
        }
        ?>
       </div>

  </div>


  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>