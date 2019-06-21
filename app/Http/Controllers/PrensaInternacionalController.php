<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrensaInternacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frmPrensaInternacional');
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
            $validated = $request->validated();

            DB::beginTransaction();

            ResolucionModel::create(
                [
                    'f051_num_res'=>$request->num_res,
                    'f051_fecha_exp_res'=>$request->fecha_res,
                    'f051_num_ini'=>$request->num_ini,
                    'f051_num_sig'=>$request->num_sig,
                    'f051_num_fin'=>$request->num_fin,
                    'f051_creado_por' =>Auth::id(),
                    'created_at'=>Carbon::now()->toDateTimeString()
                ]
            );

            DB::commit();

            return response()
            ->json(['status' => true]);

        } catch (\Throwable $th) {
            DB::rollBack();
            abort(500,$th->getMessage());
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
