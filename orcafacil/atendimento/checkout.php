<?php session_start();
 require '../Class/Checkout.php'; 
 require '../Class/Cesta.php'; 

 $checkout =new Checkout($_SESSION['client']['codclient'], $_SESSION['pedido']);
 ?>

 


<!DOCTYPE html>
<html lang="pt-br">



<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Gerenciais</title>
   
   
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/condicaopgto.css">


          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../css/addons/datatables.min.css">
      
</head>
<body>
  
 <?php 
 require '../../GeneralComponents/Nav.php';
 ?>
          

<div class="m-5">



        <div class="row">
          <div class="col-md-8 "><h1>ENDEREÇO DE ENTREGA</h1>
                    <div class="card">
                            <div class="card-body">
                                <form action="">
                                <div class="row">

                                  <div class="col-md-6">

                                <?php $clienteinfo= $checkout->clientinfo();
                               
                               
                                $clienteinfo= json_decode($clienteinfo[0]);

                               
                                

                                foreach($clienteinfo as $data){
                                ?>
                                
                                <div class='md-form md-outline mb-0'>
            <input name='nome' value='<?php echo "$data->nome_client"?>' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>NOME:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='email' value='<?php echo "$data->email_client"?>' type='email' id='form-first-name' class='form-control'>
            <label for='form-first-name'>E-MAIL:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='email' value='<?php echo "$data->email_pessoal_client"?>' type='email' id='form-first-name' class='form-control'>
            <label for='form-first-name'>E-MAIL:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='endereco' value='<?php echo "$data->endereco_client"?>' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>ENDEREÇO:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='pais' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>PAIS:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='estado' value='<?php echo "$data->uf_client"?>' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>ESTADO:</label>
          </div>
        </div>

        <div class='col-md-6'>
      
          <div class='md-form md-outline mb-0'>
            <input name='telefone' value='<?php echo "$data->telefone_client"?>' type='tel' id='form-first-name' class='form-control'>
            <label for='form-first-name'>TELEFONE:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='bairro' value='<?php echo "$data->bairro_client"?>' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>BAIRRO:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='cidade' value='<?php echo "$data->nome_client"?>' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>CIDADE:</label>
          </div>
          <div class='md-form md-outline mb-0'>
            <input name='cep' value='<?php echo "$data->zip_code_client"?>' type='text' id='form-first-name' class='form-control'>
            <label for='form-first-name'>CEP:</label>
          </div><?php } ?>

                                  </div>
                        
                                      <div class="mt-4 mb-4 ml-4">
                                              <div class="custom-control custom-checkbox">
                                              <input href="#collapseExample" type="checkbox" class="custom-control-input" id="defaultUnchecked" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="collapseExample">
                                              <label class="custom-control-label" for="defaultUnchecked">ENTREGAR EM UM ENDEREÇO DIFERENTE?</label>
                                          </div>    
                                      </div> 

                                  </div>
                              
                                </form>
                            </div>
              </div>
          </div>
          <div class="col-md-4">
                    <div class="card blue-gradient">
                          <div class="card-body contact text-center h-100 white-text">

                            <h3 class="font-weight-bold my-4 pb-2">Produtos</h3>
                            <ul class="text-lg-left list-unstyled ml-4">
                              <?php //var_dump(($_SESSION));
                              $produtos = $checkout->listproducts();
                              $produtos = json_decode($produtos);
                          //   var_dump($produtos);  
                             foreach ($produtos as $produto){      
                                                   
                              ?>
                              <li>
            <p><i class='fas fa-box-open'></i><?php echo $produto->descricao_item ?><span class='float-right'><?php echo $produto->valor_item ?>R$</span></p>
        </li> <?php
        $subtotal += $produto->valor_item;
        $descontos += $produto->desconto_item;
      
      } ?>
                            </ul>
                            <hr class="hr-light my-4">
                            <ul class="ml-4 list-inline text-left list-unstyled">
                                <li>
                                    <p><i class="far fa-list-alt"></i> <strong>Subtotal</strong><span class="float-right"><?php echo $subtotal ?> R$</span></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-truck"></i> <strong>Desconto</strong><span class="float-right"><?php echo $descontos;?> R$</span></p>
                                </li>
                            </ul>
                            <hr class="hr-light my-4">
                            <ul class="ml-4 list-inline text-left list-unstyled">
                                <li>
                                    <p class="h4"><i class="fas fa-dollar-sign"></i> <strong>Total</strong><span class="float-right"><?php echo $checkout->total; ?> R$</span></p>
                                </li>
                              
                            </ul>
                            </div>
                          </div>
                          
              </div>
        </div>
        <div class="row">
          <div class="col-md-8 ">
          <div class="collapse" id="collapseExample">
                          <div class="card mt-3">
                                      <div class="card-body">
                                          <form action="">
                                          <div class="row">

                                            <!--Grid column-->
                                            <div class="col-md-6">

                                              <!-- Material outline input -->
                                              <div class="md-form md-outline mb-0">
                                                <input name="nomenovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">NOME:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="emailnovo" type="email" id="form-first-name" class="form-control">
                                                <label for="form-first-name">E-MAIL:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="endereconovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">ENDEREÇO:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="paisnovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">PAIS:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="estadonovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">ESTADO:</label>
                                              </div>
                                            </div>
                                            <!--Grid column-->
                                            <!--Grid column-->
                                            <div class="col-md-6">
                                              <!-- Material outline input -->
                                              <div class="md-form md-outline mb-0">
                                                <input name="sobrenomenovo" type="text" id="form-last-name" class="form-control">
                                                <label for="form-last-name">SOBRENOME</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="telefonenovo" type="tel" id="form-first-name" class="form-control">
                                                <label for="form-first-name">TELEFONE:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="bairronovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">BAIRRO:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="cidadenovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">CIDADE:</label>
                                              </div>
                                              <div class="md-form md-outline mb-0">
                                                <input name="cepnovo" type="text" id="form-first-name" class="form-control">
                                                <label for="form-first-name">CEP:</label>
                                              </div>
                                            </div>
                                            <!--Grid column-->
                                              

                                            </div>
                                            
                                            <!--Grid row-->
                                  
                                      </div>
                          </div>
                      </div>
          </div>
          <div class="col-md-4"><div class="card info-color  mt-3">
                          <div class="card-body contact text-center h-100 white-text">

                            <h3 class="font-weight-bold my-4 pb-2">PAGAMENTO</h3>
                            <table id="dt-basic-checkbox" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      
      <th class="th-sm"> <i class='fas fa-dollar-sign'> </i>
      </th>
      <th class="th-sm">Condicao
      </th>
      <th class="th-sm">Descricao
      </th>
    
    </tr>
  </thead>
  <tbody>
 <?php $condicoes = $checkout->echocondicoesdisponiveis(); 
 foreach($condicoes as $condicao){
  ?>

 <tr>
    <td><button type='button' class='view_data btn' id='<?php echo $condicao->des_condicao; ?>'  cod='<?php echo $condicao->cod_condicao; ?>' data-dismiss='alert' > Selecionar </button></td>
    <td><?php echo $condicao->cod_condicao; ?></td>
    <td><?php echo $condicao->des_condicao; ?></td>
   
  </tr><?php } ?>
  </tbody>
  <tfoot>
    <tr>
  
      <th class="th-sm"> <i class='fas fa-dollar-sign'> </i>
      </th>
      <th class="th-sm">Condicao
      </th>
      <th class="th-sm">Descricao
      </th>
    </tr>
  </tfoot>
</table>
                            <hr class="hr-light my-4">
                            <ul class=" list-inline text-left list-unstyled">
                                <li>
                                <button type="button" id='oi' class="btn btn-default btn-lg btn-block view_data">FINALIZAR COMPRA</button>

                                </li>
                              
                            </ul>
                          
                            </div>
                          </div></div>
        </div>


</div>







<div class="container">
  <div class="row"><br></div>
  <div class="row">
    <div class="col">
    </div>
    <div class="col-8">
      
      
            <div class="alert alert-danger alert-dismissible fade show" id='redAlert' role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Red Alert</strong> very red.
</div>
      

      <div class="alert alert-warning alert-dismissible fade show" id='wowAlert' role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Very Alert</strong> Much wow.
</div>
      
            <div class="alert alert-info alert-dismissible fade show" id='tempAlert' role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Temp Alert</strong> will be gone soon, don't bother closing me.
</div>
      
    </div>
    <div class="col">
    </div>
  </div>
</div>





<script>
 $('#redAlert').hide();
$('#wowAlert').on('closed.bs.alert', function () {
  console.log('Wow alert closed');
})

$('#tempAlert').on('closed.bs.alert', function () {
  console.log('temp alert closed');
})

window.setTimeout(function() {
    $("#tempAlert").fadeTo(200, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);


window.setTimeout(function() {
   $( "#redAlert" ).fadeIn(1000).slideDown(1000);
}, 4000);


</script>












































<div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="visulUsuarioModalLabel">Confirmar condicoes de Pagamento  </h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="result"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
		












      <script type="text/javascript" src="../js/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
      <script type="text/javascript" src="../js/popper.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/mdb.min.js"></script>
      <!-- Plugin file -->
   

      <script src="../js/addons/datatables.min.js"></script>
      <script src="https://cdnjs.com/libraries/jquery.mask"></script>
      <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" ></script> -->
      <script>
        $(document).ready(function () {
          $('#dtBasicExample').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
      </script>

      <script>	
			$(document).ready(function(){
				$(document).on('click','.view_data', function(){
					var condicao = $(this).attr("id");
          var cod = $(this).attr("cod");
				//	alert(condicao);
					//Verificar se há valor na variável "user_id".
					if(condicao !== '' && cod !==''){
						var dados = {
							condicao: condicao,
              cod: cod
						};
          
					//alert(cod);
					//Verificar se há valor na variável "user_id".
					
          //  console.log(dados)
						$.post('scripts/confirmarcondicoes.php', dados, function(retorna){
							//Carregar o conteúdo para o usuário
							$("#result").html(retorna);
           //   console.log(retorna);
							$('#visulUsuarioModal').modal('show'); 
						});
					}
				});
			});</script>
<script>
  $(document).ready(function() {
    $('#dt-basic-checkbox').dataTable({

   //   buttons: ["selectAll", "selectNone", "copy"],
columnDefs: [{
orderable: false,
//className: 'select-checkbox',
targets:0
}],
select: {
//style: 'multi',
//selector: 'td:first-child'
},
order: [[1, "asc"]]

}
);
    
  });

  </script>


</body>
</html>