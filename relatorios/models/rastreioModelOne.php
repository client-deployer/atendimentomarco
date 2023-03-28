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
    <link rel="stylesheet" href="../css/tablehighcharts.css">
    <link rel="stylesheet" href="../css/addons/datatables.min.css">
    <script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/mdb.min.js"></script>
<script src="../js/addons/datatables.min.js"></script>
<script src="../https://cdnjs.com/libraries/jquery.mask"></script>
<script src="../node_modules/highcharts/highcharts.js"></script>
<script src="../node_modules/highcharts/modules/series-label.js"></script>
<script src="../node_modules/highcharts/modules/exporting.js"></script>
<script src="../node_modules/highcharts/modules/export-data.js"></script>
<script src="../node_modules/highcharts/modules/accessibility.js"></script>
<script src="../node_modules/highcharts/highcharts-more.js"></script>
<script src="../node_modules/highcharts/modules/dumbbell.js"></script>
<script src="../node_modules/highcharts/modules/lollipop.js"></script>
<script src="../node_modules/highcharts/modules/drilldown.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
      <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
    </script>
      <script type="text/javascript" src="../js/popper.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/mdb.min.js"></script>
     <link rel="stylesheet" href="../css/addons/datatables.min.css"> 
      <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
      <!-- Plugin file -->
      <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"> </script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"> </script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"> </script>
</head>
<body>
<?php require '../../GeneralComponents/Nav.php'; 
require '../class/Report.php';
require 'functions.php';?>
  <?php
   $datainicio = $_GET['datainicio'];
   $datafim = $_GET['datafim'];
 
 global $datainicio ;
 global $datafim ;
  global $revenda ;
  $iniciointervalo = strtotime($datainicio);$iniciointervalo = date('d/m/Y', $iniciointervalo); $fimintervalo= strtotime($datafim);$fimintervalo = date('d/m/Y', $fimintervalo);  


  $url = "http://10.15.32.11:8000/rastreio/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."";
      //     var_dump($url);

  $dados = receberdadosapi($url);

 $relatorio= new Report;


            

?>

 

<div class="m-5"><h1>Rastreio Itens </h1> 
<?php echo "<h1> Referente a data de  ".$iniciointervalo." à ".$fimintervalo." </h1>"

?>
 <table id='example' class='table table-striped table-bordered ' cellspacing='0' width='100%'>
<thead class="blue-gradient ">
  <tr>
    <th>Revenda</th>
    <th>Grupo</th>
    <th>Categoria</th>
    <th>Codigo</th>
    <th>Fabrica</th>
    <th>Descrição</th>
    <th>Marca</th>
    <th>Trans.</th>
    <?php 
    $contador = 0;
    
      foreach ($dados[0] as $chave => $valor) {
        if (substr($chave, 0, 11) === "qtd_vendida") {
            $contador += 1;
          echo "<th>" . str_replace("_", "/", substr($chave, 12)) . "</th>";
        }
      }
    ?>
    <th>disponivel</th>
    <th>qualitativo</th>
  </tr>
</thead>
<tbody>
<?php   foreach ($dados as $item):
 ?>
  <tr>
    <td><?= $item['revenda'] ?></td>
    <td><?= $item['grupo'] ?></td>
    <td><?= $item['categoria'] ?></td>
    <td><?= $item['codigo_item'] ?></td>
    <td><?= $item['codigo_referencia_fabrica'] ?></td>
    <td><?= $item['des_item_estoque'] ?></td>
    <td><?= $item['marca'] ?></td>
    <td><?= $item['tipo_transacao'] ?></td>
    <?php 

    //var_dump($contador);
      $vendido=0;
  
      foreach ($item as $chave => $valor) {
   

        if (substr($chave, 0, 11) === "qtd_vendida") {

          echo "<td>" . $valor . "</td>";

          if ($valor > 0) {
            $vendido++;
          }

        }
      }
    ?>
    <td><?= $item['qtd_disponivel'] ?></td>
    <td><?= ($vendido)."/".$contador ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
         <tfoot>
         <tr>
    <th>Revenda</th>
    <th>Grupo</th>
    <th>Categoria</th>
    <th>Codigo</th>
    <th>Fabrica</th>
    <th>Descrição</th>
    <th>Marca</th>
    <th>Trans.</th>
    <?php 
      foreach ($dados[0] as $chave => $valor) {
        if (substr($chave, 0, 11) === "qtd_vendida") {
          echo "<th>" . str_replace("_", "/", substr($chave, 12)) . "</th>";
        }
      }
    ?>
    <th>disponivel</th>
    <th>Qualitativo</th>
  </tr>
            
            
</tfoot>  
           

        
    </table>





</div>



<script>
       $("#example").hide();
      
$(document).ready(function () {
  
    //Only needed for the filename of export files.
    //Normally set in the title tag of your page.
    document.title = "Relatorio";
    // Create search inputs in footer
    $("#example tfoot th").each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Procure por ' + title + '" />');
    });
    // DataTable initialisation
    var table = $("#example").DataTable({
        dom: '<"dt-buttons"Bf><"clear">lirtp',
        paging: true,
    //  pagingType: 'full_numbers',
        autoWidth: true,
        buttons: [
            "colvis",
            "copyHtml5",
            "csvHtml5",
            "excelHtml5",
            "pdfHtml5",
            "print"
        ],
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
});

   
    


    </script>   
            
          
    

</body>
</html>