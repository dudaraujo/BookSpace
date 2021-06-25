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
                                  <a class="dropdown-item" href="./livro_cadastro.php">Anunciar</a>
                                  <a class="dropdown-item" href="./dados_usuario.php">Minha conta</a>
                                  <a class="dropdown-item" href="categorias.php">Categorias</a>
                                  <a class="dropdown-item" href="./Meus_anuncios.php">Meus anúncios</a>
                                  <a class="dropdown-item" href="./termos.php">Termos de Uso</a>
                                  <a class="dropdown-item" href="./sobre.php">Sobre nós</a>
                              </div>
                          </li>
                      </ul>
                  </li>
              </ul>
             
              <form class="form-inline" action="busca_livros.php">
                  <input class="form-control ml-2 " type="text" placeholder="Procurar..." name='busca'>
                  <button class="btn btn-warning" type="submit">Procurar</button>
                  <?php
                  if (!isset($_SESSION["usuario"])){
                    echo "<a href='login.php' class='btn btn-primary ml-3' id='login'>Login</a>";
                  }else{
                  echo "<a href='sair.php' class='btn btn-primary ml-3' id='login'>Sair</a>";
                  }
                  ?>
                  <a href="desejos.php" class="btn btn-info ml-3">
                      <i class="fa fa-heart"></i>                    
                  </a>
              </form>
          </div>
      </div>
    </nav>