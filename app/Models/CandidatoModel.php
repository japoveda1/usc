<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatoModel extends Model
{
             /**
     * Definicion de los campos seleccionables
     */
    protected $fillable = [
        'f15_rowid',
        'f15_descripcion',
        'f15_rowid_cargo'
        //'created_at',
        //'updated_at'
    ];

    /**
     * Definicion del nombre de la tabla
     */
    protected $table = "t15_candidato";

    /**
     * Definicion de la llave primaria
     */
    protected $primaryKey = 'f15_rowid';

    public $timestamps = false;
}
