<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrensaInternacionalModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f051_id',
        'f051_num_res',
        'f051_fecha_exp_res',
        'f051_num_ini',
        'f051_num_sig',
        'f051_num_fin',
        'f051_creado_por',
        'f051_modificado_por',
        'created_at',
        'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t051_resoluciones";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f051_id';
}
