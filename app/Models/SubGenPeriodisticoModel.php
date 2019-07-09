<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubGenPeriodisticoModel extends Model
{
    /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f27_rowid',
        'f27_descripcion',
        'f27_rowid_gen_perio'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t27_subgen_periodistico";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f27_rowid';

    public $timestamps = false;
}
