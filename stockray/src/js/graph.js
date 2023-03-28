Highcharts.chart("lines", {
  title: {
    text: "Solar Employment Growth by Sector, 2010-2016",
  },

  subtitle: {
    text: "Source: thesolarfoundation.com",
  },

  yAxis: {
    title: {
      text: "Number of Employees",
    },
  },

  xAxis: {
    accessibility: {
      rangeDescription: "Range: 2010 to 2017",
    },
  },

  legend: {
    layout: "vertical",
    align: "right",
    verticalAlign: "middle",
  },

  plotOptions: {
    series: {
      label: {
        connectorAllowed: false,
      },
      pointStart: 2010,
    },
  },

  series: [
    {
      name: "Installation",
      data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175],
    },
    {
      name: "Manufacturing",
      data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434],
    },
    {
      name: "Sales & Distribution",
      data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387],
    },
    {
      name: "Project Development",
      data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227],
    },
    {
      name: "Other",
      data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111],
    },
  ],

  responsive: {
    rules: [
      {
        condition: {
          maxWidth: 500,
        },
        chartOptions: {
          legend: {
            layout: "horizontal",
            align: "center",
            verticalAlign: "bottom",
          },
        },
      },
    ],
  },
});

// Radialize the colors
Highcharts.setOptions({
  colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
      radialGradient: {
        cx: 0.5,
        cy: 0.3,
        r: 0.7,
      },
      stops: [
        [0, color],
        [1, Highcharts.color(color).brighten(-0.3).get("rgb")], // darken
      ],
    };
  }),
});

// Build the chart
Highcharts.chart("pie-gradient", {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: "pie",
  },
  title: {
    text: "Browser market shares in January, 2018",
  },
  tooltip: {
    pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>",
  },
  accessibility: {
    point: {
      valueSuffix: "%",
    },
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: "pointer",
      dataLabels: {
        enabled: true,
        format: "<b>{point.name}</b>: {point.percentage:.1f} %",
        connectorColor: "silver",
      },
    },
  },
  series: [
    {
      name: "Share",
      data: [
        { name: "Chrome", y: 61.41 },
        { name: "Internet Explorer", y: 11.84 },
        { name: "Firefox", y: 10.85 },
        { name: "Edge", y: 4.67 },
        { name: "Safari", y: 4.18 },
        { name: "Other", y: 7.05 },
      ],
    },
  ],
});

Highcharts.chart("col-drilldown", {
  chart: {
    type: "column",
  },
  title: {
    align: "left",
    text: "Browser market shares. January, 2018",
  },
  subtitle: {
    align: "left",
    text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>',
  },
  accessibility: {
    announceNewData: {
      enabled: true,
    },
  },
  xAxis: {
    type: "category",
  },
  yAxis: {
    title: {
      text: "Total percent market share",
    },
  },
  legend: {
    enabled: false,
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: "{point.y:.1f}%",
      },
    },
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat:
      '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>',
  },

  series: [
    {
      name: "Browsers",
      colorByPoint: true,
      data: [
        {
          name: "Chrome",
          y: 62.74,
          drilldown: "Chrome",
        },
        {
          name: "Firefox",
          y: 10.57,
          drilldown: "Firefox",
        },
        {
          name: "Internet Explorer",
          y: 7.23,
          drilldown: "Internet Explorer",
        },
        {
          name: "Safari",
          y: 5.58,
          drilldown: "Safari",
        },
        {
          name: "Edge",
          y: 4.02,
          drilldown: "Edge",
        },
        {
          name: "Opera",
          y: 1.92,
          drilldown: "Opera",
        },
        {
          name: "Other",
          y: 7.62,
          drilldown: null,
        },
      ],
    },
  ],
  drilldown: {
    breadcrumbs: {
      position: {
        align: "right",
      },
    },
    series: [
      {
        name: "Chrome",
        id: "Chrome",
        data: [
          ["v65.0", 0.1],
          ["v64.0", 1.3],
          ["v63.0", 53.02],
          ["v62.0", 1.4],
          ["v61.0", 0.88],
          ["v60.0", 0.56],
          ["v59.0", 0.45],
          ["v58.0", 0.49],
          ["v57.0", 0.32],
          ["v56.0", 0.29],
          ["v55.0", 0.79],
          ["v54.0", 0.18],
          ["v51.0", 0.13],
          ["v49.0", 2.16],
          ["v48.0", 0.13],
          ["v47.0", 0.11],
          ["v43.0", 0.17],
          ["v29.0", 0.26],
        ],
      },
      {
        name: "Firefox",
        id: "Firefox",
        data: [
          ["v58.0", 1.02],
          ["v57.0", 7.36],
          ["v56.0", 0.35],
          ["v55.0", 0.11],
          ["v54.0", 0.1],
          ["v52.0", 0.95],
          ["v51.0", 0.15],
          ["v50.0", 0.1],
          ["v48.0", 0.31],
          ["v47.0", 0.12],
        ],
      },
      {
        name: "Internet Explorer",
        id: "Internet Explorer",
        data: [
          ["v11.0", 6.2],
          ["v10.0", 0.29],
          ["v9.0", 0.27],
          ["v8.0", 0.47],
        ],
      },
      {
        name: "Safari",
        id: "Safari",
        data: [
          ["v11.0", 3.39],
          ["v10.1", 0.96],
          ["v10.0", 0.36],
          ["v9.1", 0.54],
          ["v9.0", 0.13],
          ["v5.1", 0.2],
        ],
      },
      {
        name: "Edge",
        id: "Edge",
        data: [
          ["v16", 2.6],
          ["v15", 0.92],
          ["v14", 0.4],
          ["v13", 0.1],
        ],
      },
      {
        name: "Opera",
        id: "Opera",
        data: [
          ["v50.0", 0.96],
          ["v49.0", 0.82],
          ["v12.1", 0.14],
        ],
      },
    ],
  },
});
