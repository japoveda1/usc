@extends('layouts.app')

@section('content')

<div class="page-content">

<!--TABLA DE TEMA RELEVANTE -->


<div class="portlet light ">
  <div class="portlet-title">
    <a  class="btn blue" href="/reporte-prensa-inter/1">
          Filtros
        </a>
    <br>
    <h1>UBICACION</h1>
  </div>
  @if ($presentacionRpt==1)<!--TABLA -->
      <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th>Tipo de medio </th>
                    <th width="20%">Medio de comunicacion</th>
                    <th>Descripcion</th>
                    <th>Frecuencia</th>
                    <th>Porcentaje %</th>

                </tr>
            </thead>
            <tbody>
              @foreach($resultado as $res)
              
                <tr>
                    <td> {{$res->f_tipo_medio}} </td>
                    <td> {{$res->f_medio_descripcion}} </td>
                    <td> {{$res->f_desc}} </td>
                    <td> {{$res->f_frec}} </td>
                    <td> {{$res->f_porcentaje}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      @endif

      @if ($presentacionRpt==2)<!--GRAFICO-->
      
        <div id="torta" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
      
      @endif

</div>


          
@endsection

@section('scripts')

<script type="text/javascript">


    
var resultado_json =  {!! json_encode($resultado) !!};
var presentacionRpt = {!! json_encode($presentacionRpt)!!};
var ArrayTemas =[];

var ArrayCompuesto =[{medio:"",tema:[""]}];
var ArrayMediosComunic = [];
var series = [];

if( presentacionRpt==2 ){
  grafico_torta();
}

function grafico_torta(){
 //Se recorre el objeto para sacar los difirentes arrays para la grafica 
 resultado_json.forEach(function(res) {
  var series_obj = [];
    series_obj = {
                name:res.f_desc,
                y:res.f_porcentaje,
                drilldown:res.f_desc
              };

    series.push(series_obj);
  });

  Highcharts.chart('torta', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: resultado_json[0].f_medio_descripcion
        },
        subtitle: {
            text:resultado_json[0].f_tipo_medio
                    },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: ' <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}%'
            }
        }
    },
        series: [{
            name: resultado_json[0].f_desc,
            colorByPoint: true,
            data: series
        }]
    });

      
}

		</script>







@endsection