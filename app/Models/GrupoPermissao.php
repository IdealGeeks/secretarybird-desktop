<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jan 2019 15:16:35 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GrupoPermissao
 *
 * @property int $grupo_id
 * @property int $permissao_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Permissao $permissao
 * @property \App\Models\Grupo $grupo
 *
 * @package App\Models
 */
class GrupoPermissao extends Eloquent
{

    protected $casts = [
        'grupo_id' => 'int',
        'permissao_id' => 'int'
    ];

    protected $fillable = [
        'grupo_id',
        'permissao_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = 'grupos_permissoes';

    public function permissao()
    {
        return $this->belongsTo(\App\Models\Permissao::class, 'permissao_id');
    }

    public function grupo()
    {
        return $this->belongsTo(\App\Models\Grupo::class, 'grupo_id');
    }
}
