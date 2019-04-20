<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ApiVisitasRequest;
use App\Repositories\VisitaRepository;
use App\Http\Controllers\Controller;

class VisitasController extends Controller
{
    protected $visitas;

    /**
     * VisitasController constructor.
     * @param VisitaRepository $visitaRepository
     */
    public function __construct(VisitaRepository $visitaRepository)
    {
        parent::__construct();

        $this->visitas = $visitaRepository;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtemPorId($id)
    {
        try {
            if ($visita = $this->visitas->model()->where('id', $id)->with('responsavel', 'natureza', 'status')->first()) {
                return response()->json($visita, 200);
            }
            return response()->json(['message' => 'Visita não localizada.'], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function obtemTodos()
    {
        try {
            if ($visita = $this->visitas->model()->with('responsavel', 'natureza', 'status')->get()) {
                return response()->json($visita, 200);
            }
            return response()->json(['message' => 'Nenhuma visita foi encontrada na agenda.'], 200);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }
    }
}
