<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class VisitaStatusVisita extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'visitas_status_visitas';

    protected $fillable = [
        'status_visitas_id',
        'visita_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function status_visitas()
    {
        return $this->belongsTo(\App\Models\StatusVisita::class, 'status_visitas_id');
    }

    public function visitas()
    {
        return $this->belongsTo(\App\Models\Visita::class, 'visita_id');
    }

}
