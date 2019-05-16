<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PesquisasRequest;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Usuario;
use App\Repositories\UsuarioRepository;
use App\Repositories\GrupoRepository;
use App\Repositories\StatusRepository;
use App\Http\Controllers\Controller;
use App\Services\ControleAcessoService;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    protected $usuarios;
    protected $grupos;
    protected $status;

    /**
     * UsuariosController constructor.
     * @param UsuarioRepository $usuarioRepository
     * @param GrupoRepository $grupoRepository
     * @param StatusRepository $statusGeralRepository
     */
    public function __construct(UsuarioRepository $usuarioRepository, GrupoRepository $grupoRepository, StatusRepository $statusGeralRepository)
    {
        parent::__construct();
        $this->middleware('auth:admin');

        $this->usuarios = $usuarioRepository;
        $this->grupos = $grupoRepository;
        $this->status = $statusGeralRepository;
    }

    /**
     * @param PesquisasRequest $pesquisasRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(PesquisasRequest $pesquisasRequest)
    {
        $usuarios = $this->usuarios->model()->orderBy('nome', 'ASC');
        if ($parametro = $pesquisasRequest->search) {
            $usuarios->where('nome', 'like', "%{$parametro}%")->orWhere('sobrenome', 'like', "%{$parametro}%")->orWhere('email', 'like', "%{$parametro}%");
        }
        return view('admin.usuarios.index', [
            'usuarios' => $usuarios->paginate(20),
        ]);

    }

    /**
     * @param ControleAcessoService $controleAcessoService
     * @param StoreUsuarioRequest $storeUsuarioRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(ControleAcessoService $controleAcessoService, StoreUsuarioRequest $storeUsuarioRequest)
    {
        if ($storeUsuarioRequest->isMethod('post')) {
            if ($this->usuarios = $this->usuarios->model()->create($storeUsuarioRequest->only($this->usuarios->model()->getFillable()))) {
                $this->usuarios->grupos()->sync($storeUsuarioRequest->grupos);
                $this->usuarios->usuarios_permissoes()->sync(array_keys($storeUsuarioRequest->permissoes));
                flash('Usuario criado com sucesso')->success();
                return redirect()->route('admin.usuarios.index');
            }
            flash('Não foi possível criar o usuario')->error();
            return redirect()->back();
        }

        return view('admin.usuarios.create', [
            'status' => $this->status->model()->pluck('titulo', 'id'),
            'grupos' => $this->grupos->model()->pluck('titulo', 'id'),
            'permissoes' => $controleAcessoService->processaPermissoesArray()
        ]);
    }

    /**
     * @param $id
     * @param UpdateUsuarioRequest $updateUsuarioRequest
     * @param ControleAcessoService $controleAcessoService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id, UpdateUsuarioRequest $updateUsuarioRequest, ControleAcessoService $controleAcessoService)
    {
        if ($updateUsuarioRequest->isMethod('post')) {
            if ($this->usuarios->model()->find($id)->update($updateUsuarioRequest->only($this->usuarios->model()->getFillable()))) {
                $this->usuarios->model()->find($id)->grupos()->sync($updateUsuarioRequest->grupos);
                $this->usuarios->model()->find($id)->usuarios_permissoes()->sync(array_keys($updateUsuarioRequest->permissoes));
                flash('Usuario atualizado com sucesso')->success();
                return redirect()->route('admin.usuarios.index');
            }
            flash('Não foi possível atualizar o usuário')->error();
            return redirect()->back();
        }

        /** @var Usuario $usuario */
        if ($usuario = $this->usuarios->model()->find($id)) {
            return view('admin.usuarios.edit', [
                'grupos' => $this->grupos->model()->pluck('titulo', 'id'),
                'grupo' => $usuario->grupos()->first(),
                'usuarios' => $usuario,
                'status' => $this->status->model()->pluck('titulo', 'id'),
                'permissoes' => $controleAcessoService->processaPermissoesArray($id, 'usuario', 'usuario_id')
            ]);
        }
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($id == Auth::guard('admin')->user()->id) {
            flash('Você não pode deletar seu próprio usuário.')->error();
            return redirect()->back();
        }

        if ($this->usuarios->model()->find($id)->delete()) {
            flash('Usuario enviado para lixeira')->info();
            return redirect()->route('admin.usuarios.index');
        }
        flash('Não foi possível remover este usuario')->error();
        return redirect()->back();
    }

    /**
     * Exibir itens removidos com softdeleted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function trashed(PesquisasRequest $pesquisasRequest)
    {
        $usuarios = $this->usuarios->model()->orderBy('nome', 'ASC')->onlyTrashed()->orderBy('deleted_at', 'DESC');
        if ($parametro = $pesquisasRequest->search) {
            $usuarios->where('nome', 'like', "%{$parametro}%")->orWhere('sobrenome', 'like', "%{$parametro}%")->orWhere('email', 'like', "%{$parametro}%");
        }

        return view('admin.usuarios.lixeira', [
                'usuarios' => $usuarios->paginate(20)
            ]
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $usuarios = $this->usuarios->model()->onlyTrashed()->where('id', $id)->first();
        if (!empty($usuarios)) {
            if ($usuarios->restore()) {
                flash('Usuario recuperado com sucesso.')->success();
                return redirect()->route('admin.usuarios.trashed');
            }
            flash('Não foi possível localizar o Usuario, parece que ele já foi removido')->error();
            return redirect()->route('admin.usuarios.index');
        }
        flash('Não foi possível recuperar o Usuario.')->error();
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        if ($this->usuarios->model()->onlyTrashed()->where('id', $id)->forceDelete()) {
            flash('Usuario removido da lixeira com sucesso')->success();
            return redirect()->route('admin.usuarios.trashed');
        }
        flash('Não é possível deletar este Usuario')->info()->important();
        return redirect()->back();
    }
}
