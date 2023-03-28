<?php
session_start();

$_SESSION['pedido'] = $_GET['codigo'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Gerenciais</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/atendimento.css">


          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../css/addons/datatables.min.css">
      
</head>
<body>
  <header>
<?php require '../../GeneralComponents/Nav.php'; ?>
<div class="card card-intro blue-gradient">
  <div class="card-body white-text rgba-black-light text-center">
    <!--Grid row-->
    <div class="row d-flex justify-content-center">
      <!--Grid column-->
      <div class="col-md-6">
        <p class="h4 mb-2">
          Atendimento N°: <span><?php
                                echo $_GET['codigo'] ?></span>
        </p>
        <p class="float-left h6 mb-0"><i class="fas fa-user-alt"></i> CLIENTE: <span> <?php echo $_SESSION['client']['nome']; ?></span></p><br>
        <p class=" float-left h6 mb-0"><i class="fas fa-cash-register"></i> VENDEDOR: <span> <?php echo $_SESSION['vendedor']['nome']; ?></span></p>
      </div>
    </div>
  </div>
</div>
</header>

<div class="card">
<div class="card-header indigo text-white">
  CONFERIR PRODUTOS EM ESTOQUE
  <div class="btn-group float-right" role="group" aria-label="Basic example">
    <button type="button" onclick="window.location.href='cart.php?codigo=<?php echo $_GET['codigo']; ?>'" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> CESTA</button>
    <button type="button" class="btn info-color"><i class="fas fa-file-csv"></i> ARQUIVO CSV</button>
    <button type="button" class="btn danger-color">ENCERRAR ATENDIMENTO <i class="fas fa-sign-out-alt"></i></button>
  </div>
</div>
<input class="form-control mb-4 tableSearch " id="pesquisa" type="text" placeholder="DIGITE O NOME DO ITEM E ENCONTRE O QUE DESEJA ...." />
    <button class='btn btn-dark-green' onclick='pesquisa()'>Pesquisar</button>
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