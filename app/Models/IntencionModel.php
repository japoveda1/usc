<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntencionModel extends Model
{
   
             /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f21_rowid',
        'f21_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t21_intencion";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f21_rowid';

    public $timestamps = false;
}
