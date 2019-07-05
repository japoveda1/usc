<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MedioComunicacion;
use App\Estructura;

class RptTvNacionalController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }
    
    public function index($id)
    {
        //se obtienen los medios de comunicacion 
        $vArrayMedioComunicacion= MedioComunicacion::where('f10_rowid_ambito', 2)->where('f10_rowid_estructura',2)->get();

        //Se obtienen los tipos de medios 
        $vArrayEstructura = Estructura::all();
        
        return view('frmRptPrensaInternacional',[
            'post'=>'/consultarTvNac',
            'strTituloFormulario'=> 'Reporte Television Nacional',
            'seccion'=> '0',
            'ArrayMedioComunicacion'=>$vArrayMedioComunicacion,
            'ArrayEstructura'=> $vArrayEstructura,
            'resultado'=>[],
            'presentacionRpt'=>'99']
        );
        
        ;
    }

    public function consultar(Request $request){
        
        $sql='';
        $resultado=[];
        $vStrReporte=99;    

         //identificar la presentacion del reporte tabla o grafico
        // se retorna el   $request->selectPresentacionRpt


         //identificar que reporte frecuencia relevante 
         switch ($request->selectReporte) {
            case 1: 
                    //FRECUENCIA DE TEMA X MEDIO DE COMUNICACION  Y TIPO DE MEDIO
                $sql= 'SELECT 
                    t14.f14_descripcion as f_tipo_medio, 
                    t10.f10_descripcion as f_medio_descripcion,
                    t12.f12_descripcion as f_tema_descripcion,
                    sum(t200.f200_valor) as f_frecuencia
                    from t200_tema_formulario t200
                    inner join t12_tema t12 on f12_rowid = t200.f200_rowid_tema
                    inner join t50_formulario t50 on f50_rowid = t200.f200_rowid_formulario
                    inner join t10_medio_comunicacion t10 on t10.f10_rowid= t50.f50_rowid_medio_comunic
                    inner join t14_estructura t14 on t14.f14_rowid = t50.f50_rowid_estructura 
                    where (t10.f10_rowid = (:medio_comunic) or (:medio_comunic)  is null )
                    and (f50_rowid_estructura = (:tipo_medio) or (:tipo_medio)  is null )
                    and (f50_fecha >= (:desde)  or (:desde)  is null )
                    and (f50_fecha <= (:hasta) or (:hasta)  is null )
                    and f50_rowid_ambito =2
                    and f50_rowid_estructura = 2
                    GROUP by 
                    t14.f14_descripcion,
                    t10.f10_descripcion,
                    t12.f12_descripcion
                    order by t10.f10_descripcion';
                    
                    $vStrReporte=1;
                /*$res_frec_tema=DB::select($sql_frecuen_tema ,
                        ['medio_comunic'=>$request->selectMedioComunic ,
                        'tipo_medio'=>$request->selectEstructura,
                        'desde'=>$request->inputFechaDesde,
                        'hasta'=>$request->inputFechaHasta ]
                );*/
                break;
            case 2:

                $sql='SELECT
                        f10_descripcion f_medio_descripcion,
                        f14_descripcion f_tipo_medio,
                        f12_descripcion f_tema_descripcion ,
                        t50.f50_fecha  f_fecha
                        FROM 
                        t50_formulario t50
                        inner join t12_tema t12 on t12.f12_rowid = f50_rowid_tema_relevante
                        inner join t10_medio_comunicacion t10 on t10.f10_rowid =f50_rowid_medio_comunic
                        inner join t14_estructura t14 on t14.f14_rowid =  f50_rowid_estructura
                        where (t10.f10_rowid =  (:medio_comunic) or (:medio_comunic)  is null)
                        and (f14_rowid =(:tipo_medio) or (:tipo_medio) is null)
                        and (f50_fecha >= (:desde)  or (:desde)  is null )
                        and (f50_fecha <= (:hasta) or (:hasta)  is null )
                        and f50_rowid_ambito =2
                        group by 
                        f14_descripcion,
                        f10_descripcion,
                        f12_descripcion,
                        t50.f50_fecha
                        ORDER BY f10_descripcion,f50_fecha';

                        $vStrReporte=2;
                    
                break;

                
        }

        if(strcmp($request->checkObservacion,'on') == 0){
            $sql= 'SELECT
                    t10.f10_descripcion f_medio_descripcion,
                    t50.f50_observacion f_observacion,
                    f50_fecha f_fecha,
                    f50_correo f_correo
                    FROM 
                    t50_formulario t50
                    inner join t12_tema t12 on t12.f12_rowid = f50_rowid_tema_relevante
                    inner join t10_medio_comunicacion t10 on t10.f10_rowid =f50_rowid_medio_comunic
                    inner join t14_estructura t14 on t14.f14_rowid =  f50_rowid_estructura
                    where (t10.f10_rowid =  (:medio_comunic) or (:medio_comunic)  is null)
                    and (f14_rowid =(:tipo_medio) or (:tipo_medio) is null)
                    and (f50_fecha >= (:desde)  or (:desde)  is null )
                    and (f50_fecha <= (:hasta) or (:hasta)  is null )
                    and f50_rowid_ambito =2
                    ORDER BY f10_descripcion,f50_fecha';

            $vStrReporte=3;

        };



        $resultado=DB::select($sql ,
        ['medio_comunic'=>$request->selectMedioComunic ,
        'tipo_medio'=>$request->selectEstructura,
        'desde'=>$request->inputFechaDesde,
        'hasta'=>$request->inputFechaHasta ]
        );

         //observacion 




       // $sql_tema_relevante= 'SELECT'

        /*$v = DB::table('t200_tema_formulario as t200')
            ->Join('t12_tema as t12', 't12.f12_rowid', '=', 't200.f200_rowid_tema')
            ->Join('t50_formulario as t50', 't50.f50_rowid', '=', 't200.f200_rowid_formulario')
            ->Join('t10_medio_comunicacion as t10 ', 't10.f10_rowid', '=', 't50.f50_rowid_medio_comunic')
            ->Join('t14_estructura as t14 ', 't14.f14_rowid', '=', 't50.f50_rowid_estructura')
            ->select(
                't14.f14_descripcion as f_tipo_medio',
                't10.f10_descripcion as f_medio_descripcion',
                't12.f12_descripcion as f_tema_descripcion',
                DB::raw('SUM(t200.f200_valor) as f_frecuencia'))
                
            ->whereColumn('t10.f10_rowid', $request->selectMedioComunic ) 
                ->orWhereColumn($request->selectMedioComunic ,$request->selectMedioComunic ) 
            ->whereColumn('t50.f50_rowid_estructura', $request->selectEstructura ) 
                ->orWhereColumn($request->selectEstructura ,$request->selectEstructura ) 
            ->whereColumn('t50.f50_fecha', $request->inputFechaDesde ) 
                ->orWhereColumn($request->inputFechaDesde ,$request->inputFechaDesde ) 
            ->whereColumn('t50.f50_fecha', $request->inputFechaHasta ) 
                ->orWhereColumn($request->inputFechaHasta ,$request->inputFechaHasta ) 
            ->groupBy(
                't14.f14_descripcion',
                't10.f10_descripcion',
                't12.f12_descripcion')
            ->orderBy('t10.f10_descripcion')
            ->get();*/
            
            //dd( $v );
            /*
            DB::table('users')
            ->where('name', '=', 'John')
            ->where(function ($query) {
                $query->where('votes', '>', 100)
                      ->orWhere('title', '=', 'Admin');
            })
            ->get();*/

        return view('frmRptPrensaInternacional',
                    ['seccion'=>$vStrReporte,
                    'resultado'=>$resultado,
                    'presentacionRpt'=>$request->selectPresentacionRpt]);
    }
}
