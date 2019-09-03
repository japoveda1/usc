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
    <h1>OBSERVACIONES</h1>
  </div>
  @if ($presentacionRpt==1)<!--TABLA -->

        <table class="table table-striped table-bordered table-hover order-column" id="sample_2">
            <thead>
                <tr>
                  <th>Medio de comunicacion</th>
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
      @endif

      @if ($presentacionRpt==2)<!--GRAFICO-->
      
       <h2>ESTE REPORTE NO PRESENTA GRAFICA</h2>
      
      @endif

</div>


          
@endsection

@section('scripts')

<script type="text/javascript">




		</script>







@endsection