<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Nov 2018 03:30:46 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Grupo
 *
 * @property int $id
 * @property string $titulo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $usuarios
 * @property \Illuminate\Database\Eloquent\Collection $grupos_permissoes
 *
 * @package App\Models
 */
class Grupo extends Eloquent
{
    use SoftDeletes;

    const WEBMASTER = 1;

    protected $fillable = [
        'titulo'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function usuarios()
    {
        return $this->belongsToMany(\App\Models\Usuario::class, 'usuarios_grupos', 'grupo_id', 'usuario_id');
    }

    public function grupos_permissoes()
    {
        return $this->belongsToMany(\App\Models\Permissao::class, 'grupos_permissoes', 'grupo_id', 'permissao_id');
    }

}
