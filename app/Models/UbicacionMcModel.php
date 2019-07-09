<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UbicacionMcModel extends Model
{
                  /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f13_rowid',
        'f13_descripcion',
        'f13_relevancia',
        'f13_id'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t13_ubicacion_mc";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f13_rowid';

    public $timestamps = false;
}
