<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atendimento</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/mdb.min.css">
  <link rel="stylesheet" href="../css/addons/datatables.min.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark indigo">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.jpg" height="30" alt="mdb logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Logado na revenda <?php echo $_SESSION['vendedor']['revenda']; ?> <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
 
  </header>
  <div class="card">
    <div class="card-header indigo text-white">
      CONFERIR PRODUTOS EM ESTOQUE
    
    </div>
    <input class="form-control mb-4 tableSearch " id="pesquisa" type="text" placeholder="DIGITE O NOME DO ITEM E ENCONTRE O QUE DESEJA ...." />
    <button class='btn btn-dark-green' onclick='pesquisaconsulta()'>Pesquisar</button>
    <div id='endsearch'> </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script src="ajax.js"></script>
    <script src="../js/addons/datatables.min.js"></script>
    <script src="https://cdnjs.com/libraries/jquery.mask"></script>
    <script>
      $(document).ready(function() {
        $(".tableSearch").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
        $('#preco').popover('enable');

      });
    </script>
</body>
</html>