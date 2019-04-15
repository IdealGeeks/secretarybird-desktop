<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusVisita extends Model
{
    protected $table = 'status_visitas';

    protected $fillable = [
        'titulo'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function visitas()
    {
        return $this->belongsToMany(\App\Models\Visita::class, 'visitas_status_visitas', 'status_visitas_id', 'visita_id');
    }
}
