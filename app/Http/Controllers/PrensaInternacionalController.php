<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MedioComunicacion;
use App\Tema;
use App\Models\PrensaInternacionalModel;

class PrensaInternacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //se obtienen los medios de comunicacion 
         $vArrayMedioComunicacion= MedioComunicacion::all();

         //Se obtienen los temas
         $vArrayTema= Tema::all();
 
         //
         return view('frmPrensaInternacional',[
             'ArrayMedioComunicacion'=>$vArrayMedioComunicacion,
             'ArrayTema'=>$vArrayTema]
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
        try {
            //$validated = $request->validated();

            DB::beginTransaction();

            PrensaInternacionalModel::create(
                [
                    'f50_rowid'=>1,
                    'f50_correo'=>$request->email,
                    'f50_fecha'=>$request->fecha,
                    'f50_rowid_medio_comunic'=>$request->iptMedioComunicacion,
                    //'f50_rowid_tema_relevante'=>$request->num_sig,
                    'f50_observacion'=>$request->observacion
                ]
            );

            DB::commit();

            // return response()
            // ->json(['status' => true]);

        } catch (\Throwable $th) {
            DB::rollBack();
            //abort(500,$th->getMessage());
            echo $th->getMessage();
        }
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
