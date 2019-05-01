<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use Illuminate\Http\Response;

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
        $token = 'secretaryDiaDoTrabalhador';
        if ($request->token == md5($token)) {
            try {
                Usuario::create($request->all());
            } catch (\Exception $e) {
                return response('Email ou usuario errado', 200)
                    ->header('Content-Type','json');
            }
        }
    }

}
