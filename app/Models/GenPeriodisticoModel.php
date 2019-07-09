<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenPeriodisticoModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f24_rowid',
        'f24_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t24_genero_periodistico";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f24_rowid';

    public $timestamps = false;
}
