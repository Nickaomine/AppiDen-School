var options = {
  chart: {
    height: 280,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false
    },
    zoom: {
      enabled: true
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '30%',
    },
  },
  dataLabels: {
    enabled: true
  },
  series: [{
    name: 'vehicules',
    data: [44, 55, 41, 67, 22, 43, 21, 33, 49, 15, 26, 55]
  },{
    name: 'personnels',
    data: [13, 23, 20, 8, 13, 27, 36, 22, 54, 28, 31, 26]
  },{
    name: 'department',
    data: [10, 55, 41, 67, 22, 43, 21, 33, 49, 15, 26, 55]
  },{
    name: 'services',
    data: [42, 55, 41, 67, 22, 43, 21, 33, 49, 15, 26, 55]
  
  }],
  xaxis: {
    type: 'month',
    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
  },
  legend: {
    offsetY: -7
  },
  fill: {
    opacity: 1
  },
  colors: ['#01902d', '#666666','#000653','#000000'],
  tooltip: {
    y: {
      formatter: function(val) {
        return  "enregistrer " + val + "k"  }
    }
  },
}
var chart = new ApexCharts(
  document.querySelector("#visitors"),
  options
);
chart.render();


