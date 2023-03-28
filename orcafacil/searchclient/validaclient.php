<?php
session_start();
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$url = "10.15.32.11:8000/cliente/$cpf/$nome";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$itens = json_decode(curl_exec($ch));
$dados = json_decode($itens);
if (is_null($itens) or empty($itens)) {
  echo "Voce ainda nao está cadastro, favor entrar em contato com o vendedor";
} else {
  //var_dump($itens);



?>
  <script src='ajax.js'> </script>
  <!-- jQuery Modal -->
  <script>
    function definirclient(cpf, codigo, i) {
      var nome = document.getElementById("descricao" + i);
      var nomenew = nome.getAttribute("value");
      console.log(nomenew)
      console.log(nome)
      $.ajax({
          url: "../src/scripts/definirclient.php",
          type: "POST",
          data: {
            cpfclient: cpf,
            clientname: nomenew,
            codclient: codigo
          },
        })
        .done(function(result) {

          $("#endsearch").html(result);
        })
        .fail(function(jqXHR, textStatus, msg) {
          alert(msg);
        });
    };
  </script>
  <script type="text/javascript" src="jsMdb/jquery.min.js">
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../jsMdb/popper.min.js"></script>
  <script type="text/javascript" src="../jsMdb/bootstrap.min.js"></script>
  <script type="text/javascript" src="../jsMdb/mdb.min.js"></script>
  <!-- Plugin file -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="../cssMDB/bootstrap.min.css">
  <link rel="stylesheet" href="../cssMDB/mdb.min.css">
  <link rel="stylesheet" href="../cssMDB/modaltable.css">
  

  <!-- Plugin file -->
  <link rel="stylesheet" href="../cssMDB/addons/datatables.min.css">
  <table id="dtBasicExample" class="table blue-gradient text-white" width="100%">
    <thead>
      <tr>
        <th class="th-sm">NOME
        </th>
        <th class="th-sm">CPF/CNPJ
        </th>

        <th class="th-sm"> LOGRADOURO
        </th>

        <th class="th-sm">CEP
        </th>
        <th class="th-sm">MUNICIPIO
        </th>

        <th class="th-sm">ESTADO
        </th>

        <th class="th-sm">AÇÃO</th>


      </tr>
    </thead>
    <tbody> <?php

            $i = 0;
            foreach ($dados as $dado) {

            ?>






        <tr>

          <td id='descricao<?php echo $i ?>' value='<?php echo $dado->nome; ?>' class=''>

            <span id='nome<?php echo $i ?>' class=''> <?php echo $dado->nome ?> </span>
          </td>



          <td class=''>
            <?php echo $dado->cpf; ?>
          </td>

          <td class=''>
            <?php echo $dado->logradouro ?>
          </td>
          <td width='15%' class=' '>
            <?php echo $dado->cep ?>
          </td>
          <td class=''>
            <?php echo $dado->municipio ?>


          </td>
          <td>
            <?php echo $dado->estado ?>
          </td>
          <td class=''>
            <button type='button' class='btn btn-primary rounded-lg view_contatos' data-toggle='modal' data-target='#attendanceModal' onclick=definirclient(<?php echo $dado->cpf ?>,<?php echo $dado->codclient ?>,<?php echo $i ?>)>Selecionar</button>
          </td>
        </tr>

    <?php $i++;
            }
          } ?>


    <form action="" class="col s12" method="post">
      <span class="center">

        <button type='submit' onclick="window.location.href='neworssa.php'" class="btn-secondary btn  ">Iniciar Orçamento <i class="fas fa-dollar-sign pt-2"></i></button>
      </span>
    </form>
    <span class="center">

      <button type='submit' onclick="" class="btn btn-default"> Orcamentos Pendentes <i class="fas fa-search-dollar pt-2"></i></button>
    </span>
    <!-- conteudo modal atendimento -->
    <div
      class="modal fade"
      id="attendanceModal"
      tabindex="-1"
      aria-labelledby="attendanceModalLabel"
      aria-hidden="true"
    >
      <div style="max-width: 44.625rem; width: 100%" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="attendanceModalLabel">
              Atendimentos anteriores
            </h5>
            <div class="modal-header-actions">
              <!-- Ícone de adicionar novo arquivo -->
              <label class="modal-new-file">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  fill="currentColor"
                  class="bi bi-file-earmark-plus"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"
                  />
                  <path
                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"
                  />
                </svg>
                <input type="file" />
              </label>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          <div style="overflow: auto" class="modal-body">
            <!-- Tabela -->
<div id='table'></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary rounded-lg">
              Iniciar novo atendimento
            </button>
          </div>
        </div>
      </div>
    </div>


        <!-- finalizei conteudo modal atendimentos -->


        <script>
          $(document).ready(function() {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
          });
        </script>



        <script>
          $(document).on('click', '.view_contatos', function() {
            var itemestoque = $(this).attr("id");
            //	alert(itemestoque);
            //Verificar se há valor na variável "user_id".
            if (itemestoque !== '') {
              var dados = {
                itemestoque: itemestoque
              };
              $.post('historicodeatendimentos.php', dados, function(retorna) {
                //Carregar o conteúdo para o usuário
                $("#table").html(retorna);
                $('#attendanceModal').modal('show');
              });
            }
          });
        </script>