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
    <h1>CANDIDATOS</h1>
  </div>
  @if ($presentacionRpt==1)<!--TABLA -->


        <table class="table table-striped table-bordered table-hover order-column" id="sample_2">
            <thead>
                <tr>
                <th>Tipo de medio </th>
                    <th>Medio de comunicacion</th>
                    <th>Candidato</th>
                    <th>Cargo</th>
                    <th>Vistas</th>
                    <th>Me gusta/Like</th>
                    <th>Comentarios</th>
                    <th>Compartido</th>
                    <th>Nivel Interactividad</th>
                </tr>
            </thead>
            <tbody>
            @foreach($resultado as $res)
              <tr>
              <td> {{$res->f_tipo_medio}} </td>
                    <td> {{$res->f_medio_descripcion}} </td>
                    <td> {{$res->f_desc_candidato}} </td>
                    <td> {{$res->f_desc_cargo}} </td>
                    <td> {{$res->f_lo_ve}} </td>
                    <td> {{$res->f_gusta_like}} </td>
                    <td> {{$res->f_comentario}} </td>
                    <td> {{$res->f_compartido}} </td>
                    <td> {{$res->f_nivel_inter}} </td>
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
console.log(resultado_json);

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
                name:res.f_desc_candidato +'('+res.f_desc_cargo+')',
                y:res.f_porcentaje,
                drilldown:res.f_desc_candidato
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