<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtiquetasModel extends Model
{
                 /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f20_rowid',
        'f20_descripcion',
        'f20_rowid_formulario'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t20_etiqueta";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f20_rowid';

    public $timestamps = false;
}
