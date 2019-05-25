<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    const TIPO_INTERNO = 1;
    const TIPO_RESTAURANTE = 2;

    protected $table = 'empresas';

    protected $fillable = [
        'nome',
        'tipo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
