<figure class="highcharts-figure">
  <div id="cover"></div>
</figure>
<?php 
//require 'testegraficocover.php';?>
<script type="text/javascript">
  Highcharts.chart('cover', {

    title: {
      text: 'Giro vs Sem Giro (Analytics)',
      style: {
        color: "black",
      },
    },

    subtitle: {
      text: 'Source: Monthly reports',
      style: {
        color: "black",
      },
    },

    yAxis: {
      title: {
        text: 'Total Value',
        style: {
          color: "Red",
        },
      },
    },

    xAxis: {
      accessibility: {
        rangeDescription: 'Range: 01 to 12'
      },
      style: {
          color: "black",
        },
    },

    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      itemStyle: {
        color: "black",
      }
    },

    plotOptions: {
      series: {
        dataLabels: {
          color: "black",
        },
        label: {
          connectorAllowed: false,
        },
        pointStart: 01,
      },
    },

    series: [{
      name: 'SELLING',
      data:[0,10]
,
    }, {
      name: 'No Selling',
      data:[0,10],
      colors: '#FF7F00'
    }],

    chart: {
      backgroundColor: "white",
    },

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
            style: {
              color: "white",
            },
          }
        }
      }]
    }

  });
</script>