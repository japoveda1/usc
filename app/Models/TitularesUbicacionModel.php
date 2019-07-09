<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TitularesUbicacionModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f28_rowid',
        'f28_titular',
        'f28_rowid_formulario',
        'f28_rowid_tipo_recurso'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t28_titulares_ubicacion";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f28_rowid';

    public $timestamps = false;
}
