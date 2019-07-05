<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedioComunicacion;
use App\Tema;
use App\Formulario;
use App\Estructura;
use App\Archivo;
use App\TemaFormulario;
use App\Link;
use App\Models\PrensaInternacionalModel;

class PrensaInternacionalController extends Controller
{
    private $prvStrTituloForm = 'Titulares Prensa Internacional';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
         //se obtienen los medios de comunicacion 
         $vArrayMedioComunicacion=MedioComunicacion::where('f10_rowid_ambito', 3)
                                                    ->where('f10_rowid_estructura',4)->get();

         //Se obtienen los temas
         $vArrayTema= Tema::all();

         //
        $vArrayEstructura = Estructura::all();
         
         return view('frmPrensaInternacional',[
             'strTituloFormulario'=> 'Titulares Prensa Internacional',
             'ArrayMedioComunicacion'=>$vArrayMedioComunicacion,
             'ArrayTema'=>$vArrayTema,
             'ArrayEstructura'=> $vArrayEstructura,
             'Post'=>'prensa-internacional']
         );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
            'inputCorreo'=>'required',
            'inputFecha'=>'required',
            'inputTitularPortada'=>'required'
        ],
        [
            'inputCorreo.required'=>'El correo es obligatorio',
            'inputFecha.required'=>'El dia analizado es obligatorio',
            'inputTitularPortada.required'=>'El titular del medioes es obligatorio'
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

                $vIntRowidArchivo= Archivo::create(
                    ['f26_descripcion' => $file_name]
                )->get(['f26_rowid'])->last();
            };



            $vIntRowidFormulario = Formulario::create(
                [
                    'f50_estado'=>0,
                    'f50_descripcion'=> "Titulares Prensa Internacional",
                    'f50_correo'=>$request->inputCorreo,
                    'f50_fecha'=>$request->inputFecha,
                    'f50_rowid_medio_comunic'=>$request->selectMedioComunic,
                    'f50_rowid_tema_relevante'=>$request->selectRelevanteTema ,
                    'f50_observacion'=>$request->txtAreaObserv,
                    'f50_rowid_ambito'=>3,
                    'f50_rowid_estructura'=>$request->selectEstructura,
                    'f50_nativo_digital'=>$request->selectNativoDigital,
                    'f50_titular_medio_comunic'=>$request->inputTitularPortada,
                    'f50_rowid_archivo'=>$vIntRowidArchivo->f26_rowid,
                    'f50_titular_solo_portada'=>1,
                    'f50_titular_solo_interior'=>0
                    //'f50_titular_interior_1'=>$request->
                    //'f50_titular_interior_2'=>$request->
                    //'f50_titular_interior_3'=>$request->
                    //'f50_titular_interior_4'=>$request->
                    //'f50_titular_interior_5'=>$request->
                    //'f50_rowid_candidato_alcaldia'=>$request->
                    //'f50_rowid_candidato_gobern'=>$request->
                    //'f50_rowid_origen_noticia'=>$request->
                    //'f50_rowid_ubicacion'=>$request->
                    //'f50_rowid_intencion'=>$request->
                    //'f50_ind_identificacion_fuente'=>$request->
                    //'f50_rowid_pertinencia_fuente'=>$request->
                    //'f50_equilibrio_fuente'=>$request->
                    //'f50_relevancia_valor'=>$request->
                    //'f50_rowid_genero_periodistico'=>$request->
                    //'f50_lo_ve'=>$request->
                    //'f50_gusta'=>$request->
                    //'f50_comentarios'=>$request->
                    //'f50_compartido'=>$request->
                    //'f50_nivel_interactividad'=>$request->
                    //'f50_rowid_postura'

                    //'f50_correo'=>$request->email=>
                    //'f50_fecha'=>$request->fecha=>
                    //'f50_rowid_medio_comunic'=>$request->iptMedioComunicacion=>
                    //'f50_rowid_tema_relevante'=>$request->num_sig=>
                    //'f50_observacion'=>$request->observacion
                ]
            )->get(['f50_rowid'])->last();
            
            //Se crea objeto anonimo para guardar los temas relacionados            
            $vObjTemaRel = new \stdClass();

            //Se extraen los elementos que conforma el formulario
            $vObjTemporal= $request->request;

            //Se recorre los elementos del formulario para tomar los del tema relacionado
            foreach ($vObjTemporal as $clave => $valor) {
             
                if( strcmp(substr($clave,0,10),'selectTema') == 0 && $valor != 0){
                    
                    $vStrRowidTema= substr($clave,10,2);

                    TemaFormulario::create([
                        'f200_rowid_tema'=>$vStrRowidTema,
                        'f200_rowid_formulario'=>$vIntRowidFormulario->f50_rowid,
                        'f200_valor'=>$valor
                    ]);
                    
                };

            };
            

            if(empty($request->inputLink1) == false){
                    Link::create([
                        'f18_descripcion'=>$request->inputLink1,
                        'f18_rowid_formulario'=>$vIntRowidFormulario->f50_rowid
                    ]);
            };
            
            
            
            
            
            
            DB::commit();





            // return response()
            // ->json(['status' => true]);
            return view('frmConfirmacion',['strMensaje'=>'Creacion exitosa','return'=>'prensa-internacional']);
                
        } catch (\Throwable $th) {
            DB::rollBack();
            //abort(500,$th->getMessage());
            echo $th->getMessage();
        }




        
        //return redirect()->route('prensa-internacional.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
