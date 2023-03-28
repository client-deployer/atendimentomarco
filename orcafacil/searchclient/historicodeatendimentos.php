
<?php session_start();?>
<link rel="stylesheet" href="../../cssMDB/modaltable.css">
 <table class="modal-table">
              <thead>
                <tr>
                  <th scope="col">Data do atendimento</th>
                  <th scope="col">N. do atendimento</th>
                  <th scope="col">Nome do vendedor</th>
                  <th scope="col">Revenda</th>
                  <th scope="col">Ação</th>
                </tr>
              </thead>
              <tbody>
<?php

require '../Class/Atendimento.php';

$dados = SearchAtendimentos::GetAtendimentos($_SESSION['client']['codclient']);
$dados = json_decode($dados);

foreach($dados as $data){
?>
     
     
         
                <tr>
                  <td scope="row"><?php echo $data->data_atende; ?></td>
                  <td><?php echo $data->atendimento; ?> </td>
                  <td><?php echo $data->nomeVendedor; ?></td>
                  <td><?php echo $data->revenda; ?></td>
                  <td>
                    <button atendimento="<?php echo $data->atendimento; ?>" type="button" class="btn m-0 btn-primary btn-sm continue-at ">
                      Continuar
                    </button>
                  </td>
                </tr><?php } ?>
              
              </tbody>
            </table>


            
        <script>
          $(document).on('click', '.continue-at', function() {
           
            var atendimento = $(this).attr("atendimento");
       
            //	alert(itemestoque);
            //Verificar se há valor na variável "user_id".
          
              var dados = {
              
                atendimento: atendimento
              };
              $.post('continueorca.php', dados, function(retorna) {
                //Carregar o conteúdo para o usuário
                $("#table").html(retorna);
                $('#attendanceModal').modal('show');

              })
              .done(function() {
                  alert( "second success" );
  })
                    .fail(function() {
                      alert( "error" );
  })
                   .always(function() {
                  alert( 'finished' );
});

    

            });
        </script>