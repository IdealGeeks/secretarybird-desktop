<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Visita extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'visitas';

    protected $fillable = [
        'nome',
        'horario',
        'detalhes',

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
