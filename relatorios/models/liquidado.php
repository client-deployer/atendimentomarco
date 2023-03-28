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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdb.min.css">
    <link rel="stylesheet" href="../css/tablehighcharts.css">
    <link rel="stylesheet" href="../css/addons/datatables.min.css">
           
    <script src="../node_modules/highcharts/highcharts.js"></script>
<script src="../node_modules/highcharts/modules/series-label.js"></script>
<script src="../node_modules/highcharts/modules/exporting.js"></script>
<script src="../node_modules/highcharts/modules/export-data.js"></script>
<script src="../node_modules/highcharts/modules/accessibility.js"></script>
<script src="../node_modules/highcharts/highcharts-more.js"></script>
<script src="../node_modules/highcharts/modules/dumbbell.js"></script>
<script src="../node_modules/highcharts/modules/lollipop.js"></script>
<script src="../node_modules/highcharts/modules/drilldown.js"></script>
      
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
          <a class="nav-link" href="relatorios.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
       
      </ul>
      
    </div>
  </nav>
  <?php
   $datainicio = $_GET['datainicio'];
   $datafim = $_GET['datafim'];
 
 global $datainicio ;
 global $datafim ;
  global $revenda ;
  

require 'functions.php';
require '../class/Report.php';

   $iniciointervalo = strtotime($datainicio);$iniciointervalo = date('d/m/Y', $iniciointervalo); $fimintervalo= strtotime($datafim);$fimintervalo = date('d/m/Y', $fimintervalo);  
      
?>

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




 

<div class="m-5"><h1>RELATÓRIO CONTAS A PAGAR (liquidado)  -- REFERENTE À DATA DE <?php echo $iniciointervalo." À ".$fimintervalo ?></h1>
<table id="example" class="display table" style="width:100%">
        <thead class="blue-gradient ">
            <tr>
           
                
              
            
           
                
                <th>Fornecedor</th>
                <th>Conta Contábil</th>
                <th>Valor</th>
                <th> Pago </th>
               
               
                <th>Documento</th>
                <th>Duplicata</th>
                <th>Data Emissão</th>
               
                <th>Vencimento</th>
                <th>Pagamento </th>
                <th> Revenda </th>
                <th> STATUS </th>
            <!--    <th>DT Pagto</th>
                <th>Forma Pagto</th>
                <th>N° Pedido.</th>
                <th> Loja</th> -->
               
     
               
            </tr>
        </thead>
        <tbody>
            
<?php 
  $get = "http://10.15.32.11:8000/contasapagar/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."/1";
 $valor = receberdadosapi($get);

 $relatorio = new Report;
 $liquidado = $relatorio->echoliquidado($valor);



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
              
                <th>Pagamento </th>
                <th>Documento</th>
                <th>Duplicata</th>
                <th>Data Emissão</th>
                <th>Vencimento</th>
               
               
            </tr>

</tfoot>
        
    </table>





</div>


<div class="m-5"><h1>RELATÓRIO CONTAS A PAGAR (liquidado - origem) </h1>
<?php

$url = "http://10.15.32.11:8000/contasapagarorigem/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."/0";

  $get = receberdadosapi($url);

           


            

?>
 


<table id="example2" class="display table" style="width:100%">
        <thead class="blue-gradient ">
            <tr>
           
                
              
            
           
                
   
                <th>Conta Contábil</th>
                <th>Valor</th>
            
               
                <th>% / %ac</th>
               
              
            <!--    <th>DT Pagto</th>
                <th>Forma Pagto</th>
                <th>N° Pedido.</th>
                <th> Loja</th> -->
               
     
               
            </tr>
        </thead>
        <tbody>
            
<?php //$acumulativo =0;
$liquidaorigem =  $relatorio->echoliquidaorigem($get,$_SESSION['vendedor']['revenda'])
  ?>
        
           
                
           
        </tbody>
        <tfoot>
            <tr>
       
        <th>Conta Contábil</th>
                <th>Valor</th>
            
               
                <th>% / %ac</th>
                
</tr>

</tfoot>
        
    </table>





</div>

<div class="mt-2 mr-4 ml-4">
    
    <div class="row">
  <!-- GRAFICO LADO ESQUERDO -->
      <div class="col-lg-6 col-md-6 mb-4 ">
              <div class="card mr-1">
                                      
              <figure class="highcharts-figure ">
              <div id="origem"></div>
             
          </figure>
              </div>
      </div>
  </div>
  </div>



             
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
      <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js">
    </script>
      <script type="text/javascript" src="../js/popper.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="..js/mdb.min.js"></script>
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
    <script>
      $("#example2").hide();
      
      $(document).ready(function () {
        
          //Only needed for the filename of export files.
          //Normally set in the title tag of your page.
          document.title = "Relatorio";
          // Create search inputs in footer
          $("#example2 tfoot th").each(function () {
              var title = $(this).text();
              $(this).html('<input type="text" placeholder="Procure por ' + title + '" />');
          });
          // DataTable initialisation
          var table = $("#example2").DataTable({
            
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
                  var footer = $("#example2 tfoot tr");
                  $("#example2 thead").append(footer);
              }
          });
        $("#example2").show();
      
          // Apply the search
          $("#example2 thead").on("keyup", "input", function () {
              table.column($(this).parent().index())
              .search(this.value)
              .draw();
          });
      });
      
         
          
      
      
          </script>	
          <?php
            $url = "http://10.15.32.11:8000/graficoliquidado/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
 $dados = receberdadosapi($url);
 
 ?>
          <script>
// Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

// Create the chart
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: 'Total por Data - totalizador : <?php echo $acumulativo;?>'
  },
  subtitle: {
    align: 'left',
    text: 'Click nas colunas para visualizar por revenda <a href="" target="_blank">statcounter.com</a>'
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
      text: 'Total'
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
        format: '{point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> <br/>'
  },

  series: [
    {
      name: "Data",
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
      },
      <?php
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
        name: "Firefox",
        id: "Firefox",
        data: [
          [
            "v58.0",
            1.02
          ],
          [
            "v57.0",
            7.36
          ],
          [
            "v56.0",
            0.35
          ],
          [
            "v55.0",
            0.11
          ],
          [
            "v54.0",
            0.1
          ],
          [
            "v52.0",
            0.95
          ],
          [
            "v51.0",
            0.15
          ],
          [
            "v50.0",
            0.1
          ],
          [
            "v48.0",
            0.31
          ],
          [
            "v47.0",
            0.12
          ]
        ]
      },
      {
        name: "Internet Explorer",
        id: "Internet Explorer",
        data: [
          [
            "v11.0",
            6.2
          ],
          [
            "v10.0",
            0.29
          ],
          [
            "v9.0",
            0.27
          ],
          [
            "v8.0",
            0.47
          ]
        ]
      },
      {
        name: "Safari",
        id: "Safari",
        data: [
          [
            "v11.0",
            3.39
          ],
          [
            "v10.1",
            0.96
          ],
          [
            "v10.0",
            0.36
          ],
          [
            "v9.1",
            0.54
          ],
          [
            "v9.0",
            0.13
          ],
          [
            "v5.1",
            0.2
          ]
        ]
      },
      {
        name: "Edge",
        id: "Edge",
        data: [
          [
            "v16",
            2.6
          ],
          [
            "v15",
            0.92
          ],
          [
            "v14",
            0.4
          ],
          [
            "v13",
            0.1
          ]
        ]
      },
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
<?php
 
 
 $url = "http://10.15.32.11:8000/contasapagarorigem/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim)."/0";
 $dados = receberdadosapi($url);



 ?>
         
<script>
  // Create the chart
Highcharts.chart('origem', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: 'Totalizador por Origem - Totalizador : <?php echo $acumulativo;?>'
  },
  subtitle: {
    align: 'left',
    text: 'Clique na coluna para verificar o valor de cada Revenda'
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
      text: 'Valor gasto'
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
        format: '{point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> <br/>'
  },

  series: [
    {
      name: "Origem",
      colorByPoint: true,
      data: [
        <?php
        foreach ($dados as $data){
          $y =$data[2]+$data[3]+$data[4]+$data[5];
          
        // $y= number_format($y);
          $time= $data[0];

       //   $time= date_format($time,"d/m/Y");
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
      },
      <?php
      foreach ($dados as $data){
  $y =$data[2]+$data[3]+$data[4]+$data[5];
  $time= $data[0];
  //$time= date_format($time,"d/m/Y");

  if($data[2]==''){
    $data[2]=0;
  }
  if($data[3]==''){
    $data[3]=0;
  }
  if($data[4]==''){
    $data[4]=0;
  }
  if($data[5]==''){
    $data[5]=0;
  }
//var_dump($data);
  echo " {
    name: '".$time."',
    id: '".$time."',
    data: [
      [
        'Revenda1',
        ".$data[2]."
      ],
      [
        'Revenda2',
        ".$data[3]."

      ],
      [

        'Revenda3',
        ".$data[4]."

      ], [

        'Revenda4',
        ".$data[5]."

      ]

     
    ]
  },";

}?>
      {
        name: "Firefox",
        id: "Firefox",
        data: [
          [
            "v58.0",
            1.02
          ],
          [
            "v57.0",
            7.36
          ],
          [
            "v56.0",
            0.35
          ],
          [
            "v55.0",
            0.11
          ],
          [
            "v54.0",
            0.1
          ],
          [
            "v52.0",
            0.95
          ],
          [
            "v51.0",
            0.15
          ],
          [
            "v50.0",
            0.1
          ],
          [
            "v48.0",
            0.31
          ],
          [
            "v47.0",
            0.12
          ]
        ]
      },
      {
        name: "Internet Explorer",
        id: "Internet Explorer",
        data: [
          [
            "v11.0",
            6.2
          ],
          [
            "v10.0",
            0.29
          ],
          [
            "v9.0",
            0.27
          ],
          [
            "v8.0",
            0.47
          ]
        ]
      },
      {
        name: "Safari",
        id: "Safari",
        data: [
          [
            "v11.0",
            3.39
          ],
          [
            "v10.1",
            0.96
          ],
          [
            "v10.0",
            0.36
          ],
          [
            "v9.1",
            0.54
          ],
          [
            "v9.0",
            0.13
          ],
          [
            "v5.1",
            0.2
          ]
        ]
      },
      {
        name: "Edge",
        id: "Edge",
        data: [
          [
            "v16",
            2.6
          ],
          [
            "v15",
            0.92
          ],
          [
            "v14",
            0.4
          ],
          [
            "v13",
            0.1
          ]
        ]
      },
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