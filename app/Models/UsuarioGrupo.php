<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Dec 2018 18:28:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UsuarioGrupo
 * 
 * @property int $id
 * @property int $usuario_id
 * @property int $grupo_id
 * 
 * @property \App\Models\Usuario $usuario
 * @property \App\Models\Grupo $grupo
 *
 * @package App\Models
 */
class UsuarioGrupo extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'usuario_id' => 'int',
		'grupo_id' => 'int'
	];

	protected $fillable = [
		'usuario_id',
		'grupo_id'
	];

	protected $table = 'usuarios_grupos';

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'usuario_id');
	}

	public function grupo()
	{
		return $this->belongsTo(\App\Models\Grupo::class, 'grupo_id');
	}
}
