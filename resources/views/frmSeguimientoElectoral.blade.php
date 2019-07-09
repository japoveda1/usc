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
    <form action="{{$post}}" method="post" enctype="multipart/form-data">
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
            <label for="selectEstructura" >Estructura:</label>
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
    <div class="row">
      <div class="col-md-4">
        <div class="form-group {{ $errors->has('txtAreaTitular') ? ' has-error' : '' }}">
            <label class ="caption-subject bold uppercase"  for="observacion">Titular:</label>
            <textarea class="form-control" id="txtAreaTitular" rows="2" name="txtAreaTitular" value="{{ old('txtAreaTitular') }}"></textarea>
            @if ($errors->has('txtAreaTitular'))
                  <span class="help-block" >
                      {{ $errors->first('txtAreaTitular') }}
                  </span>
            @endif
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="selecTipoRecurso" >Tipo de recurso:</label>
          <select class="form-control" name='selecTipoRecurso'>
          @foreach ($ArrayTipoRecurso as $objTipoRec)
                <option value='{{$objTipoRec->f19_rowid}}' {{ (old("selecTipoRecurso") == $objTipoRec->f19_rowid ? "selected":"") }}>{{ $objTipoRec->f19_descripcion}}</option>
          @endforeach
          </select>
        </div>
      </div>    

        <div class="col-md-3">
          <div class="form-group">
            <label  for="selectUbicacion" >Ubicacion</label>
            <select class="form-control" name='selectUbicacion' id="selectUbicacion">
                  <option value=1 {{ (old("selectUbicacion") == 1 ? "selected":"") }}>Titular o Portada</option>
                  <option value=2 {{ (old("selectUbicacion") == 2 ? "selected":"") }}>Titular o Portada  + continuidad en el interior</option>
                  <option value=3 {{ (old("selectUbicacion") == 3 ? "selected":"") }}>Interior</option>

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


    <!--<div class="row">
        <div class="col-md-12">
          <div class="form-group mt-repeater">
            <div data-repeater-list="group-titular-interior">
                <div data-repeater-item class="mt-repeater-item mt-overflow">
                    <label class="control-label">Titular interior:</label>
                    <div class="mt-repeater-cell">
                        <input type="text" placeholder="Enlace a paginas de medio analizado" 
                        class="form-control mt-repeater-input-inline" name="inputTitularInterior" id="inputTitularInterior"/>
                        <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline" id="aDelTitularInterior">
                            <i class="fa fa-close"></i>
                        </a>
                    </div>
                </div>
            </div>
            <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add" id="aAddTitularInterior">
                <i class="fa fa-plus"></i> Añadir titular interior</a>
          </div>
        </div>
      </div>-->
      <div class="row">
        <div class="col-md-12">     
          <div class="form-group mt-repeater">
              <div data-repeater-list="groupTitularesInternos">
                  <div data-repeater-item class="mt-repeater-item">
                      <div class="row mt-repeater-row">
                          <div class="col-md-8">
                              <label class="control-label">Titular interno</label>
                              <input type="text" placeholder="Salted Tuna" class="form-control" name="inputTitularInterno" id="inputTitularInterno"/> </div>
                          <div class="col-md-3">
                              <label class="control-label">Tipo de recurso</label>
                              <select class="form-control" name='selecTipoRecurso' id="selecTipoRecurso" >
                              @foreach ($ArrayTipoRecurso as $objTipoRec)
                                    <option value='{{$objTipoRec->f19_rowid}}'>{{ $objTipoRec->f19_descripcion}}</option>
                              @endforeach
                              </select></div>
                          <div class="col-md-1">
                              <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete" id="btnDelTitInter">
                                  <i class="fa fa-close"></i>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              <a href="javascript:;" data-repeater-create class="btn btn-info mt-repeater-add" id="btnAddTitInter">
                  <i class="fa fa-plus"></i> Agregar Titular interno</a>
          </div>
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
      <!--<div class="row">
        <div class="col-md-12" id="divjohaprueba" > 

        </div>
          <div id="btnPrueba" class="btn ">
          johan
          </div>
      </div> -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mt-repeater">
                  <div data-repeater-list="groupEnlace">
                      <div data-repeater-item class="mt-repeater-item mt-overflow">
                          <label class="control-label">Enlace a paginas:</label>
                          <div class="mt-repeater-cell">
                              <input type="text" placeholder="Enlace a paginas de medio analizado" 
                              class="form-control mt-repeater-input-inline" name="inputEnlace[]"/>
                              <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
                                  <i class="fa fa-close"></i>
                              </a>
                          </div>
                      </div>
                  </div>
                  <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
                      <i class="fa fa-plus"></i> Añadir enlace</a>
                </div>
              </div>
            </div>
  </div>
  <!--Inicio seccion 2-->
  <div class="portlet light ">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="selectCandidato" >Candidato a gobernacion:</label>
          <select  class="form-control" multiple="multiple"  name="selectCandGobernante[]" id="selectCandGobernante"  >
            @foreach ($ArrayCandidatoGobernante as $objCandidato)
                <option value='{{$objCandidato->f15_rowid}}' {{ (collect(old("selectCandGobernante"))->contains($objCandidato->f15_rowid) ? "selected":"") }}>{{ $objCandidato->f15_descripcion}}</option>
            @endforeach
          </select>
        </div>
      </div>

    </div>

    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label for="selectCandidato" >Candidato a alcaldia:</label>
          <select  class="form-control" multiple="multiple"  name="selectCandAlcaldia[]" id="selectCandAlcaldia"  >
            @foreach ($ArrayCandidatoAlcaldia as $objCandidato)
                <option value='{{$objCandidato->f15_rowid}}' {{ (collect(old("selectCandAlcaldia"))->contains($objCandidato->f15_rowid) ? "selected":"") }}>{{ $objCandidato->f15_descripcion}}</option>
            @endforeach
          </select>
        </div>
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

    <div class="form-group">
      <label for="selectUbicTitular" >Ubicacion titular:</label>
      <select class="form-control" name='selectUbicTitular'>
      @foreach ($ArrayUbicacionMc as $objUbicacion)
            <option value='{{$objUbicacion->f13_rowid}}' {{ (old("selectUbicTitular") == $objUbicacion->f13_rowid ? "selected":"") }}>{{ $objUbicacion->f13_descripcion}}</option>
      @endforeach
      </select>
    </div>

    <div class="form-group">
      <label  for="selectRelevanteTema" >Ubicacion titulares interior:</label>
      <select class="form-control" name='selectUbicTitularInt'>
      @foreach ($ArrayUbicacionMc as $objUbicacion)
            <option value='{{$objUbicacion->f13_rowid}}' {{ (old("selectUbicTitularInt") == $objUbicacion->f13_rowid ? "selected":"") }}>{{ $objUbicacion->f13_descripcion}}</option>
      @endforeach
      </select>
    </div>



    <div class="form-group mt-repeater">
      <div data-repeater-list="groupEtiquetas">
          <div data-repeater-item class="mt-repeater-item mt-overflow">
              <label class="control-label">Etiqueta:</label>
              <div class="mt-repeater-cell">
                  <input type="text" placeholder="#EjemploDeEtiqueta" 
                  class="form-control mt-repeater-input-inline" name="inputEtiquetas"/>
                  <a href="javascript:;" data-repeater-delete class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
                      <i class="fa fa-close"></i>
                  </a>
              </div>
          </div>
      </div>
      <a href="javascript:;" data-repeater-create class="btn btn-success mt-repeater-add">
          <i class="fa fa-plus"></i> Añadir etiqueta</a>
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
                  <option value=0 {{ (old("selectEquilibrio") == 0 ? "selected":"") }}>No</option>
                  <option value=1 {{ (old("selectEquilibrio") == 1 ? "selected":"") }}>Si</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group ">
          <label for="selectrRelevancia" >Relevancia</label>
          <select class="form-control" name='selectrRelevancia' >
                <option value=4 {{ (old("selectrRelevancia") == 4 ? "selected":"") }}>Muy Alta</option>
                <option value=3 {{ (old("selectrRelevancia") == 3 ? "selected":"") }}>Alta</option>
                <option value=2 {{ (old("selectrRelevancia") == 2 ? "selected":"") }}>Media</option>
                <option value=1 {{ (old("selectrRelevancia") == 1 ? "selected":"") }}>Baja</option>
                <option value=0 {{ (old("selectrRelevancia") == 0 ? "selected":"") }}>No tiene relevancia</option>
                

          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="selectPertinencia" >Pertinencia:</label>
          <select class="form-control" name='selectPertinencia'>
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
        <div class="form-group">
          <label  for="selectGenPerio" >Genero Periodistico:</label>
          <select class="form-control" name='selectGenPerio' id="selectGenPerio">
            <option value="">Seleccione una opcion...</option>
          @foreach ($ArrayGeneroPeriodistico as $objGP)
                <option value='{{$objGP->f24_rowid}}' {{ (old("selectGenPerio") == $objGP->f24_rowid ? "selected":"") }}>{{ $objGP->f24_descripcion}}</option>
            @endforeach
          </select>
        </div> 
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="selectSubPertinencia" >Sub Genero Periodistico:</label>
          <select class="form-control" name='selectSubGenPerio' id="selectSubGenPerio">
 
          </select>
        </div> 
      </div>
    </div>
  </div>
<!--fin seccion 5 -->
<!--inicio de seccion 6 -->
  <div class="portlet light">
    <div class="row">
      <div class="col-md-4">
      <div class="form-group">
          <div class="row">
            <div class="col-md-6">
            <label for="selectLoVe" >Lo ve:</label>
            </div>
            <div class="col-md-3">
              <select class="form-control interactividad" name="selectLoVe" id="selectLoVe">
                  <option value=0>0</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
              </select>
            </div>
          </div>
         </div>
      </div>
      <div class="col-md-4">

         <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="selectLike" >Le gusta / Like :</label>
            </div>
            <div class="col-md-3">
              <select class="form-control interactividad" name="selectLike" id="selectLike">
                  <option value=0>0</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
              </select>
            </div>
          </div>
         </div>
      </div>
      <div class="col-md-4">

        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="selectComentarios" >Comentarios:</label>
            </div>
            <div class="col-md-3">
              <select class="form-control interactividad" name="selectComentarios" id="selectComentarios">
                  <option value=0>0</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
              </select>
            </div>
          </div>
         </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
      <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="selectShere" >Lo comparte:</label>
            </div>
            <div class="col-md-3">
              <select class="form-control interactividad" name="selectShere" id="selectShere">
                  <option value=0>0</option>
                  <option value=1>1</option>
                  <option value=2>2</option>
                  <option value=3>3</option>
                  <option value=4>4</option>
                  <option value=5>5</option>
              </select>
            </div>
          </div>
         </div>
      </div>
      <div class="col-md-4">

      <div class ="form-group">
          <label  for="">Nivel de Interactividad:</label>
          <input type="number" min=0 class="form-control" name="inputMediaInteract" value="{{old('inputMediaInteract')}}"   id="inputMediaInteract">
         </div>

      </div>
      <div class="col-md-4">

      </div>
    </div>
    <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label   for="selectIntencion">Intencion:</label>
              <select class="form-control" name="selectIntencion" id="selectIntencion" >
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




        <div class="form-group">
            <label class ="caption-subject bold uppercase"  for="observacion">Observación general:</label>
            <textarea class="form-control" id="observacion" rows="3" name="txtAreaObserv" value="{{old('txtAreaObserv')}}"></textarea>
        </div>

        <button type="submit" class="btn green">Guardar</button>
</div>

<!--Fin seccion 7 -->


    </form>

</div>

          
@endsection

@section('scripts')

<script type="text/javascript">

  $('#selectCandGobernante').multiselect({
              enableFiltering: true
          });
  $('#selectCandAlcaldia').multiselect({
              enableFiltering: true
          });

  $("btnPrueba").click(function(){
    console.log("hola johan");
  });
  function HabilitarTitularInterno(){
      var vIdUbicacion=$( "#selectUbicacion" ).val();
 
      if (vIdUbicacion == 2 || vIdUbicacion == 3 ){

        if(vIdUbicacion == 3 ){
          $("#txtAreaTitular").val('');
          $( "#txtAreaTitular" ).prop( "disabled", true );
        }

        $( "#inputTitularInterno" ).prop( "disabled", false );
        $('#btnDelTitInter').removeAttr("disabled");
        $('#btnAddTitInter').removeAttr("disabled");  
        $('#selecTipoRecurso').removeAttr("disabled");  
      }else{
        $( "#txtAreaTitular" ).prop( "disabled", false );
        $( "#inputTitularInterno" ).prop( "disabled", true );
        $('#btnDelTitInter').attr("disabled","disabled");
        $('#btnAddTitInter').attr("disabled","disabled");
        $('#selecTipoRecurso').attr("disabled","disabled");

      }
  }        

  function mediaInteractividad(){
    var love = parseInt($("#selectLoVe").val());
    var like =parseInt($('#selectLike').val());
    var comentarios =parseInt($('#selectComentarios').val());
    var shared=parseInt($('#selectShere').val());


    var media= (love+like+comentarios+shared)/4;
 
    $("#inputMediaInteract").val(media);
    console.log(media,love)
  }

  $(document).ready(function(){
    
    HabilitarTitularInterno();
  
    $('#selectUbicacion').on('change',function(){
      HabilitarTitularInterno();
    });

    $('#btnPrueba').on('click',function(){
      $('#divjohaprueba').append("<div class='row'><div class='form-group'><input class='form-control' value='joahn'/></div> </div> ");
     });

  $("btnPrueba").click(function(){
    console.log("hola johan");
  });

  $('.interactividad').on('change',function(){
    mediaInteractividad();
  });
  
    

    $('#selectGenPerio').on('change',function(){
    
      var vRowidGenPerio=$(this).val();

      if($.trim(vRowidGenPerio) != ''){
          $.get('SubGenPerio',{
            pRowidGenPerio:vRowidGenPerio
          },function(rSubGenPer){

              console.log(rSubGenPer);
              $('#selectSubGenPerio').empty();
              
              $.each(rSubGenPer,function(index,value){
                $('#selectSubGenPerio').append("<option value="+index+">" + value +"</option>");

              })
          });
      }else{
        $('#selectSubGenPerio').empty();

      }
    });

  });



</script>

@endsection