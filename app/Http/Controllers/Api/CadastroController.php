<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class CadastroController extends Model
{
    public function __construct(UsuarioRepository $usuarioRepository)
    {
        parent::__construct();
        $this->usuario = $usuarioRepository;
    }

    public function cadastro(Request $request)
    {
        $request->token;
        $token = 'secretary' . date('dmY');
        if ($request->token == md5($token)) {
            if (Usuario::create($usuario)) {

            }

            dd($x);

        }
    }

}
