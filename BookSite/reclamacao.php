<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamação</title>

    <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css" />

    <link rel="stylesheet" href="style/css/style.css" />

    <link rel="stylesheet" href="./node_modules/font-awesome/css/all.css"/>
</head>
<body>
    <?php require_once "menu.php" ?>

    <div class="col-md-10 ml-5 mt-4 pl-5">
        <form action="">
        <div class="form-group">
            <h4>Escreva sua reclamação</h4>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEnvio">
            Enviar
        </button>        
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalEnvio" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        Reclamação enviada.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">ok</button>
      </div>
    </div>
  </div>
</div>
    
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/Popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>