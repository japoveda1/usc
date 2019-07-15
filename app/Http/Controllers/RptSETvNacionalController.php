<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MedioComunicacion;
use App\Estructura;
use App\Models\AmbitoModel;
use App\Models\CandidatoModel;

class RptSETvNacionalController extends Controller
{
    public function index($id)
    {

        $vIntAmbito=0;
        $vIntEstructura=0;
        $vStrTitulo ='';

        if($id==1){//tv nacional
            $vIntAmbito=2;
            $vIntEstructura=2;
            $vStrTitulo='Reporte Seguimiento Electoral Television Nacional';

        }else if($id==2){//tvregional

            $vIntAmbito=1;
            $vIntEstructura=2;
            $vStrTitulo='Reporte Seguimiento Electoral Television Regional';
            
        }else if($id==3){//MD nacional

            $vIntAmbito=2;
            $vIntEstructura=5;
            $vStrTitulo='Reporte Seguimiento Electoral Medios Digital Nacional';

        }else if($id==4){//MD regional

            $vIntAmbito=1;
            $vIntEstructura=5;
            $vStrTitulo='Reporte Seguimiento Electoral Medio Digital Regional';
        }


        //se obtienen los medios de comunicacion 
        //$vArrayMedioComunicacion= MedioComunicacion::where('f10_rowid_ambito', $vIntAmbito)->where('f10_rowid_estructura', $vIntEstructura)->get();
        $vArrayMedioComunicacion= MedioComunicacion::all();
        
        // tipos de medios 
        $vArrayEstructura = Estructura::all();

        $vArrayCandidatos = CandidatoModel::all();

        $vArrayAmbito = AmbitoModel::all();
        
        return view('frmRptSeguiemientoElect',[
            'post'=>'/consultarSETvInter',
            'strTituloFormulario'=> 'Reporte Seguimiento Electoral',
            'seccion'=> '0',
            'ArrayMedioComunicacion'=>$vArrayMedioComunicacion,
            'ArrayEstructura'=> $vArrayEstructura,
            'ArrayAmbito'=>$vArrayAmbito,
            'ArrayCandidatos'=>$vArrayCandidatos,
            'resultado'=>[],
            'presentacionRpt'=>'99']
        );
        
        
    }

    public function consultar(Request $request){
        
        $sql='';
        $resultado=[];
        $vStrReporte=99;  
        $vStrNombreView='';   
        
         
        //Identicar que reporte se desea obtener
         switch ($request->selectReporte) {
            case 1:// Tema relevante
                                
            $this->validate($request,
            [
                'selectMedioComunic'=>'required',
            ],
            [
                'selectMedioComunic.required'=>'Para el reporte "Tema relevante" es obligatorio el medio de comunicacion',
            ]);
    
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
                        and (f50_fecha >= (:desde)  or (:desde)  is null )
                        and (f50_fecha <= (:hasta) or (:hasta)  is null )
                        and f50_rowid_ambito =(:ambito)
                        and f50_tipo=2
                        group by 
                        f14_descripcion,
                        f10_descripcion,
                        f12_descripcion,
                        0
                        ORDER BY f10_descripcion';

                        $vStrReporte=2;
                        $vStrNombreView='seguimiento_electoral.rpt_se_tema_relevante';
                    

                break;
            case 2://origen de la noticia 
            
            $vStrReporte=1;
            break;    

            case 3://tipo de recusro
        
            $vStrReporte=1;
            break;  
        
            case 4://etiquetas
        
            $vStrReporte=1;
            break;  
            case 5://intencion
        
            $vStrReporte=1;
            break;  
            case 6://fuentes
        
            $vStrReporte=1;
            break;  
            case 7://Genero Periodistico
        
            $vStrReporte=1;
            break;  
            case 8://tipo Genero Periodistico
        
            $vStrReporte=1;
            break;  
            case 9://ubicacion
        
            $vStrReporte=1;
            break;  
            case 10://relevante
        
            $vStrReporte=1;
            break;  
            case 11://canditos
                //validar si viene marcado el candidato
            $vStrReporte=1;
            break;  
            case 12://
        
            $vStrReporte=1;
            break;  
        }


        //Reporte de observaciones
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
                    and f50_rowid_ambito =(:ambito)
                    ORDER BY f10_descripcion,f50_fecha';

            $vStrReporte=3;

        };


        $resultado=DB::select($sql ,
        ['ambito'=>$request->selectAmbito,
        'medio_comunic'=>$request->selectMedioComunic ,
        'tipo_medio'=>$request->selectEstructura,
        'desde'=>$request->inputFechaDesde,
        'hasta'=>$request->inputFechaHasta ]
        );

         //observacion 

        if ($request->selectReporte ==1){
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

        return view($vStrNombreView,//Nombre de la forma ,depende del reporte
                    ['resultado'=>$resultado,//datos a mostrar
                     'presentacionRpt'=>$request->selectPresentacionRpt]//Si es tabla o grafico
                    );
    }
}
