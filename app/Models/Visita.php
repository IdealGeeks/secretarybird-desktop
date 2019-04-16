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

    public function usuarios()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'usuario_id');
    }

    public function tipos_visitas()
    {
        return $this->belongsTo(\App\Models\TipoVisita::class, 'tipo_visita');
    }

    public function empresas()
    {
        return $this->belongsTo(\App\Models\Empresa::class, 'empresa_id');
    }

    public function status_visitas()
    {
        return $this->belongsToMany(\App\Models\StatusVisita::class, 'visitas_status_visitas', 'visita_id', 'status_visitas_id');
    }
}
