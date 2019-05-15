<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 14 Jan 2019 15:16:35 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserRotaPermissao
 * 
 * @property int $usuario_id
 * @property int $permissao_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Permissao $permissao
 * @property \App\Models\Usuario $usuario
 *
 * @package App\Models
 */
class UsuarioPermissao extends Eloquent
{

	protected $casts = [
		'usuario_id' => 'int',
		'permissao_id' => 'int'
	];

	protected $fillable = [
		'usuario_id',
		'permissao_id'
	];

	protected $table = 'usuarios_permissoes';

	public function permissao()
	{
		return $this->belongsTo(\App\Models\Permissao::class, 'permissao_id');
	}

	public function usuario()
	{
		return $this->belongsTo(\App\Models\Usuario::class, 'usuario_id');
	}
}
