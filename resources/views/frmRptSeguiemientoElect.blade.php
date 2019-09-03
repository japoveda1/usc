@extends('layouts.app')

@section('content')

<div class="page-content">

<!--FILTROS PARA LA CONSULTA -->
@if ($seccion == 0)
<div class="portlet light ">


<div class="portlet-title" >
<div class="caption font-red-sunglo">
   
      <h2 class="caption-subject bold uppercase">{{$strTituloFormulario}}</h2>
  </div>

</div>



    <form action="{{$post}}" method="get" target="_blank">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label  for="selectPresentacionRpe" >Presentacion de reporte: </label>
            <select class="form-control" name='selectPresentacionRpt'>
                  <option value=1>Tabla</option>
                  <option value=2>Grafico</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label  for="selectReporte" >Reporte: </label>
            <select class="form-control" name='selectReporte' id="selectReporte">
                  <option value=1>Tema Relevante</option>
                  <option value=2>Origen de noticia</option>
                  <option value=3>Tipo de recurso</option>
                  <option value=4>Etiquetas</option>
                  <option value=5>Intencion</option>
                  <option value=6>Fuentes</option>
                  <option value=7>Genero Periodistico</option>
                  <option value=8>Tipo de Genero Periodistico</option>
                  <option value=9>Ubicacion</option>
                  <option value=10>Interactividad</option>
                  <option value="11">Candidato</option>
                  <option value="12">Observaciones</option>
                  <option value="13">Links</option>
                  <option value="14">Recursos Adjuntos</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label for="selectEstructura" >Ambito:</label>
            <select class="form-control" name='selectAmbito'>
              @foreach ($ArrayAmbito as $objAmbito)
                  <option value='{{$objAmbito->f11_rowid}}'>{{ $objAmbito->f11_descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label for="selectEstructura" >Tipo de medio :</label>
            <select class="form-control" name='selectEstructura'>
              @foreach ($ArrayEstructura as $objEstructura)
                  <option value='{{$objEstructura->f14_rowid}}'>{{ $objEstructura->f14_descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group {{ $errors->has('selectMedioComunic') ? ' has-error' : '' }}">
            <label for="selectMedioComunic" >Medio Analizado:</label>
            <select class="form-control" name='selectMedioComunic' id="selectMedioComunic">
              @foreach ($ArrayMedioComunicacion as $objMC)
                  <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
              @endforeach
            </select>
            @if ($errors->has('selectMedioComunic'))
                  <span class="help-block" >
                      {{ $errors->first('selectMedioComunic') }}
                  </span>
            @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label  for="selectReporte" >Nombre del Candidato: </label>
            <select class="form-control" name='selectNombreCandit' id="selectNombreCandit">
                  <option value=' '>Todos...</option>
                  @foreach ($ArrayCandidatos as $objCandidatos)
                    <option value='{{$objCandidatos->f15_rowid}}'>{{ $objCandidatos->f15_descripcion}}</option>
                  @endforeach            
            </select>

          </div> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label for="inputFechaDesde">Desde:</label>
              <input type="date" name="inputFechaDesde" class="form-control" id="inputFechaDesde" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label for="inputFechaHasta">Hasta:</label>
              <input type="date" name="inputFechaHasta" class="form-control" id="inputFechaHasta" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
          </div>
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
<h1>CANDIDATOS</h1>

</div>



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
  <h1>CANDIDATOS</h1>

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
var presentacionRpt = {!! json_encode($presentacionRpt)!!};
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
                y:res.f_porcentaje,
                drilldown:res.f_tema_descripcion
              };

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
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Alejandro Eder',
            y: 60,
            sliced: true,
            selected: true
        }, {
            name: 'Oscar Gamboa',
            y: 40
        }, ]
    }]
    });
  }


		</script>







@endsection