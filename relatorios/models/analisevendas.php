



<?php session_start();
  require 'functions.php';
  require '../class/Report.php';
?>
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
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"> </script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"> </script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"> </script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"> </script>
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
<body class="blue-grey lighten-3">
 <?php require '../../GeneralComponents/Nav.php';
  ?>
  <div class="ml-4 mr-4 my-2 py-2 ">
  <?php
$url = "http://10.15.32.11:8000/infogeral/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
$dados = receberdadosapi($url);
$dados = lerinfogeral($dados);
//$dados = json_decode($dados);
$relatorio = new Report;

?>
<!-- Section: Block Content -->
<section class="">

  <!--Grid row-->
  <div class="card mb-2">
  <div class="card-body"><?php $iniciointervalo = strtotime($datainicio);$iniciointervalo = date('d/m/Y', $iniciointervalo); $fimintervalo= strtotime($datafim);$fimintervalo = date('d/m/Y', $fimintervalo);  ?>
  <h1 class="title h2 ">PAINEL DE VENDAS     --  <?php echo ($iniciointervalo." à ".$fimintervalo)   ?> </h1> 
  </div>
</div>
  <?php require_once '../../GeneralComponents/cardsadmin.php';?>
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
	
<!-- GRAFICO LADO DIREITO -->
    <div class="col-lg-6 col-md-6  ">
        <div class="card"><h1 class="title h4 p-2 ">Vendas por forma de pagamento</h1>
        <figure class="highcharts-figure">
  <div id="pizzapagamento"></div>
  <p class="highcharts-description">
   <!-- Pie chart where the individual slices can be clicked to expose more
    detailed data. -->
  </p>
</figure>
        </div>
    </div>
  </div>
</div>
<div class="mt-2 mr-4 ml-4">
  <div class="row">
<!-- GRAFICO LADO ESQUERDO -->
    <div class="col-lg-6 col-md-6 mb-4 ">
            <div class="card mr-1">
            <div id="linhavendedor"></div>
            </div>
    </div>

<!-- GRAFICO LADO ESQUERDO -->
    <div class="col-lg-6 col-md-6 mb-4 ">
            <div class="card mr-1">
        <!-- <h1> Gráfico Consolidado vendas </H1> -->
	<?php
$url = "http://10.15.32.11:8000/grafico_revenda_consolidado/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
$request = receberdadosapi($url);	
$dados = graficoconsolidadovendas($request);
$dados = json_encode($dados);
$objeto=json_decode($dados);
$vendas = $objeto->totals;
//var_dump($vendas);
$devolucoes= $objeto->devolucoes;
//var_dump($devolucoes);
?>
<figure class="highcharts-figure">
  <div id="consolidadoVendas"></div>
  <p class="highcharts-description">
 Consolidado Vendas
  </p>
</figure>
            </div>
			
    </div>
	</div>
	<script>
	
	Highcharts.chart('consolidadoVendas', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'consolidado vendas'
  },
  xAxis: {
    categories: [
      'Revenda - 1',
      'Revenda -2',
      'Revenda -3',
      'Revenda -4'
    ]
  },
  yAxis: [{
    min: 0,
    title: {
      text: 'Vendas'
    }
  }, {
    title: {
      text: 'Profit (millions)'
    },
    opposite: true
  }],
  legend: {
    shadow: false
  },
  tooltip: {
    shared: true
  },
  plotOptions: {
    column: {
      grouping: false,
      shadow: false,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Vendas',
    color: 'rgba(165,170,217,1)',
    data: [<?php  echo $vendas->$r1.",".$vendas->$r2.",".$vendas->$r3.",".$vendas->$r4; ?>],
    pointPadding: 0.3,
    pointPlacement: -0.2
  }, {
    name: 'Devolucoes',
    color: 'rgba(126,86,134,.9)',
    data: [<?php  echo $devolucoes->$r1.",".$devolucoes->$r2.",".$devolucoes->$r3.",".$devolucoes->$r4; ?>],
   
    pointPadding: 0.4,
    pointPlacement: -0.2
  } ]
});
	</script>
<?php
$url = "http://10.15.32.11:8000/listavendedores/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
$get = receberdadosapi($url); 
?>
<!-- TABELA DE DADOS -->
<div class="card m-4 p-4"><h1 class="title h2 ">Tabela de Análise de Vendas</h1>
            <table id="dt-vertical-scroll" class="table pt-4" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th class="th-sm">Revenda
                </th>
                <th class="th-sm">DOC.
                </th>
                <th class="th-sm">N° NF
                </th>
                <th class="th-sm">Cliente
                </th>
                <th class="th-sm">Vendedor
                </th>
                <th class="th-sm">Form. Pagto
                </th>
                <th class="th-sm">Total bruto
                </th>
                <th class="th-sm">Impostos
                </th>
                <th class="th-sm">L. Bruto R$
                </th>
                <th class="th-sm">% L. Bruto
                </th>
                </tr>
            </thead>
            <tbody>
              <?php
         $tablevendedores = $relatorio->echotablevendedores($get);
                ?>
            </tbody>
            </table>
</div>
<div class="m-4">
    <div class="row">
      </div>
      <!-- FIMM -->
</div>

      <script>
        $(document).ready(function () {
  $('#dt-vertical-scroll').dataTable({
    dom: '<"dt-buttons"Bf><"clear">lirtp',
    "paging": false,
    buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
    "fnInitComplete": function () {
      var myCustomScrollbar = document.querySelector('#dt-vertical-scroll_wrapper .dataTables_scrollBody');
      var ps = new PerfectScrollbar(myCustomScrollbar);
    },
    "scrollY": 450,
  });
});<?php
$url = "http://10.15.32.11:8000/grafico/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
$dados = receberdadosapi($url);?>
// DADOS GRAFICO DA ESQUERDA
        Highcharts.chart('container', {
title: {
    text: 'Somatório diário por venda'
},
yAxis: {
    title: {
        text: 'Somatório diário por venda'
    }
},
xAxis: {
  //  accessibility: {
   //     rangeDescription: 'Range: 01 to 31'
   // }
   categories: [<?php  
   $chartvenda= $relatorio->somatoriodiariovendadata($dados);

?>]
},
legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},
//plotOptions: {
   // series: {
      //  label: {
       //     connectorAllowed: false
     //   },
      //  pointStart: 01
   // }
//},
// fazer um group by e 4 foreachs cada um rodando uma casa do array sem precisar enviar pra api dnv
series: [{
    name: 'MATRIZ - 01',
    data: [<?php  
    $r1=$relatorio->somatoriodiariorevenda($dados,1)
?>]
},



{
    name: 'OFICINA - 02',
    data: [<?php  
 $r2 = $relatorio->somatoriodiariorevenda($dados,2)?>]
},



{
  name: 'BOA VISTA - 03',
    data: [<?php 
    $r2 = $relatorio->somatoriodiariorevenda($dados,3)?> ]
},


{
  name: 'CAMAPUÃ - 04',
    data: [<?php  
    $r2 = $relatorio->somatoriodiariorevenda($dados,4)?>]
}],
responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}
});
</script>
<?php
$url = "http://10.15.32.11:8000/vendedorcomissao/3/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);;
$dados = receberdadosapi($url);
?>
<script>




</script>









<script>
Highcharts.chart('linhavendedor', {
chart: {
  type: 'lollipop',
  inverted: true
},
legend: {
  enabled: false
},
subtitle: {
  text: 'Referente a data solicitada'
},
title: {
  text: 'Venda por vendedor '
},
tooltip: {
  shared: true
},
xAxis: {
  type: 'category',
  title: {
    text: 'Nome Vendedor'
  }

},
yAxis: {
  title: {
    text: 'Valor de Venda'
  }
},
series: [{
  name: 'Valor de venda',
  data: [{
 
    
    name: '',
    low: 0
  },   <?php
$linhavendedor = $relatorio->graficolinhavendedor($dados);
?>
  {
    name: '',
    low: 0
 
  }]
}]

});
      </script>
      <?php
$url = "http://10.15.32.11:8000/graficopizza/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
$dados = receberdadosapi($url);
?>

      <script>
        // Create the chart
Highcharts.chart('pizzapagamento', {
  chart: {
    type: 'pie'
  },
  title: {
    text: 'Total por forma de pagamento'
  },
  subtitle: {
    text: 'Clique e visualize detalhamento por revenda'
  },

  accessibility: {
    announceNewData: {
      enabled: true
    },
    point: {
      valueSuffix: 'R$'
    }
  },

  plotOptions: {  
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      dataLabels: {
      //  enabled: false
      },
      showInLegend: true
    },
    
    series: {
      dataLabels: {
        enabled: true,
        format: '{point.name}: R${point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>R${point.y:.2f}</b> do total<br/>'
  },

  series: [
    {
      name: "Condicao",
      colorByPoint: true,
      data: [

       <?php $condicoes = $relatorio->condicoes($dados); ?>

      
        {
          name: "Other",
          y: 0,
          drilldown: null
        }
      ]
    }
  ],
 
  drilldown: {
    series: [
     
     
      {
        name: "Firefox",
        id: "00",
        data: [
          [
            "v96.0",
            4.17
          ],
          [
            "v95.0",
            3.33
          ],
          [
            "v94.0",
            0.11
          ],
          [
            "v91.0",
            0.23
          ],
          [
            "v78.0",
            0.16
          ],
          [
            "v52.0",
            0.15
          ]
        ]
      },
      <?php
      $valorescondicoes = $relatorio->valorescondicoes($dados);
  ?>
      {
        name: "Firefox",
        id: "00",
        data: [
          [
            "v96.0",
            4.17
          ],
          [
            "v95.0",
            3.33
          ],
          [
            "v94.0",
            0.11
          ],
          [
            "v91.0",
            0.23
          ],
          [
            "v78.0",
            0.16
          ],
          [
            "v52.0",
            0.15
          ]
        ]
    
      }
    ]
  }
});

        </script>
   
</body>
</html>