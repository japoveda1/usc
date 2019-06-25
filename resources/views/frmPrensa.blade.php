@extends('layouts.app')

@section('content')

<div class="page-content">

<div class="portlet light ">
  <div class="caption font-red-sunglo">
      <h2 class="caption-subject bold uppercase">{{$strTituloFormulario}}</h2>
  </div>

<div class="portlet-title">

</div>
    <form action="{{$post}}" method="post">
        @csrf
        <div class="form-group">
            <label for="inputCorre">Correo Analista:</label>
            <input type="email" name="inputCorreo" class="form-control" id="inputCorreo" aria-describedby="emailHelp" placeholder="Ingrese correo electronico del analista">
        </div>

        <div class="form-group">
          <label for="selectMedioComunic" >Medio Analisado:</label>
          <select class="form-control" name='selectMedioComunic'>
            @foreach ($ArrayMedioComunicacion as $objMC)
                <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="selectEstructura" >Estructura:</label>
          <select class="form-control" name='selectEstructura'>
            @foreach ($ArrayMedioComunicacion as $objMC)
                <option value='{{$objMC->f10_rowid}}'>{{ $objMC->f10_descripcion}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="selectNativoDigital" >Nativo Digital</label>
          <select class="form-control" name='selectMedioComunic'>
                <option value=0>No</option>
                <option value=1>Si</option>
          </select>
        </div>



        <div class="form-group">
            <label for="inputFecha">Dia Analizado:</label>
            <input type="date" name="inputFecha" class="form-control" id="inputFecha" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
        </div>

        <div>
          @yield('checkbox')
        </div>
  
        <div class="form-group">
            <label for="email">Titular:</label>
            <input type="text" name="inputTitularPortada" class="form-control" id="inputTitularPortada" aria-describedby="emailHelp" placeholder="Ingrese el titular del medio de comunicacion">
        </div>
        <div class="form-group">
        <label for=""> Titulares relacionados con el tema: </label> 
        </div>
  
        @foreach ($ArrayTema as $objTema)
          
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label for="descripcionTema">{{$objTema->f12_descripcion}}</label>
            </div>
            <div class="col-md-1">
              <select class="form-control" name='selectTema+{{$objTema->f12_rowid}}'>
                  <option value=0>0</option>
                  <option value=1>1</option>
                  <option value=1>2</option>
                  <option value=1>3</option>
                  <option value=1>4</option>
                  <option value=1>5</option>
              </select>
            </div>
         

          </div>

         </div>
        @endforeach    
        
        @foreach ($ArrayTema as $objTema)
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="checkTema+{{$objTema->f12_rowid}}"  id="{{$objTema->f12_rowid}}">
          <label class="form-check-label" for=" {{$objTema->f12_descripcion}}">
          {{$objTema->f12_descripcion}}
          </label>
        </div>
        @endforeach    



        <div class="form-group">
            <label for="observacion">Observación general</label>
            <textarea class="form-control" id="observacion" rows="3" name="observacion"></textarea>
        </div>

        <input type="submit" value="Guardar">
    </form>

  </div>
</div>

          
@endsection
