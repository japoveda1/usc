<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MedioComunicacion;
use App\Estructura;
use App\Models\AmbitoModel;


class rptPrensaInterController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index($id)
    {
        //se obtienen los medios de comunicacion 
        $vArrayMedioComunicacion= MedioComunicacion::where('f10_rowid_ambito', 3)
                                                    ->where('f10_rowid_estructura',4)->get();

        //Se obtienen los tipos de medios 
        $vArrayEstructura = Estructura::all();

        $vArrayAmbito = AmbitoModel::all();

        
        return view('frmRptPrensaInternacional',[
            'post'=>'/consultarPrensaInter',
            'strTituloFormulario'=> 'Reporte Prensa Internacional',
            'seccion'=> '0',
            'ArrayMedioComunicacion'=>$vArrayMedioComunicacion,
            'ArrayEstructura'=> $vArrayEstructura,
            'ArrayAmbito'=>$vArrayAmbito,
            'resultado'=>[],
            'presentacionRpt'=>'99']
        );
        
        
    }

    public function consultar(Request $request){
        
        $sql='';
        $resultado=[];
        $vStrReporte=99;    

         //identificar la presentacion del reporte tabla o grafico
        // se retorna el   $request->selectPresentacionRpt
        
        if($request->selectMedioComunic == 2){

        };
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
                        and f50_rowid_ambito =(:ambito)
                        AND f50_tipo = (:tipo_formulario)
                        GROUP by 
                        t14.f14_descripcion,
                        t10.f10_descripcion,
                        t12.f12_descripcion
                        order by t10.f10_descripcion';
                    
                    $vStrReporte=1;
                break;
            case 2:

    
                //TEMA RELEVANTE X MEDIO DE COMUNICACION  Y TIPO DE MEDIO
                $sql='SELECT
                        f10_descripcion f_medio_descripcion,
                        f14_descripcion f_tipo_medio,
                        f12_descripcion f_tema_descripcion,
                        count(f12_rowid) f_cantidad,
                        0 f_porcentaje 
                        FROM 
                        t50_formulario t50
                        inner join t12_tema t12 on t12.f12_rowid = f50_rowid_tema_relevante
                        inner join t10_medio_comunicacion t10 on t10.f10_rowid =f50_rowid_medio_comunic
                        inner join t14_estructura t14 on t14.f14_rowid =  f50_rowid_estructura
                        where (t10.f10_rowid =  (:medio_comunic) or (:medio_comunic)  is null)
                        and (f14_rowid =(:tipo_medio) or (:tipo_medio) is null)
                        and (f50_rowid_estructura = (:tipo_medio) or (:tipo_medio)  is null )
                        and (f50_fecha >= (:desde)  or (:desde)  is null )
                        and (f50_fecha <= (:hasta) or (:hasta)  is null )
                        and f50_rowid_ambito =(:ambito)
                        AND f50_tipo = (:tipo_formulario)
                        group by 
                        f14_descripcion,
                        f10_descripcion,
                        f12_descripcion,
                        0
                        ORDER BY f10_descripcion';

                        $vStrReporte=2;
                    
                break;
            case 3:

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
                        and f50_rowid_ambito =(:ambito)
                        AND f50_tipo = (:tipo_formulario)
                        ORDER BY f10_descripcion,f50_fecha';

                $vStrReporte=3;

                break;
            case 4:
            $sql='SELECT
                        f10_descripcion   f_medio_descripcion,
                        f14_descripcion   f_tipo_medio,
                        f50_titular_medio_comunic f_titulo,
                        f18_descripcion   f_link,
                        f50_fecha         f_fecha,
                        f50_correo        f_correo
                    FROM
                        t50_formulario
                        INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                        INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                        INNER JOIN t18_link                 t18 ON t18.f18_rowid_formulario = f50_rowid
                        LEFT JOIN t202_candidato_formulario ON f202_rowid_formulario = f50_rowid
                        LEFT JOIN t15_candidato ON f15_rowid = f202_rowid_candidato
                        LEFT JOIN t16_cargo ON f16_rowid = f15_rowid_cargo
                    WHERE
                        (t10.f10_rowid =  (:medio_comunic) or (:medio_comunic)  is null)
                        and f50_rowid_ambito = (:ambito)
                        and (f14_rowid =(:tipo_medio) or (:tipo_medio) is null)
                        and (f50_fecha >= (:desde)  or (:desde)  is null )
                        and (f50_fecha <= (:hasta) or (:hasta)  is null )
                        AND f50_tipo = (:tipo_formulario)
                    order by
                        f50_fecha DESC';
            
            $vStrReporte=4;


            break;
                
        }

        $resultado=DB::select($sql ,
        ['medio_comunic'=>$request->selectMedioComunic ,
        'tipo_medio'=>$request->selectEstructura,
        'desde'=>$request->inputFechaDesde,
        'hasta'=>$request->inputFechaHasta,
        'ambito'=>$request->selectAmbito,
        'tipo_formulario'=>1
          ]
        );
            
         //observacion 

        if ($request->selectReporte ==2){
            $vIntPorcentaje=0;
            
            foreach ($resultado as &$res) {
                $vIntPorcentaje =$vIntPorcentaje+ $res->f_cantidad;
            }

            unset($res);

            foreach ($resultado as &$res) {
                $res->f_porcentaje  =round((100 * $res->f_cantidad)/$vIntPorcentaje,1);
            }

            unset($res);
           
        }


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
