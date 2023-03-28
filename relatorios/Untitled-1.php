<?php
$url = "http://10.15.32.11:8000/graficopizza/1/".str_replace("/","-",$datainicio)."/".str_replace("/","-",$datafim);
  


$dados = receberdadosapi($url);?>

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
      valueSuffix: '%'
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
        format: '{point.name}: {point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Browsers",
      colorByPoint: true,
      data: [

       <?php foreach ($dados as $data){
        $venda= $data[2]+$data[3]+$data[4]+$data[5];
 // $dta= new DateTime($data[1]);
  //var_dump($dta);
 // $dta= date_format($dta,"d-m-Y");

 echo "{
  name: '".$data[1]."',
  y: ".$venda.",
  drilldown: '".$data[0]."'

},";
 } ?>

      
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
        id: "0",
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
      },<?php
      foreach ($dados as $data){
 // $y =$data[1]+$data[2]+$data[3]+$data[4];
  $time= $data[0];
 // $time= date_format($time,"d/m/Y");

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
        id: "0",
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