<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    public const SIM = 1;
    public const NAO = 2;

    protected $table = 'empresas';

    protected $fillable = [
        'nome',
        'interno',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getInternoAttribute($value)
    {
        return $value == self::SIM ? 'Sim' : 'Não';
    }
}
