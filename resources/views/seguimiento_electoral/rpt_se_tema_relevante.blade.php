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
    <h1>TEME RELEVANTE</h1>
  </div>
  @if ($presentacionRpt==1)<!--TABLA -->
      <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th>Tipo de medio </th>
                    <th width="20%">Medio de comunicacion</th>
                    <th>Tema mas relevante</th>
                    <th>Cantidad</th>
                    <th>Porcentaje %</th>

                </tr>
            </thead>
            <tbody>
              @foreach($resultado as $res)
              
                <tr>
                    <td> {{$res->f_tipo_medio}} </td>
                    <td> {{$res->f_medio_descripcion}} </td>
                    <td> {{$res->f_tema_descripcion}} </td>
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


function grafico_barra(){

  //Se recorre el objeto para sacar los difirentes arrays para la grafica 
  resultado_json.forEach(function(res) {

  // se obteienene los temas 
  let existe_tema = ArrayTemas.some(elem => elem == res.f_tema_descripcion);
  if (existe_tema == false){
    ArrayTemas.push(res.f_tema_descripcion)
  };

  // se obtienen los medio de comnicacionn 
  let existe_medio = ArrayMediosComunic.some(elem => elem == res.f_medio_descripcion);
  if (existe_medio == false){
    ArrayMediosComunic.push(res.f_medio_descripcion)
  };


  let existe_medio_comp = ArrayCompuesto.some(elem =>elem.medio == res.f_medio_descripcion);

  if (existe_medio == false){

    ItemCompuesto={
      medio:res.f_medio_descripcion,
      temas:[]
    };
    ItemCompuesto.temas.push({tema:res.f_tema_descripcion,frecuencia:Number(res.f_frecuencia)});

    if (ArrayCompuesto[0].medio == ""){
      ArrayCompuesto=[];
      ArrayCompuesto.push(ItemCompuesto);
    }else{
      ArrayCompuesto.push(ItemCompuesto);
    }
  }else{

    ArrayCompuesto.forEach(function(comp){

      if(comp.medio == res.f_medio_descripcion ) {
        let existe_tema_comp = comp.temas.some(elem => elem == res.f_tema_descripcion);
        comp.temas.push({tema:res.f_tema_descripcion,frecuencia:Number(res.f_frecuencia)});
      }
    });
  }
  });


  var obj=[];
  var temp= false
  //por cada medio se recorrre los temas e ingreso la frecuencia si alguno de de los temas  del compuesto  
  ArrayCompuesto.forEach(function(comp){

  var series_obj = [];
  series_obj = {name:comp.medio,data:[]}
  ArrayTemas.forEach(function(tem){
    var temp= false;
    temp = comp.temas.some(elem => elem.tema == tem);

      if(temp == true){
        series_obj.data.push(comp.temas.find(x => x.tema == tem).frecuencia);
      }else{
        series_obj.data.push(0);
      }
  });
  series.push(series_obj);
  console.log("proceso:",obj);
  });
  console.log("final:",series);

  Highcharts.chart('barras', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Frecuencia de Tema '
    },
    subtitle: {
        text: 'Por medio comunicacion'
    },
    xAxis: {
        categories: ArrayTemas,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Frecuencia'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: series
  });

}

function grafico_torta(){
 //Se recorre el objeto para sacar los difirentes arrays para la grafica 
 resultado_json.forEach(function(res) {
  var series_obj = [];
    series_obj = {
                name:res.f_tema_descripcion,
                y:res.f_porcentaje,
                drilldown:res.f_tema_descripcion
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
            name: resultado_json[0].f_medio_descripcion,
            colorByPoint: true,
            data: series
        }]
    });

      
}

		</script>







@endsection