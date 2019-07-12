<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedioComunicacion;
use App\Tema;
use App\Formulario;
use App\Estructura;
use App\Archivo;
use App\Link;
use App\TemaFormulario;
use App\Models\CandidatoModel;
use App\Models\PrensaInternacionalModel;
use  App\Models\OrigenNoticiaModel;
use App\Models\UbicacionMcModel;
use App\Models\TipoRecursoModel;
use App\Models\IntencionModel;
use App\Models\FuenteModel;
use App\Models\PertinenciaModel;
use App\Models\GenPeriodisticoModel;
use App\Models\SubGenPeriodisticoModel;
use App\Models\PosturaPublicaModel;
use App\Models\TitularesUbicacionModel;
use App\Models\EtiquetasModel;
use App\Models\CandidatoFormularioModel;

class SETvNacionalController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


        $vIntAmbito=0;
        $vIntEstructura=0;

        if($id==1){//tv nacional
            $vIntAmbito=2;
            $vIntEstructura=2;

        }else if($id==2){//tvregional

            $vIntAmbito=1;
            $vIntEstructura=2;
            
        }else if($id==3){//MD nacional

            $vIntAmbito=2;
            $vIntEstructura=5;

        }else if($id==4){//MD regional

            $vIntAmbito=1;
            $vIntEstructura=5;
        }



       //se obtienen los medios de comunicacion 
       $vArrayMedioComunicacion=MedioComunicacion::where('f10_rowid_ambito', $vIntAmbito )
       ->where('f10_rowid_estructura', $vIntEstructura)->get();

        //Se obtienen los temas
        $vArrayTema= Tema::all();

        //Se obtienen los candidatos 

        $vArrayCandidatoGobernante =CandidatoModel::where('f15_rowid_cargo',1)
        ->get();

        $vArrayCandidatoAlcaldia =CandidatoModel::where('f15_rowid_cargo',2)->get();

        $vArrayOrigenNoticia =  OrigenNoticiaModel::all();

        $vArrayUbicacionMc = UbicacionMcModel::all();

        $vArrayEstructura = Estructura::all();

        $vArrayTipoRecurso= TipoRecursoModel::all();

        $vArrayIntencion = IntencionModel::all();

        $vArrayFuente = FuenteModel::all();

        $vArrayPertinencia = PertinenciaModel::all();

        $vArrayGeneroPeriodistico = GenPeriodisticoModel::all();

        $vArraySubGeneroPeriodistico = SubGenPeriodisticoModel::all();

        $vArrayPosturaPublica = PosturaPublicaModel::all();

        return view('frmseguimientoElectoral',[
            'strTituloFormulario'=> 'Seguimiento electoral medios nacionales TV',
            'ArrayMedioComunicacion'=>$vArrayMedioComunicacion,
            'ArrayTema'=>$vArrayTema,
            'ArrayEstructura'=> $vArrayEstructura,
            'ArrayCandidatoGobernante'=>$vArrayCandidatoGobernante,
            'ArrayCandidatoAlcaldia'=>$vArrayCandidatoAlcaldia,
            'ArrayOrigenNoticia'=>$vArrayOrigenNoticia,
            'ArrayUbicacionMc'=>$vArrayUbicacionMc,
            'ArrayTipoRecurso'=>$vArrayTipoRecurso,
            'ArrayIntencion'=>$vArrayIntencion,
            'ArrayFuente' =>$vArrayFuente,
            'ArrayPertinencia'=>$vArrayPertinencia,
            'ArrayGeneroPeriodistico'=>$vArrayGeneroPeriodistico,
            'ArraySubGeneroPeriodistico' =>$vArraySubGeneroPeriodistico,
            'ArrayPosturaPublica'=>$vArrayPosturaPublica,
            'IntAmbito'=>$vIntAmbito,
            'IntEstructura'=>$vIntEstructura,
            'post'=>'/post-se-tv-nacional']
        );
    }

    public function getSubGenPerio(Request $request){
        //dd($request);

        if($request->ajax()){
            
            
            $vSubGeneroPeriodistico = SubGenPeriodisticoModel::where('f27_rowid_gen_perio', $request->pRowidGenPerio)->get();
            
            foreach($vSubGeneroPeriodistico as $SubGenPerio){
                $vArraySubGeneroPeriodistico[$SubGenPerio->f27_rowid] = $SubGenPerio->f27_descripcion;        
            }

            return response()->json($vArraySubGeneroPeriodistico);
    
        }
   
    }

    public function store(Request $request){
        

        $this->validate($request,
        [
            'inputCorreo'=>'required',
            'inputFecha'=>'required',
            //'txtAreaTitular'=>'required'
            'txtAreaTitular' => 'required_if:selectUbicacion,==,1',
            'txtAreaTitular' => 'required_if:selectUbicacion,==,2',
            'inputTitularInterno1' => 'required_if:selectUbicacion,==,2',
            'inputTitularInterno1' => 'required_if:selectUbicacion,==,3',
            'selectGenPerio'=>'required',
            'selectSubGenPerio'=>'required',
            'selectLoVe'=>'required',
            'selectLike'=>'required',
            'selectComentarios'=>'required',
            'selectShere'=>'required',
            'selectNivelInt'=>'required',
            'txtAreaObserv'=>'required'      
        ],
        [
            'inputCorreo.required'=>'El correo es obligatorio',
            'inputFecha.required'=>'El dia analizado es obligatorio',
            'txtAreaTitular.required_if'=>'El titular del medio es obligatorio',
            'inputTitularInterno1.required_if'=>'El titular interior del medio es obligatorio',
            'selectGenPerio.required'=>'El genero Periodistico es obligatorio',
            'selectSubGenPerio.required'=>'El tipo de genero periodistico es obligatorio', 
            'selectLoVe.required'=>'Los campos deben estar diligenciados.',
            'selectLike.required'=>'Los campos deben estar diligenciados.',
            'selectComentarios.required'=>'Los campos deben estar diligenciados.',
            'selectShere.required'=>'Los campos deben estar diligenciados.',
            'selectNivelInt.required'=>'Los campos deben estar diligenciados.',
            'txtAreaObserv.requiered'=>'Las observaciones son obligatorias.'               
        ]);




        try {
            //$validated = $request->validated();

            DB::beginTransaction();
            //$v= ($request->checkTemaRelevante  == 'on') ? 1 : 0;

            $vIntRowidArchivo=0;

            if($request->hasFile('inputArchivo')){
                $file = $request->file('inputArchivo');
                $file_name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/',$file_name );

                $vTemp= Archivo::create(
                    ['f26_descripcion' => $file_name]
                )->get(['f26_rowid'])->last();
                
                $vIntRowidArchivo =  $vTemp->f26_rowid;

            };
            
            $vIntRowidFormulario = Formulario::create(
                [
                    'f50_estado'=>0,
                    'f50_descripcion'=> 'Seguimiento electoral medios nacionales TV',
                    'f50_correo'=>$request->inputCorreo,
                    'f50_fecha'=>$request->inputFecha,
                    'f50_rowid_medio_comunic'=>$request->selectMedioComunic,
                    'f50_rowid_tema_relevante'=>$request->selectRelevanteTema ,
                    'f50_observacion'=>$request->txtAreaObserv,
                    'f50_rowid_ambito'=>$request->IntAmbito,
                    'f50_rowid_estructura'=>$request->selectEstructura,
                    'f50_nativo_digital'=>$request->selectNativoDigital,
                    'f50_titular_medio_comunic'=>$request->txtAreaTitular,
                    'f50_rowid_archivo'=> ($vIntRowidArchivo == 0) ? null :$vIntRowidArchivo,
                    //'f50_titular_solo_portada'=>$request->selectUbicacion,
                    'f50_titular_solo_interior'=>0,
                    //'f50_titular_interior_1'=>$re
                    //'f50_titular_interior_2'=>$request->
                    //'f50_titular_interior_3'=>$request->
                    //'f50_titular_interior_4'=>$request->
                    //'f50_titular_interior_5'=>$request->
                    //'f50_rowid_candidato_alcaldia'=>$request->
                    //'f50_rowid_candidato_gobern'=>$request->
                    'f50_id_origen_noticia'=>$request->selectOrigenNoticia,
                    'f50_rowid_ubicacion'=>$request->selectUbicacion,
                    'f50_rowid_intencion'=>$request->selectIntencion,
                    'f50_ind_identificacion_fuente'=>$request->selectFuente,
                    'f50_rowid_pertinecia_fuente'=>$request->selectPertinencia,
                    'f50_equilibrio_fuente'=>$request->selectEquilibrio,
                    'f50_relevancia_valor'=>$request->selectrRelevancia,
                    'f50_rowid_genero_periodistico'=>$request->selectGenPerio,
                    'f50_rowid_subgenero_perio'=>$request->selectSubGenPerio,
                    'f50_lo_ve'=>$request->selectLoVe,
                    'f50_gusta'=>$request->selectLike,
                    'f50_comentarios'=>$request->selectComentarios,
                    'f50_compartido'=>$request->selectShere,
                    'f50_nivel_interactividad'=>$request->inputMediaInteract,
                    'f50_rowid_postura'=>$request->selectPostura,
                    'f50_tipo'=>2

                ]
            )->get(['f50_rowid'])->last();
                    


            if( $request->inputTitularInterno1 != null){

                TitularesUbicacionModel::create([
                    'f28_titular'=>$request->inputTitularInterno1 ,
                    'f28_rowid_formulario'=>$vIntRowidFormulario->f50_rowid,
                    'f28_rowid_tipo_recurso'=>$request->selecTipoRecurso1
                ]);

            }

            if( $request->inputTitularInterno2 != null){

                TitularesUbicacionModel::create([
                    'f28_titular'=>$request->inputTitularInterno2 ,
                    'f28_rowid_formulario'=>$vIntRowidFormulario->f50_rowid,
                    'f28_rowid_tipo_recurso'=>$request->selecTipoRecurso2
                ]);

            }

            if( $request->inputTitularInterno3 != null){

                TitularesUbicacionModel::create([
                    'f28_titular'=>$request->inputTitularInterno3 ,
                    'f28_rowid_formulario'=>$vIntRowidFormulario->f50_rowid,
                    'f28_rowid_tipo_recurso'=>$request->selecTipoRecurso3
                ]);

            }


            if( $request->inputEnlace != null){

                Link::create([
                    'f18_descripcion'=>$request->inputEnlace,
                    'f18_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                ]);


            }


            if( $request->inputEnlace2 != null){

                Link::create([
                    'f18_descripcion'=>$request->inputEnlace2,
                    'f18_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                ]);


            }


            if( $request->inputEnlace3 != null){

                Link::create([
                    'f18_descripcion'=>$request->inputEnlace3,
                    'f18_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                ]);


            }


            if( $request->inputEnlace4 != null){

                Link::create([
                    'f18_descripcion'=>$request->inputEnlace4,
                    'f18_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                ]);


            }


            if( $request->inputEnlace5 != null){

                Link::create([
                    'f18_descripcion'=>$request->inputEnlace5,
                    'f18_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                ]);


            }

            $arrayEtiquetas = explode(';',$request->inputEtiqueta);

            foreach( $arrayEtiquetas as $etiqueta){

                  EtiquetasModel::create([
                    'f20_descripcion'=> $etiqueta,
                    'f20_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                  ]);  

            }
            
            $ArrayGobernante = $request->inputCandGobernante;
            foreach($ArrayGobernante as $objGobernante ){

                CandidatoFormularioModel::create([
                    'f202_rowid_candidato' =>   $objGobernante  ,
                    'f202_rowid_formulario' =>$vIntRowidFormulario->f50_rowid
                ]);
            }

            $ArrayAlcalde = $request->inputCandAlcalde;
            foreach($ArrayAlcalde as $objAlcalde ){

                CandidatoFormularioModel::create([
                    'f202_rowid_candidato' =>   $objAlcalde  ,
                    'f202_rowid_formulario' =>$vIntRowidFormulario->f50_rowid
                ]);
            }
    

            
            DB::commit();

            // return response()
            // ->json(['status' => true]);
            return view('frmConfirmacion',['strMensaje'=>'Creacion exitosa','return'=>'prensa-internacional']);
                
        } catch (\Throwable $th) {
            DB::rollBack();
            //abort(500,$th->getMessage());
            echo $th->getMessage();
        }

        return $request;

    }



}
