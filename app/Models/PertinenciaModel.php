<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PertinenciaModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f23_rowid',
        'f23_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t23_pertinencia_fuente";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f23_rowid';

    public $timestamps = false;
}
