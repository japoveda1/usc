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
                
      </span>
    </div>
    @endif
  </div>

    <div class="portlet light ">
    <form  action="{{$post}}" method="post" enctype="multipart/form-data">
        @csrf

        <input name="IntAmbito" type="hidden" value="{{$IntAmbito}}">
        <input name="IntEstructura" type="hidden" value="{{ $IntEstructura}}">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group  {{ $errors->has('inputCorreo') ? ' has-error' : '' }}">
              <label for="inputCorreo" class="control-label" >Correo Analista:</label>
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
            <label  for="selectMedioComunic" class="control-label" >Medio Analizado:</label>
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
            <label for="selectEstructura" class="control-label" >Tipo de medio de comunicacion:</label>
            <select class="form-control" name='selectEstructura'>
              @foreach ($ArrayEstructura as $objEstructura)
                  <option value='{{$objEstructura->f14_rowid}}' {{ (old("selectEstructura") == $objEstructura->f14_rowid ? "selected":"") }}>{{ $objEstructura->f14_descripcion}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="selectNativoDigital" class="control-label" >Nativo Digital</label>
            <select class="form-control" name='selectNativoDigital' >
                  <option value=0 {{ (old("selectNativoDigital") == 0 ? "selected":"") }}>No</option>
                  <option value=1 {{ (old("selectNativoDigital") == 1 ? "selected":"") }}>Si</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group {{ $errors->has('inputFecha') ? ' has-error' : '' }}">
            <label for="inputFecha" class="control-label">Dia Analizado:</label>
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
    <div class="row">
      <div class="col-md-4">
        <div class="form-group {{ $errors->has('txtAreaTitular') ? ' has-error' : '' }}">
            <label   for="observacion" class="control-label">Titular:</label>
            <textarea class="form-control" id="txtAreaTitular" rows="2" name="txtAreaTitular" >{{ old('txtAreaTitular') }}</textarea>
            @if ($errors->has('txtAreaTitular'))
                  <span class="help-block" >
                      {{ $errors->first('txtAreaTitular') }}
                  </span>
            @endif
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="selecTipoRecurso" class="control-label" >Tipo de recurso:</label>
          <select class="form-control" name='selecTipoRecurso'>

          @foreach ($ArrayTipoRecurso as $objTipoRec)
                <option value='{{$objTipoRec->f19_rowid}}' {{ (old("selecTipoRecurso") == $objTipoRec->f19_rowid ? "selected":"") }}>{{ $objTipoRec->f19_descripcion}}</option>
          @endforeach
          </select>
        </div>
      </div>    

        <div class="col-md-3">
          <div class="form-group">
            <label  for="selectUbicacion" class="control-label" >Ubicacion</label>
            <select class="form-control" name='selectUbicacion' id="selectUbicacion">

              @foreach ($ArrayUbicacionMc as $objUbicacion)
                <option value='{{$objUbicacion->f13_rowid}}' {{ (old("selectUbicacion") == $objUbicacion->f13_rowid ? "selected":"") }}>{{ $objUbicacion->f13_descripcion}}</option>
              @endforeach

                 <!-- <option value=1 {{ (old("selectUbicacion") == 1 ? "selected":"") }}>Titular o Portada</option>
                  <option value=2 {{ (old("selectUbicacion") == 2 ? "selected":"") }}>Titular o Portada  + continuidad en el interior</option>
                  <option value=3 {{ (old("selectUbicacion") == 3 ? "selected":"") }}>Interior</option> -->

            </select>
          </div>
        </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="selectRelevanteTema" >Tema relevante:</label>
          <select class="form-control" name='selectRelevanteTema'>
          @foreach ($ArrayTema as $objTema)
                <option value='{{$objTema->f12_rowid}}' {{ (old("selectRelevanteTema") == $objTema->f12_rowid ? "selected":"") }}>{{ $objTema->f12_descripcion}}</option>
            @endforeach
          </select>
        </div> 
      </div>
    </div>
      <div class="row">
        
          
            <div class="col-md-9">
              <div class="form-group {{ $errors->has('inputTitularInterno1') ? ' has-error' : '' }}">
                  <label class="control-label" for="inputTitularInterno1">Titular interno #1</label>
                  <input type="text" title="Nombre del titular al interior del medio de comunicacion"  
                  placeholder="Ingrese el nombre del titular al interior del medio de comunicacion" 
                  class="form-control" name="inputTitularInterno1" id="inputTitularInterno1"/>
                  @if ($errors->has('inputTitularInterno1'))
                    <span class="help-block" >
                        {{ $errors->first('inputTitularInterno1') }}
                    </span>
              @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                  <label class="control-label">Tipo de recurso #1</label>
                  <select class="form-control" name='selecTipoRecurso1' id="selecTipoRecurso1" >
                  <option value="0">No tiene ...</option>
                  @foreach ($ArrayTipoRecurso as $objTipoRec)
                        <option value='{{$objTipoRec->f19_rowid}}' {{ (old("selecTipoRecurso1") == $objTipoRec->f19_rowid ? "selected":"") }}>{{ $objTipoRec->f19_descripcion}}</option>
                  @endforeach
                  </select>
              </div>
            </div>
        
      </div>
      
      <div class="row" id="rowTitulares2">
      <br>
        <div class="form-group">
          <div class="col-md-8">
              <label class="control-label">Titular interno #2</label>
              <input type="text" title="Nombre del titular al interior del medio de comunicacion"  placeholder="Ingrese el nombre del titular al interior del medio de comunicacion" class="form-control" name="inputTitularInterno2" id="inputTitularInterno2"/>
          </div>
          <div class="col-md-3">
              <label class="control-label">Tipo de recurso #2</label>
              <select class="form-control" name='selecTipoRecurso2' id="selecTipoRecurso2" >
                <option value="0">No tiene ... </option>
              @foreach ($ArrayTipoRecurso as $objTipoRec)
                    <option value='{{$objTipoRec->f19_rowid}}'  {{ (old("selecTipoRecurso2") == $objTipoRec->f19_rowid ? "selected":"") }}>{{ $objTipoRec->f19_descripcion}}</option>
              @endforeach
              </select>
          </div>
          <div class="col-md-1">
            <a  class="btn btn-danger " id="btnDelTitInter2">
                    <i class="fa fa-close"></i>
            </a>
          </div>
        </div>
      
    </div> 
 
    <div class="row" id="rowTitulares3">
    <br>
        <div class="form-group">
          <div class="col-md-8">
              <label class="control-label">Titular interno #3</label>
              <input type="text" title="Nombre del titular al interior del medio de comunicacion" placeholder="Ingrese el nombre del titular al interior del medio de comunicacion" class="form-control" name="inputTitularInterno3" id="inputTitularInterno3"/>
          </div>
          <div class="col-md-3">
              <label class="control-label">Tipo de recurso #3</label>
              <select class="form-control" name='selecTipoRecurso3' id="selecTipoRecurso3" >
              <option value="0">No tiene ... </option>
              @foreach ($ArrayTipoRecurso as $objTipoRec)
                    <option value='{{$objTipoRec->f19_rowid}}' {{ (old("selecTipoRecurso3") == $objTipoRec->f19_rowid ? "selected":"") }}>{{ $objTipoRec->f19_descripcion}}</option>
              @endforeach
              </select>
          </div>
          <div class="col-md-1">
            <a  class="btn btn-danger " id="btnDelTitInter3">
                    <i class="fa fa-close"></i>
            </a>
          </div>
        </div>
      
    </div>  
     
      <div class="row">
      <br>
        <div class="col-md-12">
        <a class="btn btn-info mt-repeater-add" id="btnAddTitInter">
                  <i class="fa fa-plus"></i> Agregar Titular interno</a>
        </div>

      </div>

      
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
              <label for="selectMedioComunic" >Archivo de portada prensa escrita o digital</label>
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <input type="file" name="inputArchivo" value="{{old('inputArchivo')}}">
              </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="form-group">
            <div class="col-md-12">
                <label class="control-label">Enlace #1</label>
                <input type="text" title="Enlace de apoyo que direcciona al medio analizado"  
                placeholder="Ingrese enlace de apoyo que direcciona al medio analizado" 
                class="form-control" name="inputEnlace" id="inputEnlace" value="{{old('inputEnlace')}}"/>
            </div>
          </div>
      </div>
      <div class="row" id="rowEnlace2">
      <br>
          <div class="form-group">
            <div class="col-md-11">
                <label class="control-label">Enlace #2</label>
                <input type="text" title="Enlace de apoyo que direcciona al medio analizado"  
                placeholder="Ingrese enlace de apoyo que direcciona al medio analizado" 
                class="form-control" name="inputEnlace2" id="inputEnlace2" value="{{old('inputEnlace2')}}"/>
            </div>
            <div class="col-md-1">
            <a  class="btn btn-danger" id="btnDelEnlace2">
                    <i class="fa fa-close"></i>
            </a>
          </div>
          </div>
      </div>
      <div class="row" id="rowEnlace3">
        <br>
          <div class="form-group">
            <div class="col-md-11">
                <label class="control-label">Enlace #3</label>
                <input type="text" title="Enlace de apoyo que direcciona al medio analizado"  
                placeholder="Ingrese enlace de apoyo que direcciona al medio analizado" 
                class="form-control" name="inputEnlace3" id="inputEnlace3" value="{{old('inputEnlace3')}}"/>
            </div>
            <div class="col-md-1">
            <a  class="btn btn-danger " id="btnDelEnlace3">
                    <i class="fa fa-close"></i>
            </a>
          </div>
          </div>
      </div>
      <div class="row" id="rowEnlace4">
      <br>
          <div class="form-group">
            <div class="col-md-11">
                <label class="control-label">Enlace #4</label>
                <input type="text" title="Enlace de apoyo que direcciona al medio analizado"  
                placeholder="Ingrese enlace de apoyo que direcciona al medio analizado" 
                class="form-control" name="inputEnlace4" id="inputEnlace4" value="{{old('inputEnlace4')}}"/>
            </div>
            <div class="col-md-1">
            <a  class="btn btn-danger " id="btnDelEnlace4">
                    <i class="fa fa-close"></i>
            </a>
          </div>
          </div>
      </div>
      <div class="row" id="rowEnlace5">
      <br>
          <div class="form-group">
            <div class="col-md-11">
                <label class="control-label">Enlace #5</label>
                <input type="text" title="Enlace de apoyo que direcciona al medio analizado"  
                placeholder="Ingrese enlace de apoyo que direcciona al medio analizado" 
                class="form-control" name="inputEnlace5" id="inputEnlace5" value="{{old('inputEnlace5')}}"/>
            </div>
            <div class="col-md-1">
            <a  class="btn btn-danger " id="btnDelEnlace5">
                    <i class="fa fa-close"></i>
            </a>
          </div>
          </div>
      </div>
     
      <div class="row">
      <br>
        <div class="col-md-12">

        <a class="btn btn-info mt-repeater-add" id="btnAddEnlace">
                  <i class="fa fa-plus"></i> Agregar Enlace </a>
        </div>

      </div>

            <!--<div class="row">
                <div class="col-md-12">     
                  <div class="form-group mt-repeater">
                      <div data-repeater-list="groupEnlaces">
                          <div data-repeater-item class="mt-repeater-item">
                              <div class="row mt-repeater-row">
                                  <div class="col-md-11">
                                      <label class="control-label">Enlace</label>
                                      <input type="text" placeholder="Salted Tuna" class="form-control" name="inputEnlace" id="inputEnlace"/> 
                                  </div>
                                  <div class="col-md-1">
                                      <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" id="btnDelTitInter">
                                          <i class="fa fa-close"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add" id="btnAddTitInter">
                          <i class="fa fa-plus"></i> Agregar Enlace</a>
                  </div>
              </div>
            </div>-->

  </div>
  <!--Inicio seccion 2-->
  <div class="portlet light ">
  <div class="row {{ $errors->has('inputFecha') ? ' has-error' : '' }}">
      <div class="col-md-6">

        <div class="form-group">
         <label for="">Candidato Gobernante:</label> 
        <div style="border:groove;height: 6em; width: 100%; overflow: auto;">
            @foreach ($ArrayCandidatoGobernante as $objCandidato)

              <input id="cheese" type="checkbox" name="inputCandGobernante[]" value="{{$objCandidato->f15_rowid}}" {{ (collect(old('inputCandGobernante'))->contains($objCandidato->f15_rowid)) ? 'checked':'' }}/>
              <label for="cheese">{{ $objCandidato->f15_descripcion}}</label>
              <br />
            @endforeach
        </div>



        </div>


      </div>
    <div class="col-md-6">
        <div class="form-group">
        <label for="">Candidato Alcaldia:</label> 
        <div style=" border:groove;height: 6em; width: 100%; overflow: auto;">
            @foreach ($ArrayCandidatoAlcaldia as $objCandidato)

              <input id="cheese" type="checkbox" name="inputCandAlcalde[]" value="{{$objCandidato->f15_rowid}}" {{ (collect(old('inputCandAlcalde'))->contains($objCandidato->f15_rowid)) ? 'checked':'' }}/>
              <label for="cheese">{{ $objCandidato->f15_descripcion}}</label>
              <br />
            @endforeach
        </div>
        </div>
      </div>
      <div>
      @if ($errors->has('inputCandGobernante'))
                  <span class="help-block" >
                      {{ $errors->first('inputCandGobernante') }}
                  </span>
        @endif
      </div>
    </div>
  </div>  
  <!--fin seccion 2-->
  <!--Inicio seccion 3 -->
  <div class="portlet light">

    <div class="form-group">
      <label  for="selectOrigenNoticia" >Origen de noticia:</label>
      <select class="form-control" name='selectOrigenNoticia'>
      @foreach ($ArrayOrigenNoticia as $objOrigen)
            <option value='{{$objOrigen->f17_rowid}}' {{ (old("selectOrigenNoticia") == $objOrigen->f17_rowid ? "selected":"") }}>{{ $objOrigen->f17_descripcion}}</option>
        @endforeach
      </select>
    </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
      <label for="">Etiqueta (Si son mas de una  ,ingresarlas separadas por coma): </label>
      </div>
      <input type="text" class="form-control" name="inputEtiqueta" id="inputEtiqueta" 
      title="Ingrese las etiquetas que contenga las noticia" placeholder="ejemploetiqueta1,ejemploEtiqueta2" value="{{old('inputEtiqueta')}}">
    </div>
  </div>

  </div>
  <!--fin seccion 3 -->
       
<!--Inicio de seccion 4 -->
  <div class="portlet light ">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="selectFuente" >Identificacion de Fuentes:</label>
          <select class="form-control" name='selectFuente'>
          <option value="">Seleccione una opcion...</option>
          @foreach ($ArrayFuente as $objFuente)
                <option value='{{$objFuente->f22_rowid}}' {{ (old("selectFuente") == $objFuente->f22_rowid ? "selected":"") }}>{{ $objFuente->f22_descripcion}}</option>
            @endforeach
          </select>
        </div> 
      </div>
      <div class="col-md-2">
        <div class="row">
          <div class="form-group">
            <label for="selectEquilibrio" >Equilibrio de Fuentes</label>
            <select class="form-control" name='selectEquilibrio' >
                  <option value=" " {{ (old("selectEquilibrio") == " " ? "selected":"") }}>Seleccione una opcion...</option>
                  <option value="0" {{ (old("selectEquilibrio") == "0" ? "selected":"") }}>No</option>
                  <option value="1" {{ (old("selectEquilibrio") == "1" ? "selected":"") }}>Si</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group ">
          <label for="selectrRelevancia" >Relevancia</label>
          <select class="form-control" name='selectrRelevancia' >
                <option value=" " {{ (old("selectrRelevancia") == " " ? "selected":"") }}>Seleccione una opcion...</option>
                <option value="4" {{ (old("selectrRelevancia") == "4" ? "selected":"") }}>Muy Alta</option>
                <option value="3" {{ (old("selectrRelevancia") == "3" ? "selected":"") }}>Alta</option>
                <option value="2" {{ (old("selectrRelevancia") == "2" ? "selected":"") }}>Media</option>
                <option value="1" {{ (old("selectrRelevancia") == "1" ? "selected":"") }}>Baja</option>
                <option value="0" {{ (old("selectrRelevancia") == "0" ? "selected":"") }}>No tiene relevancia</option>
                

          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="selectPertinencia" >Pertinencia:</label>
          <select class="form-control" name='selectPertinencia'>
                <option value="">Seleccione una opcion...</option>
          @foreach ($ArrayPertinencia as $objPertinencia)
                <option value='{{$objPertinencia->f23_rowid}}' {{ (old("selectPertinencia") == $objPertinencia->f23_rowid ? "selected":"") }}>{{ $objPertinencia->f23_descripcion}}</option>
            @endforeach
          </select>
        </div> 
      </div>
    </div>
  </div>
  <!--fin seccion 4 -->
  <!--Inicio seccion 5-->
  <div class="portlet light">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group  {{ $errors->has('selectGenPerio') ? ' has-error' : '' }}">
          <label class="label-control" for="selectGenPerio" >Genero Periodistico:</label>
          <select class="form-control" name='selectGenPerio' id="selectGenPerio">
            <option value="">Seleccione una opcion...</option>
          @foreach ($ArrayGeneroPeriodistico as $objGP)
                <option value='{{$objGP->f24_rowid}}' {{ (old("selectGenPerio") == $objGP->f24_rowid ? "selected":"") }}>{{ $objGP->f24_descripcion}}</option>
            @endforeach
          </select>
          @if ($errors->has('selectGenPerio'))
                  <span class="help-block" >
                      {{ $errors->first('selectGenPerio') }}
                  </span>
        @endif
        </div> 
      </div>
      <div class="col-md-6">
        <div class="form-group {{ $errors->has('selectSubGenPerio') ? ' has-error' : '' }}">
          <label for="selectSubGenPerio" >Tipo de genero periodistico:</label>
          <select class="form-control" name='selectSubGenPerio' id="selectSubGenPerio"></select>
          @if ($errors->has('selectSubGenPerio'))
                <span class="help-block" >
                    {{ $errors->first('selectSubGenPerio') }}
                </span>
        @endif
        </div> 
      </div>
    </div>
  </div>
<!--fin seccion 5 -->
<!--inicio de seccion 6 -->
  <div class="portlet light">
    <div class="row">
      <div class="col-md-4">
      <div class="form-group {{ $errors->has('selectLoVe') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-5">
            <label for="selectLoVe" >Lo ve:</label>
            </div>
            <div class="col-md-6">
            <input type="number" min=0 class="interactividad form-control" type="text" id="selectLoVe" name="selectLoVe"   value="{{old('selectLoVe')}}">

            </div>
          </div>
         </div>
      </div>
      <div class="col-md-4">

         <div class="form-group {{ $errors->has('selectLike') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-5">
              <label for="selectLike" >Le gusta / Like :</label>
            </div>
            <div class="col-md-6">
            <input type="number" min=0 class="interactividad form-control" type="text" id="selectLike" name="selectLike" value="{{old('selectLike')}}">

            </div>
          </div>
         </div>
      </div>
      <div class="col-md-4">

        <div class="form-group {{ $errors->has('selectComentarios') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-5">
              <label for="selectComentarios" >Comentarios:</label>
            </div>
            <div class="col-md-6">
              <input type="number" min=0 class="interactividad form-control" type="text" id="selectComentarios"  name="selectComentarios" value="{{old('selectComentarios')}}">

            </div>
          </div>
         </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
      <div class="form-group {{ $errors->has('selectShere') ? ' has-error' : '' }}">
          <div class="row">
            <div class="col-md-5">
              <label for="selectShere" >Lo comparte:</label>
            </div>
            <div class="col-md-6">
            <input type="number" min=0 class="interactividad form-control" type="text" id="selectShere"  name="selectShere" value="{{old('selectShere')}}">

            </div>
          </div>
         </div>
      </div>
      <div class="col-md-4">

      <div class ="form-group {{ $errors->has('selectNivelInt') ? ' has-error' : '' }}">
          <label  for="">Nivel de Interactividad:</label>
          <select class="form-control" name="selectNivelInt" id="selectNivelInt">
            <option value="">Seleccione una opcion ...</option>
            <option value="1" {{ (old("selectNivelInt") == 1 ? "selected":"") }}>Muy baja</option>
            <option value="2" {{ (old("selectNivelInt") == 2 ? "selected":"") }}>Baja</option>
            <option value="3" {{ (old("selectNivelInt") == 3 ? "selected":"") }}>Media</option>
            <option value="4" {{ (old("selectNivelInt") == 4 ? "selected":"") }}>Alta</option>
            <option value="5" {{ (old("selectNivelInt") == 5 ? "selected":"") }}>Muy Alta</option>
          </select>    
      </div>

      </div>
      <div class="col-md-4">

      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
          @if ($errors->has('selectLike')||$errors->has('selectLike')||$errors->has('selectComentarios')||$errors->has('selectShere')||$errors->has('selectNivelInt') )
                  <span class="help-block" >
                      
                  Los campos deben estar diligenciados
                  </span>
        @endif
          </div>

        </div>

      </div>

    </div>
    <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label   for="selectIntencion">Intencion:</label>
              <select class="form-control" name="selectIntencion" id="selectIntencion" >
                <option value="">Selecciones una opcion...</option>
                @foreach($ArrayIntencion as $objIntencion)
                <option value="{{$objIntencion->f21_rowid}}" {{ (old("selectIntencion") == $objIntencion->f21_rowid ? "selected":"") }}>
                  {{$objIntencion->f21_descripcion}}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label   for="">Postura Publica:</label>
              <select class="form-control" name="selectPostura" >
                @foreach($ArrayPosturaPublica as $objPostura)
                <option value="">Selecciones una opcion... </option>
                <option value="{{$objPostura->f25_rowid}}" {{ (old("selectPostura") == $objPostura->f25_rowid ? "selected":"") }}>
                  {{$objPostura->f25_descripcion}}
                </option>
                @endforeach
              </select>
              </div>
          </div>

        </div>

  </div>
<!--fin seccion 6 --->
<!--Inicio seccion 7 -->
<div class="portlet light">




        <div class="form-group {{ $errors->has('selectNivelInt') ? ' has-error' : '' }}">
            <label class ="caption-subject bold uppercase"  for="observacion">Observación general:</label>
            <textarea class="form-control" id="txtAreaObserv" rows="3" name="txtAreaObserv" ">
            {{old('txtAreaObserv') }}
            </textarea>
            @if ($errors->has('txtAreaObserv'))
                    <span class="help-block" >
                        {{ $errors->first('txtAreaObserv') }}
                    </span>
        @endif
        </div>


        <button type="submit" class="btn green">Guardar</button>
</div>

<!--Fin seccion 7 -->


    </form>

</div>

          
@endsection

@section('scripts')

<script type="text/javascript">

      

  var ultimoTituloInt = 0;
  var ultimoEnlace= 0;
  var HabilitarbtnAddTitular = false;
  

  $('#rowTitulares2').hide();
  $('#rowTitulares3').hide();

  $('#rowEnlace2').hide();
  $('#rowEnlace3').hide();
  $('#rowEnlace4').hide();
  $('#rowEnlace5').hide();
  

  function HabilitarTitularInterno(){
      var vIdUbicacion=$( "#selectUbicacion" ).val();
 
      if (vIdUbicacion == 2 || vIdUbicacion == 3 ){//portada + interior ,interior

        if(vIdUbicacion == 3 ){//interior
          $("#txtAreaTitular").val('');
          $( "#txtAreaTitular" ).prop( "disabled", true );
        }

        $( "#inputTitularInterno1" ).prop( "disabled", false );
        $('#btnDelTitInter').removeAttr("disabled");
        $('#btnAddTitInter').removeAttr("disabled");  
        $('#selecTipoRecurso1').removeAttr("disabled");  
        HabilitarbtnAddTitular = true;
      }else{//portada
        $( "#txtAreaTitular" ).prop( "disabled", false );
        $( "#inputTitularInterno1" ).prop( "disabled", true );
        $('#btnDelTitInter').attr("disabled","disabled");
        $('#btnAddTitInter').attr("disabled","disabled");
        $('#selecTipoRecurso1').attr("disabled","disabled");
        HabilitarbtnAddTitular = false;

      }
  }        

 function loadSubGenero(){
    var vRowidGenPerio=$('#selectGenPerio').val();
    console.log(vRowidGenPerio);
    if($.trim(vRowidGenPerio) != ''){

        $.ajax(
            {
              url : '/sub-gen-perio' ,
              type: "GET",
              dataType: 'json',
              data : {pRowidGenPerio:vRowidGenPerio},
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            })
              .done(function(data) {


                var old = $('#selectSubGenPerio').data('old') != '' ? $('#selectSubGenPerio').data('old') : '';

                $('#selectSubGenPerio').empty();
                $('#selectSubGenPerio').append("<option value=' '>Selecciona una carrera</option>");

                $.each(data, function (index, value) {
                    $('#selectSubGenPerio').append("<option value='" + index + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                }) 



              })
              .fail(function(data) {
                console.log('FAIL => ' ,  data);
              })
              .always(function(data) {
              
              });

    }else{
      $('#selectSubGenPerio').empty();
    }

 }

  $(document).ready(function(){


    HabilitarTitularInterno();
  
    $('#selectUbicacion').on('change',function(){
      HabilitarTitularInterno();
    });

  
    
    loadSubGenero();
    $('#selectGenPerio').on('change',function(){
    
      loadSubGenero();
    });

    // interaccion de input de titular interno
    $('#btnAddTitInter').on('click',function(){

      if(HabilitarbtnAddTitular == false){
        return;
      }

     if (ultimoTituloInt==0){
      $('#rowTitulares2').show();
      ultimoTituloInt=1;
     
    }else if(ultimoTituloInt==1){

      $('#rowTitulares3').show();
      $('#btnDelTitInter2').hide();
      ultimoTituloInt=2;
    
    }else if(ultimoTituloInt==2){
      alert('No es posible agregar mas titulos');
    }
    });

    $('#btnDelTitInter2').on('click',function(){
      $('#inputTitularInterno2').empty();
      $('#inselecTipoRecurso2').val(0);
      $('#rowTitulares2').hide();
      ultimoTituloInt=0;
    });

    $('#btnDelTitInter3').on('click',function(){
      $('#inputTitularInterno3').empty();
      $('#inselecTipoRecurso3').val(0);
      $('#rowTitulares3').hide();
      $('#btnDelTitInter2').show();
      ultimoTituloInt=1;
    });

    //Interaccion de input para enlaces a paginas 
    $('#btnAddEnlace').on('click',function(){
     if (ultimoEnlace==0){
      $('#rowEnlace2').show();
      ultimoEnlace=1;
     
    }else if(ultimoEnlace==1){

      $('#rowEnlace3').show();
      $('#btnDelEnlace2').hide();
      ultimoEnlace=2;
    
    }else if(ultimoEnlace==2){

      $('#rowEnlace4').show();
      $('#btnDelEnlace3').hide();
      ultimoEnlace=3;
    }else if(ultimoEnlace==3){

      $('#rowEnlace5').show();
      $('#btnDelEnlace4').hide();
      ultimoEnlace=4;
    }else if(ultimoEnlace==4){
      alert('No es posible agregar mas titulos');
    }
    });

    $('#btnDelEnlace2').on('click',function(){
      $('#inputEnlace2').empty();
      $('#rowEnlace2').hide();
      ultimoEnlace=0;
    });

    $('#btnDelEnlace3').on('click',function(){
      $('#inputEnlace3').empty();
      $('#rowEnlace3').hide();
      $('#btnDelEnlace2').show();
      ultimoEnlace=1;
    });


    $('#btnDelEnlace4').on('click',function(){
      $('#inputEnlace4').empty();
      $('#rowEnlace4').hide();
      $('#btnDelEnlace3').show();
      ultimoEnlace=2;
    });

    $('#btnDelEnlace5').on('click',function(){
      $('#inputEnlace5').empty();
      $('#rowEnlace5').hide();
      $('#btnDelEnlace4').show();
      ultimoEnlace=3;
    });

  });



</script>

@endsection