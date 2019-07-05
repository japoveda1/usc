@extends('layouts.app')

@section('content')

<div class="page-content">

<div class="portlet light ">

<div class="portlet-title">
  <div class="caption font-red-sunglo">
      <h2 class="caption-subject bold uppercase">{{$strTituloFormulario}}</h2>
  </div>


</div>
    <form action="{{$post}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group  {{ $errors->has('inputCorreo') ? ' has-error' : '' }}">
            
            <label class ="caption-subject bold uppercase" for="inputCorreo">Correo Analista:</label>
            <input type="email" name="inputCorreo" class="form-control" id="inputCorreo" aria-describedby="emailHelp" placeholder="Ingrese correo electronico del analista">
        
            @if ($errors->has('inputCorreo'))
                  <span class="help-block" >
                      {{ $errors->first('inputCorreo') }}
                  </span>
            @endif
        </div>

        <div class="form-group">
          <label class ="caption-subject bold uppercase" for="selectMedioComunic" >Medio Analisado:</label>
          <select class="form-control" name='selectMedioComunic'>
            @foreach ($ArrayMedioComunicacion as $objMC)
                <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
            @endforeach
          </select>
        </div>

        <div class="row">


        <div class="form-group col-md-4">
          <label class ="caption-subject bold uppercase" for="selectEstructura" >Estructura:</label>
          <select class="form-control" name='selectEstructura'>
            @foreach ($ArrayEstructura as $objEstructura)
                <option value='{{$objEstructura->f14_rowid}}'>{{ $objEstructura->f14_descripcion}}</option>
            @endforeach
          </select>
        </div>
      
        </div>
<div class="row">


        <div class="form-group col-md-4 ">
          <label class ="caption-subject bold uppercase" for="selectNativoDigital" >Nativo Digital</label>
          <select class="form-control" name='selectNativoDigital'>
                <option value=0>No</option>
                <option value=1>Si</option>
          </select>
        </div>
        </div>

      <div class="row">

        <div class="form-group col-md-4 {{ $errors->has('inputCorreo') ? ' has-error' : '' }}">
            <label class ="caption-subject bold uppercase" for="inputFecha">Dia Analizado:</label>
            <input type="date" name="inputFecha" class="form-control" id="inputFecha" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
            @if ($errors->has('inputFecha'))
                  <span class="help-block" >
                      {{ $errors->first('inputFecha') }}
                  </span>
            @endif
        </div>

      </div>
      

        <div class="form-group">
          @yield('checkbox')
        </div>
        <div class="form-group">
            
            <label for="inputLink1">Link 1:</label>
            <input type="url" name="inputLink1" class="form-control" id="inputLink1" aria-describedby="inputLink1" placeholder="Enlace de apoyo">
        
        </div>
  
        <div class="form-group {{ $errors->has('inputCorreo') ? ' has-error' : '' }}">
            <label class ="caption-subject bold uppercase" for="email">Titular:</label>
            <input type="text" name="inputTitularPortada" class="form-control" id="inputTitularPortada" aria-describedby="emailHelp" placeholder="Ingrese el titular del medio de comunicacion">
            @if ($errors->has('inputTitularPortada'))
                  <span class="help-block" >
                      {{ $errors->first('inputTitularPortada') }}
                  </span>
            @endif
        </div>
        <div class="form-group">
        <label class ="caption-subject bold uppercase" for=""> FRECUENCIA DE MENCIONES DE TEMAS EN PORTADA: </label> 
        </div>
  
        @foreach ($ArrayTema as $objTema)
          
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="descripcionTema">{{$objTema->f12_descripcion}}</label>
            </div>
            <div class="col-md-1">
              <select class="form-control" name='selectTema{{$objTema->f12_rowid}}'>
                  <option value=0>0</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
                  <option value=6>6</option>
                  <option value=7>7</option>
                  <option value=8>8</option>
              </select>
            </div>
         

          </div>

         </div>
        @endforeach    
        

        <div class="form-group">
          <label class ="caption-subject bold uppercase" for="selectRelevanteTema" >Tema mas relevante:</label>
          <select class="form-control" name='selectRelevanteTema'>
          @foreach ($ArrayTema as $objTema)
                <option value='{{$objTema->f12_rowid}}'>{{ $objTema->f12_descripcion}}</option>
            @endforeach
          </select>
        </div>  



        <div class="form-group">
            <label class ="caption-subject bold uppercase"  for="observacion">Observación general</label>
            <textarea class="form-control" id="observacion" rows="3" name="txtAreaObserv"></textarea>
        </div>

        <button type="submit" class="btn green">Guardar</button>
    </form>

  </div>
</div>

          
@endsection
