<figure class="highcharts-figure">
  <div id="no-selling"></div>
</figure>

<script type="text/javascript">
  Highcharts.chart('no-selling', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie',
      backgroundColor: '#27272a',
      style: {
        color: "white",
      },
    },
    title: {
      text: 'Report selling or no-selling',
      style: {
        color: "white",
      },
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: "white",
            textShadow: false,
          },
        }
      }
    },
    series: [{
      name: 'Brands',
      colorByPoint: true,
      
      data: [{
        name: 'Selling',
        y:2000,
        sliced: true,
        selected: true
      }, {
        name: 'No Selling',
        y: 2000

      
      }]
    }]
  });
</script>