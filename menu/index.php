<?php session_start() ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
   
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style.css">



          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../css/addons/datatables.min.css">
      
</head>
<body>
  
<?php require '../GeneralComponents/Nav.php';?>


  <div class="container my-5">

<!-- Section -->
<section>

  
  <h3 class="font-weight-bold text-center dark-grey-text "><img src="img/logomin.png" alt="Marco Diesel logo" class="img-fluid" width="35"> MARCODIESEL </h3> 
  <h6 class="font-weight-bold text-center ml-5 mr-n5 mt-n3  pb-2 orange-text"><strong>Peças & Serviços </strong></h6>
  
  <p class="lead text-center text-muted pt-2 mb-5">CLIQUE NO SERVIÇO DESEJADO</p>

  <div class="row">


   

  </div>

</section>
<!-- Section -->

</div>
<!-- SLIEDE --------------------------------------------------- -->


<style>
.lista-menu{
  list-style: none;
}
</style>


<div class="container">
<div class="row">
  <ul class=" d-flex justify-content-center flex-wrap">
    <li class='lista-menu'>
      <div class="card text-center card-size lista-menu">
        <div class="card-body view overlay zoom">
          <h4 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="../orcafacil/searchclient/home.php">ATENDIMENTO</a></h4>
          <p class="mt-4 pt-2"><img src="img/estoque.png" alt="" class="img-fluid"></p>
          <p class="text-muted mb-4"><a href="../orcafacil/searchclient/home.php" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
        </div>
      </div>
    </li>
   <li class='lista-menu'>
      <div class="card text-center card-size">
        <div class="card-body view overlay zoom">
          <h4 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="../relatorios/relatorios.php">RELATÓRIOS</a></h4>
          <p class="mt-4 pt-2"><img src="img/reportss.png" alt="" class="img-fluid "></p>
          <p class="text-muted mb-4 mt-2"><a href="../relatorios/relatorios.php" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
        </div>
      </div>
    </li>
   
<li class='lista-menu'>
  <div class="card text-center card-size">
	<div class="card-body view overlay zoom">
	<h4 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="../orcafacil/atendimento/consulta.php">PESQUISA</a></h4>
	  <p class="mt-4 pt-2"><img src="img/search.png" alt="" class="img-fluid"></p>
	  <p class="text-muted mb-4"><a href="../orcafacil/atendimento/consulta.php" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
	</div>
  </div>
</li>
<li class='lista-menu'>
	<div class="card text-center card-size">
	  <div class="card-body view overlay zoom">
		  <h4 class="font-weight-normal my-3 py-2"><a class="dark-grey-text" href="http://10.15.32.11:1451?user=GIULIANO&codUser=44374356215&revenda=1&empresa=1&client=1">CADASTRAR PEÇAS</a></h4>
		   <p class="mt-4 pt-3"><img src="img/pecas.png" alt="" class="img-fluid"></p>
		  <p class="text-muted mb-4"><a href="http://10.15.32.11:1451?user=GIULIANO&codUser=44374356215&revenda=1&empresa=1&client=1" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
	  </div>
	</div>
  </li>
 </div>


<div class='row'>


                                      <li class='lista-menu'>
                                            <div class="card text-center card-size">
                                              <div class="card-body view overlay zoom">
                                                    <h4 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="http://10.15.32.11:1459"> RAIO - X STOCK</a></h4>
                                                    <p class="mt-2 pt-1"><img src="img/saude.png" alt="" class="img-fluid"></p>
                                                    <p class="text-muted mb-4"><a href="http://10.15.32.11:1459" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
                                              </div>
                                            </div>
                                          </li>





                                  <li class='lista-menu'>
							
                                            <div class="card text-center card-size">
                                              <div class="card-body view overlay zoom">
                                              <h4 class="font-weight-normal my-3 py-2 h5 " ><a class="dark-grey-text pb-2" href="#"> DEMONSTRATIVO DE RESULTADOS</a></h4>
                                               <p class="mt-2 pt-1"><img src="img/demonstrativo.png" alt="" class="img-fluid"></p>
                                                     <p class="text-muted mb-n4"><a href="#" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
                                              </div>
                                            
											
                                      </li>
                                       <li class='lista-menu'>
                                            <div class="card text-center card-size">
                                                <div class="card-body view overlay zoom">
                                                <h4 class="font-weight-normal my-4 py-1"><a class="dark-grey-text" href="#"> ENTRADA DE NOTAS FISCAIS</a></h4>
                                                  <p class="mt-n3 pt-2"><img src="img/notas.png" alt="" class="img-fluid"></p>
                                                  <p class="text-muted mb-4"><a href="#" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
                                                </div>
                                             </div>
                                        </li>
                                       <li class='lista-menu'>
                                          <div class="card text-center card-size">
                                            <div class="card-body view overlay zoom">
                                            <h4 class="font-weight-normal my-4 py-1"><a class="dark-grey-text" href="http://10.15.32.11:5555/list"> SOLICITACAO DE COMPRAS</a></h4>
                                              <p class="mt-n3 pt-0"><img src="img/compras.png" alt="" class="img-fluid"></p>
                                              <p class="text-muted mb-4"><a href="http://10.15.32.11:5555/list" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
                                            </div>
                                          </div>
                                        </li>
                                      <li class='lista-menu'>
                                            <div class="card text-center card-size">
                                              <div class="card-body view overlay zoom">
                                              <h4 class="font-weight-normal my-4 py-2"><a class="dark-grey-text" href="#"> PLANEJAMENTO ORÇAMENTARIO</a></h4>
                                                <p class="mt-n3 pt-0"><img src="img/planejamento.png" alt="" class="img-fluid"></p>
                                                <p class="text-muted mb-4"><a href="#" class="btn btn-indigo btn-lg btn-block">ACESSAR</a></p>
                                              </div>
                                            </div>
                                          </li>
                                    </ul>

                                  
                                </div>
  </div>
</div>


































<script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/popper.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- Plugin file -->
     


      <script src="/js/addons/datatables.min.js"></script>
      <script src="https://cdnjs.com/libraries/jquery.mask"></script>
   
      <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    
</body>
</html>