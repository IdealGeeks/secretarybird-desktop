<?php

namespace App\Models;

use Carbon\Carbon;
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
        'tipo_visita',
        'empresa_id',
        'usuario_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'horario',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tipo_visita',
        'empresa_id',
        'usuario_id',
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

    public function responsavel()
    {
        return $this->usuarios()->with('setor');
    }

    public function natureza()
    {
        return $this->tipos_visitas();
    }

    public function status()
    {
        return $this->status_visitas();
    }

    public function getHorarioAttribute($value)
    {
        $value =  Carbon::createFromFormat('Y-m-d H:i:s', $value);
        return $value->format('d/m/Y'). ' às ' . $value->format('H:i');
    }
}
