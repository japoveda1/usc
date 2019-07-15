<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AmbitoModel extends Model
{
           /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f11_rowid',
        'f11_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t11_ambito";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f11_rowid';

    public $timestamps = false;
}
