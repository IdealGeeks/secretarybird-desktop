<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\VisitaRepository;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
    }

    public function index(Request $request, VisitaRepository $visitaRepository)
    {
        $visitas = $visitaRepository->model()->orderBy('horario', 'ASC');
        if ($parametro = $request->search) {
            $visitas->where('nome', 'like', "%{$parametro}%")->orWhere('sobrenome', 'like', "%{$parametro}%")->orWhere('email', 'like', "%{$parametro}%");
        }
        return view('admin.usuarios.index', ['usuarios' => $usuarios->paginate(20)]);
    }
}
