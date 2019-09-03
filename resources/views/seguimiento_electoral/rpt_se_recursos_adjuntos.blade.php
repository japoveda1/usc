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
    <h1>RECURSOS ADJUNTOS</h1>
  </div>
  @if ($presentacionRpt==1)<!--TABLA -->

        <table class="table table-striped table-bordered table-hover order-column" id="sample_2">
            <thead>
                <tr>
                  <th>Medio comunicacion</th>
                  <th>Tipo medio comunicacion</th>
                  <th>Titulo</th>
                  <th>Nombre de archivo</th>
                  <th>Fecha</th>
                  <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($resultado as $res)
              <tr>
                  <td> {{$res->f_medio_descripcion}} </td>
                  <td> {{$res->f_tipo_medio}} </td>
                  <td> {{$res->f_desc}} </td>
                  <td> {{$res->f_titulo}} </td>
                  <td> {{$res->f_fecha}} </td>
                  <td><a class="btn blue" href="/descargar-recurso/{{$res->f_desc}}">Descargar</a></td>

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