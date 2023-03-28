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
      <!-- Plugin file -->
     
      
</head>
<body>
  
<?php
require 'functions.php';
require '../../GeneralComponents/Nav.php';
require '../class/Report.php';
$relatorio = new Report;
          
 
      
//   var_dump($_POST);

  // var_dump($_GET);
  // die;
  
       $datainicio = $_GET['datainicio'];
       $datafim = $_GET['datafim'];
     
     global $datainicio ;
     global $datafim ;
      global $revenda ;
$iniciointervalo = strtotime($datainicio);$iniciointervalo = date('d/m/Y', $iniciointervalo); $fimintervalo= strtotime($datafim);$fimintervalo = date('d/m/Y', $fimintervalo);  

?>
          

   
   
          <?php
           $url = "http://10.15.32.11:8000/gerenciais/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."";
           $valor =  receberdadosapi($url);
             
        
       ?>
      </section>

      <section class=' '>

        <h1 class=' mt-3 ml-3'>  Mapeamento Estoque:  Dados das revendas </h1>
   <?php echo "<h1> Referente a data de  ".$iniciointervalo." à ".$fimintervalo." </h1>"; ?>

        <table id='example' class='table table-striped table-bordered ' cellspacing='0' width='100%'>

<thead class='blue-gradient'>
   <tr>
   
    <th class='th-sm text-center'>GRUPO
    </th>
	 <th class='th-sm text-center'>CATEGORIA
    </th>
    <th class='th-sm text-center'>FÁBRICA
    </th>
	 <th class='th-sm text-center'>CODIGO PUBLICO
    </th>
    <th class='th-sm'>DESCRIÇÃO DO ITEM
    </th>
    <th class='th-sm'>APLICAÇÃO
    </th>
    <th class='th-sm'>MARCA

    </th>
    <th class='th-sm'>ESTOQUE - TORQ 
    </th>
	 <th class='th-sm'>VENDA - TORQ 
    </th>
    <th class='th-sm'>ESTOQUE - OFIC
    </th>
	 
    <th class='th-sm'>VENDA - OFIC
    </th>
    <th class='th-sm'>ESTOQUE - BOA VISTA
    </th>
	 <th class='th-sm'>VENDA - BOA VISTA
    </th>
    <th class='th-sm'>ESTOQUE - CAMAPUÃ
    </th>
    <th class='th-sm'>VENDA - CAMAPUÃ
    </th>
    <th class='th-sm'>ESTOQUE TOTAL
    </th>
    <th class='th-sm'> VENDAS
    </th>
    <th class='th-sm'>PEDIDOS 
    </th>
   
    <th class=' '>CLASSIFICACAO
    </th>
    
    <th class=' '>CLASS ABC FABRICA
    </th>
  
  </tr>
</thead>
<tbody>

<?php

// escrever table aq


$mapeamento = $relatorio->echomapeamento($valor);
?>
 
</tbody>
<tfoot>   <tr>
 <th class='th-sm text-center'>GRUPO
    </th>
	 <th class='th-sm text-center'>CATEGORIA
    </th>
    <th class='th-sm text-center'>FÁBRICA
    </th>
	<th class='th-sm text-center'>CODIGO PUBLICO
    </th>
    <th class='th-sm'>DESCRIÇÃO DO ITEM
    </th>
    <th class='th-sm'>APLICAÇÃO
    </th>
    <th class='th-sm'>MARCA

    </th>
    <th class='th-sm'>ESTOQUE - TORQ 
    </th>
	 <th class='th-sm'>VENDA - TORQ 
    </th>
    <th class='th-sm'>ESTOQUE - OFIC
    </th>
	 
    <th class='th-sm'>VENDA - OFIC
    </th>
    <th class='th-sm'>ESTOQUE - BOA VISTA
    </th>
	 <th class='th-sm'>VENDA - BOA VISTA
    </th>
    <th class='th-sm'>ESTOQUE - CAMAPUÃ
    </th>
    <th class='th-sm'>VENDA - CAMAPUÃ
    </th>
    <th class='th-sm'>ESTOQUE TOTAL
    </th>
    <th class='th-sm'> VENDAS
    </th>
    <th class='th-sm'>PEDIDOS 
    </th>
   
    <th class=' '>CLASSIFICACAO
    </th>
    
    <th class=' '>CLASS ABC FABRICA
    </th>
  
  </tr>
</tfoot>

</table>

          
      </section>
  
  

     <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
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