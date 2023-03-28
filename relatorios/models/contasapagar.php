<?php
function setarcores($condicao){
  if ($condicao == 201){
    echo '#006400';
  }if ($condicao=='204'){
    echo '#3CB371';
  }
  
  if ($condicao== '228' or $condicao== '229' or $condicao== '230' or $condicao== '231' or $condicao== '237'  or $condicao== '245' or $condicao== '264' or $condicao== '302' or $condicao== '303' or $condicao== '307' or $condicao== '232' or $condicao== '241' or $condicao== '300' or $condicao== '305' or $condicao == '235' or $condicao=='265' or $condicao=='240' or $condicao== '203' or $condicao== '256'or $condicao== '302' or $condicao== '244' or $condicao== '228' or $condicao== '263' or $condicao== '242' or $condicao== '306' or $condicao== '233'){


    echo '#FF8800';
  }
  if ($condicao>370 and $condicao<377){
    echo '#20B2AA';

  }
  if ($condicao == 902){
      echo '#FF0000';
  }
  if ($condicao== 238){
      echo '#FF00FF';
  }
 
}


 function receberdadosapi($url){ 

 // $url = "http://10.15.32.11:8000/gerenciais/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."";

      //     var_dump($url);
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           $valor =  json_decode(curl_exec($ch), true);
           return $valor;

 }




?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Gerenciais</title>
    <style>
      .highcharts-table-caption {
    margin-bottom: 5px;
    font-family: sans-serif;
    font-size: 14pt;
}

.highcharts-data-table table {
    border-collapse: collapse;
    border-spacing: 0;
    background: white;
    min-width: 100%;
    margin-top: 10px;
}

.highcharts-data-table td,
.highcharts-data-table th {
    text-align: center;
    font-family: sans-serif;
    font-size: 10pt;
    border: 1px solid silver;
    padding: 0.5em;
}

.highcharts-data-table tr:nth-child(even),
.highcharts-data-table thead tr {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #eff;
}

</style>
   
   
    <link rel="stylesheet" href="css/style.css">



          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/mdb.min.css">
      <!-- Plugin file -->
      <link rel="stylesheet" href="../css/addons/datatables.min.css">
      
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-dark indigo" >
  <a class="navbar-brand" href="#">
    <img src="img/logo.jpg" height="30" alt="mdb logo">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../relatorios.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      
    </div>
  </nav>
  <div class="mt-2 mr-4 ml-4">
    
  <div class="row">
<!-- GRAFICO LADO ESQUERDO -->
    <div class="col-lg-6 col-md-6 mb-4 ">
            <div class="card mr-1">
                                    
            <figure class="highcharts-figure ">
            <div id="container"></div>
           
        </figure>
            </div>
    </div>
</div>
</div>

  <?php
   function percent ($primeiraconta,$totalizador){
    $total = ($primeiraconta/$totalizador)*100;
    $total = round($total,2);
    return $total;}
    function escolherrevenda($revenda){
      switch ($revenda) {
        case 1:
            $revenda= "MATRIZ - 1";
            break;
        case 2:
          $revenda= "OFICINA - 2";
          break;
        case 3:
          $revenda= "BOA-VISTA - 3";
          break;
            case 4:
              $revenda= "CAMAPUA - 4";
              break;
    }
    return $revenda;
  }

   $datainicio = $_GET['datainicio'];
   $datafim = $_GET['datafim'];
 
 global $datainicio ;
 global $datafim ;
  global $revenda ;
  

  $url = "http://10.15.32.11:8000/contasapagar/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."/0";
      //     var_dump($url);
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           $valor =  json_decode(curl_exec($ch), true);
        //   var_dump($valor);
           


       $iniciointervalo = strtotime($datainicio);$iniciointervalo = date('d/m/Y', $iniciointervalo); $fimintervalo= strtotime($datafim);$fimintervalo = date('d/m/Y', $fimintervalo);  
      

?>
 

<div class="m-5"><h1>RELATÓRIO CONTAS A PAGAR -- REFERENTE À DATA DE <?php echo $iniciointervalo." À ".$fimintervalo ?></h1>
<table id="example" class="display table" style="width:100%">
        <thead class="blue-gradient ">
            <tr>
           
                
                <th>Fornecedor</th>
                <th>Conta Contábil</th>
                <th>Valor</th>
                <th> Saldo </th>
               
                <th>% / %ac</th>
                <th>Documento</th>
                <th>Duplicata</th>
                <th>Data Emissão</th>
                <th>Vencimento</th>
                <th> Revenda </th>
                <th> STATUS </th>
            <!--    <th>DT Pagto</th>
                <th>Forma Pagto</th>
                <th>N° Pedido.</th>
                <th> Loja</th> -->
               
            </tr>
        </thead>
        <tbody>
            
<?php $acumulativo =0;
$pcac=0;

foreach ($valor as $val){
 //var_dump($val);
 // die;
 
   
    $codcliente = $val[0];
    $nomecliente= $val[1];

    $empresa=$val[2];
    $contagemtitulos = $val[3];
    $revenda = $val[4];
    $planocontrato= $val[5];
    $titulo= $val[6];
    $duplicata=$val[7];
    $valtitulo=$val[8];
    $valpagtong=$val[9];
    $valdescontong=$val[10];
    $tipo=$val[11];
    $autorizapagamento = $val[12];
    $valmultang=$val[13];
    $nossonumero = $val[14];
    $dvnossonumero = $val[15];
    $revendacompromisso = $val[16];
      $dataemissao= new DateTime($val[17]);
      $dataemissao= date_format($dataemissao,"d/m/Y");
      $dtadevencimento= new DateTime($val[18]);
      $dtadevencimento= date_format($dtadevencimento,"d/m/Y");
      $status= $val[19];
      $departamento=$val[20];
      $origem=$val[21];
      $desorigem=$val[22];
      $banco=$val[23];
      $enviado = $val[24];
      $historico = $val[25];
      $tipolancamento = $val[26];
      $bancoremessa = $val[27];
      $saldo = $val[28];
      $total = $val[29];
     
     $revenda= escolherrevenda($revenda);
      




      if ($status == 'EM'){
        $acumulativo += $valtitulo;
        $pcrel = percent($valtitulo, $total);
        $pcac += $pcrel;
        $valtitulo = number_format($valtitulo,2,",",".");
        $pcrel = number_format($pcrel,2,",",".");


    //  var_dump($dataemissao);
     // $dataemissao= strtotime($dataemissao);
    

     // $dataemissao1 = DateTime::createFromFormat("d-m-Y", $dataemissao);
      //var_dump($dataemissao1);
     // $dataemissao1= 
//     $tipotransacao= $val[13];
//     $codfiscal= $val[14];
//     $vendedor=  $val[15];
//     $classabc=$val[16];
//     $marca = $val[17];
//     $quantidade= $val[18];
//     $valtotalnota= $val[19];
//     $customedio=$val[20];

   // $rentabilidade =$itempelaquantidade 
 
  echo "
  <tr > 
  
 
    <td class='text-center'>".$nomecliente."</td>
    <td class='text-center' > ".$desorigem ."</td>
    <td class='text-center' >".$valtitulo." </td>
    <td class='text-center' >".$valtitulo." </td>
   
    <td class='text-center' >".$pcrel."%</td>
    <td class='text-center' >".$titulo."</td>
    <td class='text-center' >".$duplicata."/".$contagemtitulos. "</td>
    <td class='text-center' >".$dataemissao."</td>
    <td class='text-center' >".$dtadevencimento."</td>
    <td class='text-center'>".$revenda."</td>
    <td class='text-center'>".$status."</td>
  
   

   
  </tr>";}else
  {

    $acumulativo += $saldo;
    $pcrel = percent($saldo, $total);
    $pcac += $pcrel;
    $saldo = number_format($saldo,2,",",".");
    $valtitulo = number_format($valtitulo,2,",",".");
    $pcrel = number_format($pcrel,2,",",".");

    echo "
    <tr > 
 
      <td class='text-center'>".$nomecliente."</td>
      <td class='text-center' > ".$desorigem ."</td>
      <td class='text-center' >".$valtitulo." </td>
      <td class='text-center' >".$saldo." </td>
    
      <td class='text-center' >".$pcrel."%</td>
  
      <td class='text-center' >".$titulo."</td>
      <td class='text-center' >".$duplicata."/".$contagemtitulos. "</td>
      <td class='text-center' >".$dataemissao."</td>
      <td class='text-center' >".$dtadevencimento."</td>
      <td class='text-center'>".$revenda."</td>
      <td class='text-center'>".$status."</td>
  
      
      </tr>";
    

  }
  
}
$total = number_format($total,2,",",".");
$cem =  number_format(100,2,",",".");
echo "
    <tr > 
 
    <td class='text-center' > total</td>
      <td class='text-center' > total</td>
      <td class='text-center' >".$total." </td>
      <td class='text-center' >".$total." </td>
    
      <td class='text-center' > ".$cem."%</td>
      <td class='text-center' > total</td>
      <td class='text-center' > total</td>

      <td class='text-center' > ".$dataemissao."</td>

   
      
      <td class='text-center' > ".$dtadevencimento."</td>
      
      <td class='text-center' > MATRIZ - 1</td>
      
      <td class='text-center' > EM</td>

  
      
      </tr>";
  ?>
        
           
                
           
        </tbody>
        <tfoot>
        <tr>
        <th> STATUS </th>
        <th> Revenda </th>
                <th>Fornecedor</th>
                <th>Conta Contábil</th>
                <th>Valor</th>
                <th> Saldo </th>
              
                <th>% / %ac</th>
                <th>Documento</th>
                <th>Duplicata</th>
                <th>Data Emissão</th>
                <th>Vencimento</th>
               
               
            </tr>

</tfoot>
        
    </table>





</div>
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
    
    <script src="../node_modules/highcharts/highcharts.js"></script>
<script src="../node_modules/highcharts/modules/series-label.js"></script>
<script src="../node_modules/highcharts/modules/exporting.js"></script>
<script src="../node_modules/highcharts/modules/export-data.js"></script>
<script src="../node_modules/highcharts/modules/accessibility.js"></script>
<script src="../node_modules/highcharts/highcharts-more.js"></script>
<script src="../node_modules/highcharts/modules/dumbbell.js"></script>
<script src="../node_modules/highcharts/modules/lollipop.js"></script>
<script src="../node_modules/highcharts/modules/drilldown.js"></script>

  <script>
    <?php

$url = "http://10.15.32.11:8000/graficocontasapagar/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);

$dados = receberdadosapi($url);?>


// DADOS GRAFICO DA ESQUERDA

// Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: 'Contas a Pagar. (TOTAL GERAL <?php echo $total; ?> )'
  },
  subtitle: {
    align: 'left',
    text: 'Clique nas colunas para detalhamento por revenda '
  },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total percent market share'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: 'R${point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>R${point.y:.2f}</b> <br/>'
  },

  series: [
    {
      name: "Total do dia",
      colorByPoint: true,
      data: [
        <?php
        foreach ($dados as $data){
          $y =$data[1]+$data[2]+$data[3]+$data[4];
          
        // $y= number_format($y);
          $time= new DateTime($data[0]);
          $time= date_format($time,"d/m/Y");
//var_dump($data);
  echo "{
  name: '".$time."',
  y: ".$y.",
  drilldown: '".$time."'

},";

}?>
      
        {
          name: "Other",
          y: null,
          drilldown: null
        }
      ]
    }
  ],
  drilldown: {
    breadcrumbs: {
      position: {
        align: 'right'
      }
    },
    series: [
      {
        name: "Chrome",
        id: "Chrome",
        data: [
          [
            "v65.0",
            0.1
          ]
         
        ]
      },<?php
      foreach ($dados as $data){
  $y =$data[1]+$data[2]+$data[3]+$data[4];
  $time= new DateTime($data[0]);
  $time= date_format($time,"d/m/Y");

  if($data[1]==''){
    $data[1]=0;
  }
  if($data[2]==''){
    $data[2]=0;
  }
  if($data[3]==''){
    $data[3]=0;
  }
  if($data[4]==''){
    $data[4]=0;
  }
//var_dump($data);
  echo " {
    name: '".$time."',
    id: '".$time."',
    data: [
      [
        'Revenda1',
        ".$data[1]."
      ],
      [
        'Revenda2',
        ".$data[2]."

      ],
      [

        'Revenda3',
        ".$data[3]."

      ], [

        'Revenda4',
        ".$data[4]."

      ]

     
    ]
  },";

}?>
    
      {
        name: "Opera",
        id: "Opera",
        data: [
          [
            "v50.0",
            0.96
          ],
          [
            "v49.0",
            0.82
          ],
          [
            "v12.1",
            0.14
          ]
        ]
      }
    ]
  }
});

    </script>
            
          
</body>
</html>