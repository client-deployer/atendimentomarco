
<?php session_start();

require '../Class/Cesta.php';

$Cesta = new Cesta($_GET['codigo']);

$total = $Cesta->calculandototal();

$dados = $Cesta->escrevercesta();
$dados = json_decode($dados);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Gerenciais</title>
   
   
    <link rel="stylesheet" href="../css/style.css">



          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../css/addons/datatables.min.css">

      <script src='ajax.js'> </script>
      
</head>
<body>
  
<?php  require '../../GeneralComponents/Nav.php';

?>


          


<div class="container-card m-4">
<div class="row">
    <div class="col-md-8 card  blue-gradient text-white p-5 table-responsive text-nowrap mb-3">
                <table class="table ">
              <thead class="thead-dark">
                <tr >
                  <th scope="col" >COD</th>
                  <th scope="col">ITEM ESTOQUE</th>
                  <th scope="col">FABRICA</th>
                  <th scope="col">MARCA</th>
                  <th scope="col">DESCRIÇÃO</th>
                  <th scope="col">PREÇO</th>
                  <th scope="col">QUANTIDADE</th>
                  <th scope="col">UTILIZACAO</th>
                  <th scope="col" class="text-center">AÇÕES</th>

                </tr>
              </thead>
              <tbody>
              <?php  
              foreach ($dados as $data) { 
                  
                  ?>
              <tr>
            
    <th scope='row' class='text-white h5'><?php echo  $data->codigopublico?></th>
    <td class='text-white h6'><?php echo  $data->itemestoque?></td>
    <td class='text-white h6'><?php echo  $data->fabrica?></td>
    <td class='text-white h6'><?php echo  $data->marca?></td>
    <td class='text-white h6'><?php echo  $data->descricao?> </td>
    <td class='text-white h6 number-input form-price '><?php echo  $data->preco?></td>
    <td class='text-white h6'><?php echo  $data->qtd_solicitada?></td>
    <td class='text-white h6'><?php echo  $data->utilizacao?></td>
    <td class='text-white h6'><button type='button' onclick='deleteitemcesta("<?php echo $data->itemestoque?>","<?php echo $_GET['codigo'] ?>","<?php echo $_SESSION['vendedor']['revenda'] ?>")' class='btn btn-danger  btn-sm m-0'>DELETAR</button></td>
  </tr>
       <?php } ?>      
     
              
              </tbody>
            </table>


            </div>
 
       <div class="col-md-4  ">
                    <!-- Default auto-sizing form -->
         <div class="card ml-1">
              <div class="card-body mb-2">
                      <form>
                    <!-- Grid row -->
                    <div class="form-row align-items-center">
                      
                      <!-- Grid column -->
                      
                        <!-- Default input -->
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                        
                          <input type="text" class="form-control py-0" id="inlineFormInputGroup"  placeholder="informe o codigo do cupom de desconto"><button type="submit" class="btn btn-warning btn-md mt-0">APLICAR CUPOM</button>
                        
                      </div>
                      <!-- Grid column -->

                      <!-- Grid column -->
                      
                        
                      </div>
                    </div>
                    <!-- Grid row -->
                  </form>
                  <!-- Default auto-sizing form -->
                  <div class="card">
                    <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm"><strong>Subtotal</strong></div>
                                <div class="col-sm "><span class="float-right article__content"><?php echo $Cesta->precototal+$Cesta->descontos; ?></span></div>
                                
                              </div>
                            <div class="row mb-5">
                                <div class="col-sm-3">DESCONTOS</div>
                                    <div class="col-sm-3"> <select class="browser-default custom-select">
                                        <option selected>R$:</option>
                                      </select></div>
                                <div class="col-sm-6">  <input class="form-control form-control " value="<?php echo $Cesta->descontos; ?>" type="text" ></div>
                              </div>
                              <hr>
                              <div class="row mb-5">
                              <div class="col-sm"><strong>TOTAL</strong></div>
                                <div class="col-sm "><span class="float-right h5"><?php echo ($Cesta->precototal);  ?>R$</span></div>
                              </div>
                              <div class="row mb-4">
                                <div class="col-sm">
                                <button type="button" class="btn btn-default btn-lg btn-block">CONFIRMAR ORÇAMENTO <i class="fas fa-check"></i></button>
                                </div>
                              </div>
                              <div class="row ">
                                <div class="col-sm">
                                <button type="button" onclick="window.location.href='checkout.php?codigo=<?php echo $_GET['codigo'] ?>'" class="btn btn-info btn-lg btn-block">SEGUIR PARA CHECKOUT <i class="fas fa-sign-out-alt"></i></button>
                                </div>
                              </div>
                        </div>
                        <div class="card-footer text-muted text-center ">
                        <div class="d-inline p-2 " ><img src="../img/elo.png" width="30"></img></div>
                        <div class="d-inline p-2 "> <img src="../img/a.png" width="30"></img></div>
                        <div class="d-inline p-2 "><img src="../img/visa.png" width="30"></img></div>
                        <div class="d-inline p-2 "><img src="../img/mastercard.png" width="30"></img></div>
                
                        </div>
                  </div>
              </div>
            </div>
         
        </div>
        
  </div>
 
</div>

<script src="../js/addons/datatables2.min.js"></script>

      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script type="text/javascript" src="../js/popper.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/mdb.min.js"></script>
      <!-- Plugin file -->
   

    
      <script src="https://cdnjs.com/libraries/jquery.mask"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script> -->
      <script>
        $(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
      </script>
</body>
</html>