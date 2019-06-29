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

<!--TABLA FRECUENCIA DE TEMA -->
@elseif($seccion==1)
<div class="portlet light ">

<div class="portlet-title">
    <a  class="btn blue" href="/reporte-prensa-inter/1">
      Filtros
    </a>
  
<br>
<h1>FRECUENCIA DE TEMA</h1>

</div>


  <table class="table table-bordered table-striped table-condensed flip-content">
      <thead class="flip-content">
          <tr>
              <th width="20%">Tipo de medio</th>
              <th>Medio de comunicacion</th>
              <th>Tema</th>
              <th>Frecuencia</th>
              <th>Fecha</th>

          </tr>
      </thead>
      <tbody>
        @foreach($resultado as $res)
        
          <tr>
              <td> {{$res->f_tipo_medio}} </td>
              <td> {{$res->f_medio_descripcion}} </td>
              <td> {{$res->f_tema_descripcion}} </td>
              <td> {{$res->f_frecuencia}} </td>
              <td class="datetime" > {{$res->f_fecha}} </td>
          </tr>
          @endforeach
      </tbody>
  </table>
  <div class="row">
  
      <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                             

  </div>
                          
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

<table class="table table-bordered table-striped table-condensed flip-content">
      <thead class="flip-content">
          <tr>
              <th>Tipo de medio </th>
              <th width="20%">Medio de comunicacion</th>
              <th>Tema mas relevante</th>
              <th>Fecha</th>

          </tr>
      </thead>
      <tbody>
        @foreach($resultado as $res)
        
          <tr>
              <td> {{$res->f_tipo_medio}} </td>
              <td> {{$res->f_medio_descripcion}} </td>
              <td> {{$res->f_tema_descripcion}} </td>
              <td class="datetime" > {{$res->f_fecha}} </td>
          </tr>
          @endforeach
      </tbody>
  </table>
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

var jobs =  {!! json_encode($resultado) !!};

console.log(jobs[0].f_tipo_medio);

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
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
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
		</script>
@endsection