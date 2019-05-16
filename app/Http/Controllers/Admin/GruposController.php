<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoRequest;
use App\Http\Requests\PesquisasRequest;
use App\Models\Grupo;
use App\Repositories\GrupoRepository;
use App\Services\ControleAcessoService;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    protected $grupos;

    /**
     * GruposController constructor.
     * @param GrupoRepository $grupoRepository
     */
    public function __construct(GrupoRepository $grupoRepository)
    {
        parent::__construct();
        $this->middleware('auth:admin');
        /** @var Grupo grupos */
        $this->grupos = $grupoRepository;
    }

    /**
     * @param PesquisasRequest $pesquisasRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PesquisasRequest $pesquisasRequest)
    {
        $grupos = $this->grupos->model()->orderBy('titulo', 'ASC');
        if ($parametro = $pesquisasRequest->search) {
            $grupos->where('titulo', 'like', "%{$parametro}%");
        }
        return view('admin.grupos.index', [
            'grupos' => $grupos->paginate(20)
        ]);
    }

    /**
     * @param ControleAcessoService $controleAcessoService
     * @param GrupoRequest $grupoRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(ControleAcessoService $controleAcessoService, GrupoRequest $grupoRequest)
    {
        if ($grupoRequest->isMethod('post')) {
            if ($grupo = $this->grupos->create($grupoRequest->only($this->grupos->model()->getFillable()))) {
                $grupo->grupos_permissoes()->sync(array_keys($grupoRequest->permissoes));
                flash('Grupo criado com sucesso!')->success();
                return redirect()->route('admin.grupos.index');
            }
            flash('Não foi possível criar o grupo');
            return redirect()->back();
        }
        return view('admin.grupos.create', [
            'permissoes' => $controleAcessoService->processaPermissoesArray()
        ]);
    }

    /**
     * @param $id
     * @param GrupoRequest $grupoRequest
     * @param ControleAcessoService $controleAcessoService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id, GrupoRequest $grupoRequest, ControleAcessoService $controleAcessoService)
    {
        $grupo = $this->grupos->model()->find($id);
        if ($grupoRequest->isMethod('post')) {
            if ($this->grupos->model()->find($id)->update($grupoRequest->only($this->grupos->model()->getFillable()))) {
                if ($grupoRequest->permissoes) {
                    $this->grupos->model()->find($id)->grupos_permissoes()->sync(array_keys($grupoRequest->permissoes));
                }
                flash('Grupo atualizado com sucesso!')->success();
                return redirect()->route('admin.grupos.index');
            }
            flash("Não foi possível atualizar o grupo")->error();
            return redirect()->route('admin.grupos.index');
        }
        if ($grupo) {
            return view('admin.grupos.edit', [
                'grupo' => $grupo,
                'permissoes' => $controleAcessoService->processaPermissoesArray($id, 'grupo', 'grupo_id')
            ]);
        }
        flash('Grupo não encontrado')->info();
        return redirect()->route('admin.grupos.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->grupos->find($id)->delete()) {
            flash('Grupo removido com sucesso')->success();
            return redirect()->route('admin.grupos.index');
        }
        flash('Não foi possível remover o grupo')->error();
        return redirect()->back();
    }

    /**
     * Exibir itens removidos com softdeleted
     * @param PesquisasRequest $pesquisasRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trashed(PesquisasRequest $pesquisasRequest)
    {
        $grupos = $this->grupos->model()->onlyTrashed()->orderBy('deleted_at', 'DESC');
        if ($parametro = $pesquisasRequest->search) {
            $grupos->where('titulo', 'like', "%{$parametro}%");
        }
        return view('admin.grupos.lixeira', ['grupos' => $grupos->paginate(20)]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $grupos = $this->grupos->model()->onlyTrashed()->where('id', $id)->first();
        if (!empty($grupos)) {
            if ($grupos->restore()) {
                flash('Grupo recuperado com sucesso.')->success();
                return redirect()->route('admin.grupos.trashed');
            }
            flash('Não foi possível localizar o item, parece que ele já foi removido')->error();
            return redirect()->route('admin.grupos.index');
        }
        flash('Não foi possível recuperar o item.')->error();
        return redirect()->route('admin.grupos.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        if ($this->grupos->model()->onlyTrashed()->where('id', $id)->forceDelete()) {
            flash('Grupo removido da lixeira com sucesso')->success();
            return redirect()->route('admin.grupos.trashed');
        }
        flash('Não é possível deletar este Grupo')->info()->important();
        return redirect()->back();
    }

    public function gruposPermissoes(Request $request, ControleAcessoService $controleAcessoService)
    {
        $data = $controleAcessoService->processaPermissoesArray($request->get('id'), 'grupo', 'grupo_id');
        return response()->json($data);
    }
}
