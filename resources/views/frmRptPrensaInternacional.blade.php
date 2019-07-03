@extends('layouts.app')

@section('content')

<div class="page-content">

<!--FILTROS PARA LA CONSULTA -->
@if ($seccion == 0)
<div class="portlet light ">


<div class="portlet-title">
<div class="caption font-red-sunglo">
      <h2 class="caption-subject bold uppercase">Reporte</h2>
  </div>

</div>
    <form action="/consultar" method="get" target="_blank">
        
        <div class="row">
          <div class="form-group col-md-4">
            <label class ="caption-subject bold uppercase" for="selectPresentacionRpe" >Presentacion de reporte: </label>
            <select class="form-control" name='selectPresentacionRpt'>
                  <option value=1>Tabla</option>
                  <option value=2>Grafico</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label class ="caption-subject bold uppercase" for="selectReporte" >Reporte: </label>
            <select class="form-control" name='selectReporte'>
                  <option value=1>Frecuencia de Tema</option>
                  <option value=2>Tema Relevante</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-4">
            <label class ="caption-subject bold uppercase" for="selectMedioComunic" >Medio Analisado:</label>
            <select class="form-control" name='selectMedioComunic'>
              <option value=''>Seleccionar ...</option>
              @foreach ($ArrayMedioComunicacion as $objMC)
                  <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-4">
            <label class ="caption-subject bold uppercase" for="selectEstructura" >Tipo de medio:</label>
            <select class="form-control" name='selectEstructura'>
                  <option value=''>Seleccionar ...</option>
              @foreach ($ArrayEstructura as $objEstructura)
                  <option value='{{$objEstructura->f14_rowid}}'>{{ $objEstructura->f14_descripcion}}</option>
              @endforeach
            </select>
          </div>      
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label class ="caption-subject bold uppercase" for="" >Observacion: </label>
            <input  type="checkbox" name="checkObservacion" >
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-4">
              <label class ="caption-subject bold uppercase" for="inputFechaDesde">Desde:</label>
              <input type="date" name="inputFechaDesde" class="form-control" id="inputFechaDesde" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
              <label class ="caption-subject bold uppercase" for="inputFechaHasta">Hasta:</label>
              <input type="date" name="inputFechaHasta" class="form-control" id="inputFechaHasta" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
          </div>
        </div>
    

        <input class="btn green" type="submit" value="Consultar">
    </form>

  </div>

<!--FRECUENCIA DE TEMA -->
@elseif($seccion==1)
<div class="portlet light ">

<div class="portlet-title">
    <a  class="btn blue" href="/reporte-prensa-inter/1">
      Filtros
    </a>
  
<br>
<h1>FRECUENCIA DE TEMA</h1>

</div>

@if ($presentacionRpt==1)
<!--TABLA FRECUENCIA DE TEMA -->
<table class="table table-bordered table-striped table-condensed flip-content">
      <thead class="flip-content">
          <tr>
              <th width="20%">Tipo de medio</th>
              <th>Medio de comunicacion</th>
              <th>Tema</th>
              <th>Frecuencia</th>

          </tr>
      </thead>
      <tbody>
        @foreach($resultado as $res)
        
          <tr>
              <td> {{$res->f_tipo_medio}} </td>
              <td> {{$res->f_medio_descripcion}} </td>
              <td> {{$res->f_tema_descripcion}} </td>
              <td> {{$res->f_frecuencia}} </td>
          </tr>

        @endforeach
      </tbody>
  </table>
@endif

@if($presentacionRpt==2)
<!--GRAFICO DE TEMA -->
<div class="row">
  <div id="barras" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
  <div id="torta" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
</div>
@endif
            



              
</div>


<!--TABLA DE TEMA RELEVANTE -->
@elseif($seccion==2)

<div class="portlet light ">
  <div class="portlet-title">
  <a  class="btn blue" href="/reporte-prensa-inter/1">
        Filtros
      </a>
  <br>
  <h1>TEMA RELEVANTE</h1>

  </div>
  @if ($presentacionRpt==1)
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
                <td> {{$res->f_cantidad}} </td>
                <td> {{$res->f_porcentaje}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  @endif

  @if ($presentacionRpt==2)
  <div id="torta" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
  @endif

</div>


<!--TABLA OBSERVACIONES -->
@elseif($seccion==3)

<div class="portlet light ">

<div class="portlet-title">
  <a  class="btn blue" href="/reporte-prensa-inter/1">
        Filtros
      </a>
  <br>
  <h1>OBSERVACIONES </h1>
</div>

    <table class="table table-bordered table-striped table-condensed flip-content">
          <thead class="flip-content">
              <tr>
                  <th width="20%">Medio de comunicacion</th>
                  <th>Observacion</th>
                  <th>Fecha</th>
                  <th>Correo Analista</th>

              </tr>
          </thead>
          <tbody>
            @foreach($resultado as $res)
            
              <tr>
                  <td> {{$res->f_medio_descripcion}} </td>
                  <td> {{$res->f_observacion}} </td>
                  <td class="datetime"> {{$res->f_fecha}} </td>
                  <td> {{$res->f_correo}} </td>
              </tr>
              @endforeach
          </tbody>
      </table>
</div>
@endif



</div>


          
@endsection

@section('scripts')

<script type="text/javascript">

var resultado_json =  {!! json_encode($resultado) !!};
var seccion = {!! json_encode($seccion)!!};
var presentacionRpt ={!! json_encode($presentacionRpt)!!};
var ArrayTemas =[];

var ArrayCompuesto =[{medio:"",tema:[""]}];
var ArrayMediosComunic = [];
var series = [];

if(seccion== 1  && presentacionRpt==2 ){
  grafico_barra();
}

if(seccion== 2  && presentacionRpt==2){
  grafico_torta()
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
                y:res.f_porcentaje
              };

    series.push(series_obj);
  });




  ArrayTemas.forEach(function(tem){
    var series_obj = [];
    series_obj = {
                name:tema,
                y:0
              }

    series.push(series_obj);
  });
 


    // Build the chart
  Highcharts.chart('torta', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares in January, 2018'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
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