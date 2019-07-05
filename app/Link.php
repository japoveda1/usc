<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
               /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f18_rowid',
        'f18_descripcion',
        'f18_rowid_formulario'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t18_link";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f18_rowid';

    public $timestamps = false;
}
