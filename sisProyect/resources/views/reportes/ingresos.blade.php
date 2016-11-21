@extends('layouts.admin')
@section('scripts')
<!--script src="{{asset('js/highcharts/graficas.js')}}"></script-->
@endsection
@section('contenido')

<input type="text" id="fecha" name="fecha" data-date-end-date="0d" />

 <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
/*$(function () {
  // Create the chart
  Highcharts.chart('container1', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Browser market shares. January, 2015 to May, 2015'
      },
      subtitle: {
          text: 'Click the columns to view versions. Source: <a href="http://netmarketshare.com">netmarketshare.com</a>.'
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
                  format: '{point.y:.1f}%'
              }
          }
      },

      tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
      },

      series: [{
          name: 'Brands',
          colorByPoint: true,
          data: [{
              name: 'Microsoft Internet Explorer',
              y: 56.33,
              drilldown: 'Microsoft Internet Explorer'
          }, {
              name: 'Chrome',
              y: 24.03,
              drilldown: 'Chrome'
          }, {
              name: 'Firefox',
              y: 10.38,
              drilldown: 'Firefox'
          }, {
              name: 'Safari',
              y: 4.77,
              drilldown: 'Safari'
          }, {
              name: 'Opera',
              y: 0.91,
              drilldown: 'Opera'
          }, {
              name: 'Proprietary or Undetectable',
              y: 0.2,
              drilldown: null
          }]
      }],
      drilldown: {
          series: [{
              name: 'Microsoft Internet Explorer',
              id: 'Microsoft Internet Explorer',
              data: [
                  [
                      'v11.0',
                      24.13
                  ],
                  [
                      'v8.0',
                      17.2
                  ],
                  [
                      'v9.0',
                      8.11
                  ],
                  [
                      'v10.0',
                      5.33
                  ],
                  [
                      'v6.0',
                      1.06
                  ],
                  [
                      'v7.0',
                      0.5
                  ]
              ]
          }, {
              name: 'Chrome',
              id: 'Chrome',
              data: [
                  [
                      'v40.0',
                      5
                  ],
                  [
                      'v41.0',
                      4.32
                  ],
                  [
                      'v42.0',
                      3.68
                  ],
                  [
                      'v39.0',
                      2.96
                  ],
                  [
                      'v36.0',
                      2.53
                  ],
                  [
                      'v43.0',
                      1.45
                  ],
                  [
                      'v31.0',
                      1.24
                  ],
                  [
                      'v35.0',
                      0.85
                  ],
                  [
                      'v38.0',
                      0.6
                  ],
                  [
                      'v32.0',
                      0.55
                  ],
                  [
                      'v37.0',
                      0.38
                  ],
                  [
                      'v33.0',
                      0.19
                  ],
                  [
                      'v34.0',
                      0.14
                  ],
                  [
                      'v30.0',
                      0.14
                  ]
              ]
          }, {
              name: 'Firefox',
              id: 'Firefox',
              data: [
                  [
                      'v35',
                      2.76
                  ],
                  [
                      'v36',
                      2.32
                  ],
                  [
                      'v37',
                      2.31
                  ],
                  [
                      'v34',
                      1.27
                  ],
                  [
                      'v38',
                      1.02
                  ],
                  [
                      'v31',
                      0.33
                  ],
                  [
                      'v33',
                      0.22
                  ],
                  [
                      'v32',
                      0.15
                  ]
              ]
          }, {
              name: 'Safari',
              id: 'Safari',
              data: [
                  [
                      'v8.0',
                      2.56
                  ],
                  [
                      'v7.1',
                      0.77
                  ],
                  [
                      'v5.1',
                      0.42
                  ],
                  [
                      'v5.0',
                      0.3
                  ],
                  [
                      'v6.1',
                      0.29
                  ],
                  [
                      'v7.0',
                      0.26
                  ],
                  [
                      'v6.2',
                      0.17
                  ]
              ]
          }, {
              name: 'Opera',
              id: 'Opera',
              data: [
                  [
                      'v12.x',
                      0.34
                  ],
                  [
                      'v28',
                      0.24
                  ],
                  [
                      'v27',
                      0.17
                  ],
                  [
                      'v29',
                      0.16
                  ]
              ]
          }]
      }
  });
});*/

var f = {
    // Create the chart
  //Highcharts.chart('container1', {
        chart: {
            renderTo: 'container1',
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: 'Reporte de Ingresos y Ventas según fecha estimada.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Cantidad Total'
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
                    format: 'S/.{point.y:.1f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: S/.<b>{point.y:.2f}</b> Total<br/>'
        },

        series: [{
            name: 'Principal',
            colorByPoint: true,
            data: [{
                name: 'Ingresos',
                y: 0,
                drilldown: 'Ingresos'
            },{
                name: 'Ventas',
                y: 200,
                drilldown: 'Ventas'
            }]
        }
      ],
        drilldown: {
          series: [/*{
            id: 'Ingresos',
            name: 'Años',
            data: [{name:"2013",y:73,drilldown:"2013"},{name:"2016",y:10,drilldown:"2016"}]
          },{id:"2013",name:"2013",data:[{name:"September",y:62,drilldown:"September"},{name:"November",y:11,drilldown:"November_2013"}]},
               {id:"2016",name:"2016",data:[{name:"November",y:10,drilldown:"November"}]},
               {id:"November_2013",name:"November",data:[{name:"Lunes",y:100}]}
            */]
       }
 //   });
};

$(document).ready(function(){
   $("#container1").html("hola");
  var ajax_load_highchart = (function (date){

    $.ajax({
      url: 'ingresos/'+(date?date:"2000-1-1"),
      type:'get',
      beforeSend:function(){

      },
      success:function(response){
        console.log(response);

        var parse = JSON.parse(response);
        var ingreso_total = parse.ingreso_total;
        var ingreso_anios =parse.ingresos_anios;
        var ingresos_meses_por_anio = parse.ingresos_meses_por_anio;
        var ingresos_dias_por_meses = parse.ingresos_dias_por_mes;
        f.series[0].data[0].y = parseInt(ingreso_total);
        f.title.text = "Desde el "+(date?date:"2000")+" hasta el año actual(2016)";
        f.drilldown.series.push({
                id: 'Ingresos',
                name: 'Año',
                data: ingreso_anios

         })
         f.drilldown.series.push({
             id: 'Ventas',
             name: 'Año',
             data: []

          })

          chart = new Highcharts.Chart(f);
          for (var i = 0; i < ingresos_meses_por_anio.length; i++) {
             f.drilldown.series.push(ingresos_meses_por_anio[i]);
          }
          for (var i = 0; i < ingresos_dias_por_meses.length; i++) {
             f.drilldown.series.push(ingresos_dias_por_meses[i]);
          }

      }

    });
  });

   ajax_load_highchart("");

              $('#fecha').datepicker({

              }).on('changeDate',function(ev){

                var d =new Date(Date.parse(ev.date));
                dateString =(d.getFullYear())+"-"+(d.getMonth()+1)+"-"+ d.getDate();
                console.log(dateString);
                ajax_load_highchart(dateString);


             });
          });

</script>

@endsection
