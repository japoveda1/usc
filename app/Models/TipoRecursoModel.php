<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRecursoModel extends Model
{
     /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f19_rowid',
        'f19_descripcion',
        'f19_id'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t19_tipo_recurso";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f19_rowid';

    public $timestamps = false;
}
