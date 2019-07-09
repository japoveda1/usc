<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosturaPublicaModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f25_rowid',
        'f25_descripcion'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t25_postura_publica";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f25_rowid';

    public $timestamps = false;
}
