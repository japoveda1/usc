<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatoFormularioModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f202_rowid',
        'f202_rowid_candidato',
        'f202_rowid_formulario'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t202_candidato_formulario";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f202_rowid';

    public $timestamps = false;
}
