<?php

namespace App\Http\Controllers\Api;


use App\Models\Status;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->token;
        $token = 'secretary' . date('dmY');
        if ($request->token == md5($token)) {
            if (Auth::guard('web')->attempt([
                'email' => $request->email,
                'password' => $request->password,
                'status_id' => Status::ATIVO,
            ])) {
                $usuario = Usuario::where('email', $request->email)->first();
                $arrayResponse['reponse'] = true;
                $arrayResponse['usuario'] = $usuario;
                echo json_encode($arrayResponse);
                die();
            }
            $arrayResponse['reponse'] = false;
            echo json_encode($arrayResponse);
            die();
        }
    }
}
