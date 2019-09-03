<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\MedioComunicacion;
use App\Estructura;
use App\Models\AmbitoModel;
use App\Models\CandidatoModel;
use Illuminate\Support\Facades\Storage;

class RptSETvNacionalController extends Controller
{
    public function index($id)
    {


        $vArrayMedioComunicacion= MedioComunicacion::all();

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

    public function descargarRecurso($id){
    //PDF file is stored under project/public/download/info.pdf

        $file= public_path(). "/images/".$id;

        $headers = [
                    'Content-Type' => 'application/jpg',
                ];

        return response()->download($file, 'kritica.jpg', $headers);
    }

    public function consultar(Request $request){
        
        $sql='';
        $resultado=[];
        $vBlnPorcentaje=false;  
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
                        count(f12_rowid) f_frec,
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
                        and f50_tipo=(:tipo_formulario)
                        group by 
                        f14_descripcion,
                        f10_descripcion,
                        f12_descripcion,
                        0
                        ORDER BY f10_descripcion';

                        $vBlnPorcentaje=true;
                        $vStrNombreView='seguimiento_electoral.rpt_se_tema_relevante';
                    

                break;
            case 2://origen de la noticia 
                
                $sql='  SELECT
                            f10_descripcion     f_medio_descripcion,
                            f14_descripcion     f_tipo_medio,
                            f17_descripcion     f_desc,
                            COUNT(f17_rowid)    f_frec
                        FROM
                            t50_formulario           f50
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50.f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50.f50_rowid_estructura
                            INNER JOIN t17_origen_noticia       t17 ON t17.f17_rowid = f50.f50_id_origen_noticia
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY 
                        f14_descripcion,
                            f10_descripcion,
                            f17_descripcion';

                $vBlnPorcentaje=true;
                $vStrNombreView='seguimiento_electoral.rpt_se_origen_noticia';
                
            break;    

            case 3://tipo de recusro

                $sql='SELECT
                            f10_descripcion       f_medio_descripcion,
                            f14_descripcion       f_tipo_medio,
                            t19.f19_descripcion   f_desc,
                            COUNT(t19.f19_rowid) f_frec
                        FROM
                            t28_titulares_ubicacion   t28
                            INNER JOIN t50_formulario            t50 ON t50.f50_rowid = t28.f28_rowid_formulario
                            INNER JOIN t10_medio_comunicacion    t10 ON t10.f10_rowid = t50.f50_rowid_medio_comunic
                            INNER JOIN t14_estructura            t14 ON t14.f14_rowid = t50.f50_rowid_estructura
                            INNER JOIN t19_tipo_recurso          t19 ON t19.f19_rowid = t28.f28_rowid_tipo_recurso
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            t19.f19_descripcion';
                $vBlnPorcentaje=true;
                $vStrNombreView='seguimiento_electoral.rpt_se_tipo_recurso';
            break;  
        
            case 4://etiquetas
                $sql='SELECT
                            f10_descripcion     f_medio_descripcion,
                            f14_descripcion     f_tipo_medio,
                            f20_descripcion     f_desc,
                            COUNT(f20_rowid)    f_frec
                        FROM
                            t20_etiqueta
                            INNER JOIN t50_formulario ON f50_rowid = f20_rowid_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                        WHERE
                        f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f20_descripcion';
                                            $vBlnPorcentaje=true;

                $vStrNombreView='seguimiento_electoral.rpt_se_etiquetas';
            break;  
            case 5://intencion
            $sql='SELECT
                        f10_descripcion   f_medio_descripcion,
                        f14_descripcion   f_tipo_medio,
                        f21_descripcion   f_desc,
                        COUNT(f21_rowid) f_frec
                    FROM
                        t50_formulario
                        INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                        INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                        INNER JOIN t21_intencion ON f21_rowid = f50_rowid_intencion
                    WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                    GROUP BY
                        f14_descripcion,
                        f10_descripcion,
                        f21_descripcion';
                                        $vBlnPorcentaje=true;

                $vStrNombreView='seguimiento_electoral.rpt_se_intencion';
            break;  
            case 6://fuentes
                $sql='SELECT
                            f10_descripcion   f_medio_descripcion,
                            f14_descripcion   f_tipo_medio,
                            f22_descripcion   f_desc,
                            COUNT(f22_rowid) f_frec
                        FROM
                            t50_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                            INNER JOIN t22_fuente ON f22_rowid = f50_ind_identificacion_fuente
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f22_descripcion';
                                            $vBlnPorcentaje=true;

                $vStrNombreView='seguimiento_electoral.rpt_se_fuente';
            break;  
            case 7://Genero Periodistico
                $sql='SELECT
                            f10_descripcion   f_medio_descripcion,
                            f14_descripcion   f_tipo_medio,
                            f24_descripcion   f_desc,
                            COUNT(f24_rowid)  f_frec
                        FROM
                            t50_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                            INNER JOIN t24_genero_periodistico ON f24_rowid = f50_rowid_genero_periodistico
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f24_descripcion';
                                            $vBlnPorcentaje=true;

                $vStrNombreView='seguimiento_electoral.rpt_se_gen_perio';
            break;  
            case 8://tipo Genero Periodistico
                $sql='SELECT
                            f10_descripcion   f_medio_descripcion,
                            f14_descripcion   f_tipo_medio,
                            f24_descripcion   f_desc_genero,
                            f27_descripcion   f_desc,
                            COUNT(f27_rowid)  f_frec
                        FROM
                            t50_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                            INNER JOIN t27_subgen_periodistico ON f27_rowid = f50_rowid_subgenero_perio
                            INNER JOIN t24_genero_periodistico ON f24_rowid = f27_rowid_gen_perio
                        WHERE
                        f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f24_descripcion,
                            f27_descripcion';
                                            $vBlnPorcentaje=true;

                $vStrNombreView='seguimiento_electoral.rpt_se_tipo_gen_perio';
            break;  
            case 9://ubicacion
                $sql='SELECT
                            f10_descripcion   f_medio_descripcion,
                            f14_descripcion   f_tipo_medio,
                            f13_descripcion   f_desc,
                            COUNT(f13_rowid) f_frec
                        FROM
                            t50_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                            INNER JOIN t13_ubicacion_mc ON f13_rowid = f50_rowid_ubicacion
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f13_descripcion';
                                            $vBlnPorcentaje=true;

                $vStrNombreView='seguimiento_electoral.rpt_se_ubicacion';
            break;  
            case 10://interactividad
                $sql='SELECT
                            f10_descripcion   f_medio_descripcion,
                            f14_descripcion   f_tipo_medio,
                            f15_descripcion   f_desc_candidato,
                            f16_descripcion   f_desc_cargo,
                            sum(f50_lo_ve) f_lo_ve,
                            sum(f50_gusta) f_gusta_like,
                            sum(f50_comentarios) f_comentario,
                            sum(f50_compartido) f_compartido,
                            max(f50_nivel_interactividad) f_nivel_inter
                        FROM
                            t50_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                            LEFT JOIN t202_candidato_formulario ON f202_rowid_formulario = f50_rowid
                            LEFT JOIN t15_candidato ON f15_rowid = f202_rowid_candidato
                            LEFT JOIN t16_cargo ON f16_rowid = f15_rowid_cargo
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  or (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                            AND (f202_rowid_candidato = (:candidato) OR (:candidato) IS NULL)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f15_descripcion,
                            f16_descripcion,
                            f50_lo_ve,
                            f50_gusta,
                            f50_comentarios,
                            f50_compartido,
                            f50_nivel_interactividad';

                $vStrNombreView='seguimiento_electoral.rpt_se_nivel_interactividad';
            break;  
            case 11://canditos
                //validar si viene marcado el candidato
                $sql='SELECT
                            f10_descripcion   f_medio_descripcion,
                            f14_descripcion   f_tipo_medio,
                            f15_descripcion   f_desc_candidato,
                            f16_descripcion   f_desc_cargo,
                            COUNT(f15_rowid) f_frec
                        FROM
                            t202_candidato_formulario
                            INNER JOIN t50_formulario           t50 ON t50.f50_rowid = f202_rowid_formulario
                            INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = t50.f50_rowid_medio_comunic
                            INNER JOIN t14_estructura           t14 ON t14.f14_rowid = t50.f50_rowid_estructura
                            INNER JOIN t15_candidato ON f15_rowid = f202_rowid_candidato
                            INNER JOIN t16_cargo ON f16_rowid = f15_rowid_cargo
                        WHERE
                            f50_rowid_ambito = (:ambito)
                            AND f50_rowid_estructura = (:tipo_medio)
                            AND f50_rowid_medio_comunic = (:medio_comunic)
                            AND ( f50_fecha >= (:desde)  OR (:desde) IS NULL )
                            AND ( f50_fecha <= (:hasta)  OR (:hasta) IS NULL )
                            AND f50_tipo = (:tipo_formulario)
                            AND (f202_rowid_candidato = (:candidato) OR (:candidato) IS NULL)
                        GROUP BY
                            f14_descripcion,
                            f10_descripcion,
                            f15_descripcion,
                            f16_descripcion';

                $vBlnPorcentaje=true;

                
                $vStrNombreView='seguimiento_electoral.rpt_se_candidatos';
            break; 
            
            case 12: //Observacion

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
                            LEFT JOIN t202_candidato_formulario ON f202_rowid_formulario = f50_rowid
                            LEFT JOIN t15_candidato ON f15_rowid = f202_rowid_candidato
                            LEFT JOIN t16_cargo ON f16_rowid = f15_rowid_cargo
                        where 
                            (t10.f10_rowid =  (:medio_comunic) or (:medio_comunic)  is null)
                            and f50_rowid_ambito = (:ambito)
                            and (f14_rowid =(:tipo_medio) or (:tipo_medio) is null)
                            and (f50_fecha >= (:desde)  or (:desde)  is null )
                            and (f50_fecha <= (:hasta) or (:hasta)  is null )
                            and f50_rowid_ambito =(:ambito)
                            AND f50_tipo = (:tipo_formulario)
                            AND (f202_rowid_candidato = (:candidato) OR (:candidato) IS NULL)
                        ORDER BY f10_descripcion,f50_fecha desc';
                
                $vStrNombreView='seguimiento_electoral.rpt_se_observacion';
            break;
            case 13://Links
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
                            and f50_rowid_ambito =(:ambito)
                            AND f50_tipo = (:tipo_formulario)
                            AND (f202_rowid_candidato = (:candidato) OR (:candidato) IS NULL)
                        order by
                            f50_fecha DESC';
            
            $vStrNombreView='seguimiento_electoral.rpt_se_link';
            break;
            case 14 :

            $sql='SELECT
                        f10_descripcion   f_medio_descripcion,
                        f14_descripcion   f_tipo_medio,
                        f26_descripcion   f_desc,
                        f50_titular_medio_comunic f_titulo,
                        f50_fecha         f_fecha 
                    FROM
                        t50_formulario
                        INNER JOIN t10_medio_comunicacion   t10 ON t10.f10_rowid = f50_rowid_medio_comunic
                        INNER JOIN t14_estructura           t14 ON t14.f14_rowid = f50_rowid_estructura
                        inner join t26_archivo              t26 on t26.f26_rowid  =f50_rowid_archivo
                        LEFT JOIN t202_candidato_formulario ON f202_rowid_formulario = f50_rowid
                        LEFT JOIN t15_candidato ON f15_rowid = f202_rowid_candidato
                        LEFT JOIN t16_cargo ON f16_rowid = f15_rowid_cargo
                    WHERE
                    (t10.f10_rowid =  (:medio_comunic) or (:medio_comunic)  is null)
                    and f50_rowid_ambito = (:ambito)
                    and (f14_rowid =(:tipo_medio) or (:tipo_medio) is null)
                    and (f50_fecha >= (:desde)  or (:desde)  is null )
                    and (f50_fecha <= (:hasta) or (:hasta)  is null )
                    and f50_rowid_ambito =(:ambito)
                    AND f50_tipo = (:tipo_formulario)
                    AND (f202_rowid_candidato = (:candidato) OR (:candidato) IS NULL)';
            
            $vStrNombreView='seguimiento_electoral.rpt_se_recursos_adjuntos';

            break;

        }



        if($request->selectReporte ==11 || $request->selectReporte ==10 || $request->selectReporte ==12||$request->selectReporte ==13||
        $request->selectReporte ==14   ){
            $resultado=DB::select($sql ,
            ['ambito'=>$request->selectAmbito,
            'medio_comunic'=>$request->selectMedioComunic ,
            'tipo_medio'=>$request->selectEstructura,
            'desde'=>$request->inputFechaDesde,
            'hasta'=>$request->inputFechaHasta,
            'tipo_formulario'=>2,
            'candidato'=>$request->selectNombreCandit]
            );

        }else{
            $resultado=DB::select($sql ,
            ['ambito'=>$request->selectAmbito,
            'medio_comunic'=>$request->selectMedioComunic ,
            'tipo_medio'=>$request->selectEstructura,
            'desde'=>$request->inputFechaDesde,
            'hasta'=>$request->inputFechaHasta,
            'tipo_formulario'=>2 ]
            );
        }

        


         //observacion 

        if ($vBlnPorcentaje){
            $vIntPorcentaje=0;
            
            foreach ($resultado as &$res) {
                $vIntPorcentaje =$vIntPorcentaje+ $res->f_frec;
            }

            unset($res);

            foreach ($resultado as &$res) {
                $res->f_porcentaje  =round((100 * $res->f_frec)/$vIntPorcentaje,1);
            }

            unset($res);
           
        }

        return view($vStrNombreView,//Nombre de la forma ,depende del reporte
                    ['resultado'=>$resultado,//datos a mostrar
                     'presentacionRpt'=>$request->selectPresentacionRpt]//Si es tabla o grafico
                    );
    }


    
}
