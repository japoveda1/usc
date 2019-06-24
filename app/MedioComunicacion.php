<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioComunicacion extends Model
{
           /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f10_rowid',
        'f10_descripcion',
        'f10_rowid_estructura',
        'f10_nativo_difgital',
        'f10_rowid_ambito'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t10_medio_comunicacion";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f10_rowid';

    public $timestamps = false;
}
