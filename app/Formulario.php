<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f50_estado',
        'f50_descripcion',
        'f50_correo',
        'f50_fecha',
        'f50_rowid_medio_comunic',
        'f50_rowid_tema_relevante',
        'f50_observacion',
        'f50_rowid_ambito',
        'f50_rowid_estructura',
        'f50_nativo_digital',
        'f50_titular_medio_comunic',
        'f50_rowid_archivo',
        'f50_titular_solo_portada',
        'f50_titular_solo_interior',
        'f50_titular_interior_1',
        'f50_titular_interior_2',
        'f50_titular_interior_3',
        'f50_titular_interior_4',
        'f50_titular_interior_5',
        'f50_rowid_candidato_alcaldia',
        'f50_rowid_candidato_gobern',
        'f50_id_origen_noticia',
        'f50_rowid_ubicacion',
        'f50_rowid_intencion',
        'f50_ind_identificacion_fuente',
        'f50_rowid_pertinecia_fuente',
        'f50_equilibrio_fuente',
        'f50_relevancia_valor',
        'f50_rowid_genero_periodistico',
        'f50_lo_ve',
        'f50_gusta',
        'f50_comentarios',
        'f50_compartido',
        'f50_nivel_interactividad',
        'f50_rowid_postura',
        'f50_rowid_subgenero_perio',
        'f50_tipo'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t50_formulario";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f50_rowid';

    public $timestamps = false;
}
