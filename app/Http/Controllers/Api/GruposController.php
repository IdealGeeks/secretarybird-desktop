<?php

namespace App\Http\Controllers\Api;

use App\Services\ControleAcessoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GruposController extends Controller
{
    private $controleAcessoService;

    public function __construct(ControleAcessoService $controleAcessoService)
    {
        parent::__construct();
        $this->controleAcessoService = $controleAcessoService;
    }

    public function buscar(Request $request)
    {
        $data = $this->controleAcessoService->processaPermissoesArray($request->get('id'), 'grupo', 'grupo_id');
        return response()->json($data);
    }

}
