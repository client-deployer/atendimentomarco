<?php session_start() ;

require '../Class/Atendimento.php';

$consulta = new Consulta($_POST['codProduto']);
?>
<script src='ajax.js'> </script>
<script src="../DataTables/datatables.js"> </script>
      <link rel="stylesheet" href="../cssMDB/addons/datatables.min.css">
      <link rel="stylesheet" href="../cssMDB/style.css">
          <h3 class='font-semibold text-lg text-white'>Resultados da pesquisa:</h3>
        </div>
      </div>
    </div>
       <div id='datasearch' class="table-responsive">
                  <table id="example"  class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Descricao
              </th>
              <th > Item estoque
              </th>
              <th >Codigo Publico
              </th>
              <th >FABRICA
              </th>
              <th >MARCA  
              </th>
              <th >UTILIZACAO 
              </th>
              <th >PREÇO 
              </th>
              <th > Disponivel
              </th>
               
           
            </tr>
          </thead>
          <tbody id='myTable'>
  <?php
  $dados = $consulta->tableresultconsulta($_SESSION['vendedor']['revenda']);
  $i=0;
  $dados = json_encode($dados);
 $dados = json_decode($dados);
 // var_dump($dados);
//die();
  foreach ($dados as $data) {
  // var_dump($data);
    //die();
     ?>

          <td <?php echo "id='descricao$i'" ?><?php echo " value='$descricao' "; ?>class=''>

            <span class=''><?php echo $data->descricao ?> </span>
          </td>

          <td id='<?php echo $data->itemestoque ?>' class=''><button id="<?php echo $data->itemestoque ?>" type='button' class='btn btn-primary view_relacao' data-toggle='' data-target='.bd-example-modal-lg view_relacao'><?php echo $data->itemestoque; ?></button></td>

          <td id='publico<?php echo $i ?>' class=''>
            <?php echo $data->codigopublico; ?>
          </td>
          <td id='fabrica$i' class=''>
            <?php echo $data->fabrica; ?>
          </td>
          <td id='marca$i' class=''>
            <?php echo $data->marca; ?>
          </td>
          <td id='utilizacao$i' width='15%' class=' '>
            <?php echo $data->utilizacao; ?>
          </td>
          <td id='preco$i' class=''>

         <button id='<?php echo $data->itemestoque; ?>' type='button' class='btn btn-primary view_data' data-toggle='tooltip' title='<?php echo " Preco Custo R1= $data->preco_custo_medio \n
    Preco Reposicao R1= $data->preco_reposicao_r1 \n
      Preco de Custo R2 = " . $data->preco_custo_medio_r2 . " \n
      Preco de Reposicao R2=  $data->preco_reposicao_r2 \n
      Preco de Custo R3 = " . $data->preco_custo_medio_r3 . " \n
      Preco de Reposicao R3= $data->preco_reposicao_r3 \n
      Preco de Custo R4 = " . $data->preco_custo_medio_r4 . " \n
      Preco de Reposicao R4= $data->preco_reposicao_r4 \n'
      
      data-mdb-toggle='modal' data-mdb-target='#exampleModal$i' "; ?> >
      <?php echo $data->precopublico; ?>
       </button> 
     

        </td>
         <td  id=' disponivel<?php echo $i ?>' class=''>
              <button class='btn btn-secondary outline' data-toggle='tooltip' title='  
         Revenda 1 = <?php echo $data->qtd_revenda1  ?> 
         Revenda 2 = <?php echo $data->qtd_revenda2  ?> 
         Revenda 3 =<?php echo $data->qtd_revenda3  ?> 
         Revenda 4 =<?php echo $data->qtd_revenda4 ?> '> <?php echo $data->qtd_somada; ?> </a>


          </td>
  

         


      </tr>
    <?php } ?>
 
          
          </tbody>
          <tfoot>
            <tr>
              <th>Descricao
              </th>
              <th > Item estoque
              </th>
              <th >Codigo Publico
              </th>
              <th >FABRICA
              </th>

              <th >MARCA  
              </th>
              <th >UTILIZACAO 
              </th>

      
              <th >PREÇO 
              </th>
              <th > Disponivel
              </th>
          
              
        
       
            
        
            </tr>
</tfoot>
        </table>
      </section>

      <div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog  modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="visulUsuarioModalLabel">Historico de compras do item</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="visul_usuario"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
    



  
<script type='text/javascript' charset='utf-8'>
$(document).ready(function () {
  
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	// Create search inputs in footer
	$("#example tfoot th").each(function () {
		var title = $(this).text();
		$(this).html('<input type="text" placeholder="Procure por ' + title + '" />');
	});
	// DataTable initialisation
	var table = $("#example").DataTable({
		dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		initComplete: function (settings, json) {
			var footer = $("#example tfoot tr");
			$("#example thead").append(footer);
		}
	});
  $("#example").show();

	// Apply the search
	$("#example thead").on("keyup", "input", function () {
		table.column($(this).parent().index())
		.search(this.value)
		.draw();
	});

   
    


	
        
		$(document).on('click','.view_data', function(){
					var itemestoque = $(this).attr("id");
				//	alert(itemestoque);
					//Verificar se há valor na variável "user_id".
					if(itemestoque !== ''){
						var dados = {
							itemestoque: itemestoque
						};
						$.post('historicodecompras.php', dados, function(retorna){
							//Carregar o conteúdo para o usuário
							$("#visul_usuario").html(retorna);
							$('#visulUsuarioModal').modal('show'); 
						});
					}
				});
		

      $(document).on('click','.view_relacao', function(){
					var itemestoque = $(this).attr("id");
          event.stopPropagation();
				//	alert(itemestoque);
					//Verificar se há valor na variável "user_id".
					if(itemestoque !== ''){
						var dados = {
							itemestoque: itemestoque
						};
          //  alert(itemestoque)
						$.post('modalrelacao.php', dados, function(retorna){
							//Carregar o conteúdo para o usuário
							$("#retorno").html(retorna);
							$('#visul_retorno').modal('show'); 
						});
					}
				});

      });
			

</script>





















  <div id='visul_retorno'class="modal modal-fluid fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="visulUsuarioModalLabel">Item Especificacoes</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
      <div id="retorno">
        
          </div>
        </div>
      </div>
    </div>
  </div>

     