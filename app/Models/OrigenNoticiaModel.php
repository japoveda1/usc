<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrigenNoticiaModel extends Model
{
                 /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f17_rowid',
        'f17_descripcion',
        'f17_id'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t17_origen_noticia";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f17_rowid';

    public $timestamps = false;
}
