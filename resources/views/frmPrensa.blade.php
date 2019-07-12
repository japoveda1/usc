@extends('layouts.app')

@section('content')

        <div class="page-content">

        <div class="portlet light ">

        <div class="portlet-title">
          <div class="caption font-red-sunglo">
              <h2 class="caption-subject bold uppercase">{{$strTituloFormulario}}</h2>
          </div>
        </div>
        @if ($errors->count() > 0 )
        <div class="has-error">
          <span class="help-block" >
                    Por favor validar los campos diligenciados , no se guardan todos los datos al recargar la pagina. 
                    {{$errors}}
          </span>
        </div>

        @endif
        </div>

        <div class="portlet light ">
    <form  action="{{$post}}" method="post" enctype="multipart/form-data">
        @csrf

      <div class="row">
        <div class="col-md-6">
          <div class="form-group  {{ $errors->has('inputCorreo') ? ' has-error' : '' }}">
              <label for="inputCorreo">Correo Analista:</label>
              <input type="email" name="inputCorreo"  value="{{ old('inputCorreo') }}"  class="form-control" id="inputCorreo" aria-describedby="emailHelp" placeholder="Ingrese correo electronico del analista">
              @if ($errors->has('inputCorreo'))
                    <span class="help-block" >
                        {{ $errors->first('inputCorreo') }}
                    </span>
              @endif
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label  for="selectMedioComunic" >Medio Analizado:</label>
            <select class="form-control" name='selectMedioComunic'>
              @foreach ($ArrayMedioComunicacion as $objMC)
                  <option value="{{$objMC->f10_rowid}}" {{ (old("selectMedioComunic") == $objMC->f10_rowid ? "selected":"") }}>{{ $objMC->f10_descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="selectEstructura" >Tipo de medio de Comunicacion:</label>
            <select class="form-control" name='selectEstructura'>
              @foreach ($ArrayEstructura as $objEstructura)
                  <option value='{{$objEstructura->f14_rowid}}' {{ (old("selectEstructura") == $objEstructura->f14_rowid ? "selected":"") }}>{{ $objEstructura->f14_descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="selectNativoDigital" >Nativo Digital</label>
            <select class="form-control" name='selectNativoDigital' >
                  <option value=0 {{ (old("selectNativoDigital") == 0 ? "selected":"") }}>No</option>
                  <option value=1 {{ (old("selectNativoDigital") == 1 ? "selected":"") }}>Si</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group {{ $errors->has('inputFecha') ? ' has-error' : '' }}">
            <label for="inputFecha">Dia Analizado:</label>
            <input type="date" name="inputFecha"  value="{{ old('inputFecha') }}"  class="form-control" id="inputFecha" aria-describedby="fechaHelp" placeholder="Seleccione fecha">
            @if ($errors->has('inputFecha'))
                  <span class="help-block" >
                      {{ $errors->first('inputFecha') }}
                  </span>
            @endif
          </div>
        </div>
      </div>
  </div>
      
  <div class="portlet light ">
      <div class="form-group">
        <div class="row">
          <div class="col-md-9">
            <div class="form-group {{ $errors->has('inputTitularPortada') ? ' has-error' : '' }}">
              <label  for="email">Titular:</label>
              <input type="text" name="inputTitularPortada" class="form-control" id="inputTitularPortada" aria-describedby="emailHelp" placeholder="Ingrese el titular del medio de comunicacion">
              @if ($errors->has('inputTitularPortada'))
                    <span class="help-block" >
                        {{ $errors->first('inputTitularPortada') }}
                    </span>
              @endif
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label  for="selectRelevanteTema" >Tema mas relevante:</label>
              <select class="form-control" name='selectRelevanteTema'>
              @foreach ($ArrayTema as $objTema)
                    <option value='{{$objTema->f12_rowid}}'>{{ $objTema->f12_descripcion}}</option>
                @endforeach
              </select>
            </div>  
          </div>
        </div>





        <div class="form-group">
            <label for="inputLink1">Enlace #1:</label>
            <input type="url" name="inputLink1" class="form-control" id="inputLink1" aria-describedby="inputLink1" placeholder="Enlace de apoyo">
        </div>
        <label  for="selectMedioComunic" >Archivo de portada prensa escrita o digital</label>
        <div class="fileinput fileinput-new" data-provides="fileinput">
          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          <input type="file" name="inputArchivo">
        </div>
      </div>

    </div>
    <div class="portlet light ">
        <div class="form-group">
          <label  for=""> FRECUENCIA DE MENCIONES DE TEMAS EN PORTADA: </label> 
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
            <label  for="observacion">Observación general:</label>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="observacion" rows="3" name="txtAreaObserv"></textarea>
        </div>

        <button type="submit" class="btn green">Guardar</button>
    </form>

  </div>
</div>

          
@endsection
