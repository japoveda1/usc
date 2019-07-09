<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuenteModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f22_rowid',
        'f22_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t22_fuente";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f22_rowid';

    public $timestamps = false;
}
