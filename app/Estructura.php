<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
           /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f14_rowid',
        'f14_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t14_estructura";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f14_rowid';

    public $timestamps = false;
}
