<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrensaInternacionalModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f50_rowid',
        'f50_correo',
        'f50_fecha',
        'f50_rowid_medio_comunic',
        'f50_rowid_tema_relevante',
        'f50_observacion'
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
