<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
               /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f26_rowid',
        'f26_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t26_archivo";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f26_rowid';

    public $timestamps = false;
}
