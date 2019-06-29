<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemaFormulario extends Model
{
           /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f200_rowid_tema',
        'f200_rowid_formulario',
        'f200_valor'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t200_tema_formulario";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f200_rowid';

    public $timestamps = false;
}
