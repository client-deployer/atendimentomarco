<?php session_start();
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Gerenciais</title>
   
   
    <link rel="stylesheet" href="css/style.css">



          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="./css/addons/datatables.min.css">
      
</head>
<body>
  <?php require '../GeneralComponents/Nav.php'; ?>
 



<section class="container card  blue-gradient text-white mt-5">
        
        <form action="selecionarrelatorio.php" method="post">
            
           
            <div class="form-row p-5">
           
           
              <div class="form-group col-md-4">
                <label for="de" class="">DE:</label>
                <input type="date" name="datainicio" class="data-inicio form-control text-dark" id="de" style="color: transparent;">
              </div>
              <div class="form-group col-md-4">
                <label for="ate" class="">ATÉ:</label>
                <input type="date" name="datafim" class="form-control text-dark data-fim" id="ate" style="color: transparent;">

      
  
   

              </div>
             
                
                
           
            </div>
            <div class="mt-2 mb-3 collapse" id="collapseExample" >
                    <div class="card">
                      <div class="card-header lime accent-1" style="color: #000;">
                        SELECIONE OS FILTROS DESEJADOS
                      </div>
                      <div class="card-body">
                            <!-- Material inline 1 -->
                            <div class="form-check form-check-inline">
                                
                              <input type="checkbox" class="form-check-input" name="mapeamento" id="materialInline1">
                              <label class="form-check-label text-dark" for="materialInline1">MAPEAMENTO DO ESTOUE</label>
                            </div>
                            
                            <!-- Material inline 2 -->
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="materialInline2" name="vendaanalitico">
                                <label class="form-check-label text-dark" for="materialInline2">VENDA ANALITICO</label>
                            </div>
                    
                            <!-- Material inline 3 -->
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="contaspagar" id="materialInline3">
                                <label class="form-check-label text-dark" for="materialInline3">CONTAS A PAGAR(EM ABERTO)</label>
                            </div>


                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="liquidado" id="materialInline3">
                                <label class="form-check-label text-dark" for="materialInline3">CONTAS A PAGAR(LIQUIDADO)</label>
                            </div>

                            
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="analise" id="materialInline3">
                                <label class="form-check-label text-dark" for="materialInline3">ANALISE DE VENDAS</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="rastreioItens" id="materialInline3">
                                <label class="form-check-label text-dark" for="materialInline3">RASTREIO ITENS</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" name="rastreioItens2" id="materialInline3">
                                <label class="form-check-label text-dark" for="materialInline3">RASTREIO ITENS 2</label>
                            </div>
                      </div>
                    </div>
               
              </div>
           
             
           
              <div class="container mb-3">
        <div class="row ">
       
        <button type="submit" class="btn btn-rounded  ml-5 indigo float-left waves-effect waves-light"> <i class="fas fa-search fa-lg mr-2"></i>BUSCAR </button>
            <div class="float-right ">
                <a class="btn btn-primary mr-2 waves-effect waves-light collapsed" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                        <path d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"></path>
                      </svg> &nbsp; RELATORIOS
                  </a>
          <!--      <button type="submit" class="btn btn-secondary  " onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/> 
                  </svg>  &nbsp; imprimir relatório </button> -->
                 
            </div>
        </div>
      </div>
            

          </form>
 
      </section>

      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/popper.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- Plugin file -->
   

      <script src="./js/addons/datatables.min.js"></script>
      <script src="https://cdnjs.com/libraries/jquery.mask"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script> -->
      <script>
        $(document).ready(function () {
          $('#dtDynamicVerticalScrollExample').DataTable({
    "scrollY": "50vh",
    "scrollCollapse": true,
  });
  $('#modaltable').DataTable({
    "scrollY": "50vh",
    "scrollCollapse": true,
  });
 
        });
        
      </script>
</body>
</html>