<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVisita extends Model
{
    protected $table = 'tipos_visitas';

    protected $fillable = [
        'titulo'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
