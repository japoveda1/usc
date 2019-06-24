<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
       /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f12_rowid',
        'f12_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t12_tema";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f12_rowid';

    public $timestamps = false;
}
