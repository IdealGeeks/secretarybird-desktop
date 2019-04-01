<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\PesquisasRequest;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

use Hyn\Tenancy\Environment;

class TenancyController extends Controller
{
    protected $website;
    protected $hostname;

    /**
     * TenancyController constructor.
     */
    public function __construct(Website $website, Hostname $hostname)
    {
        parent::__construct();
        $this->middleware('auth:admin');
        $this->website = $website;
        $this->hostname = $hostname;
    }

    public function index()
    {
        return view('admin.tenancy.index', [
            'tenancys' => Hostname::paginate(20)
        ]);
    }

    public function create()
    {
        $website = new Website;
//        app(WebsiteRepository::class)->create($website);
//        dd($website->uuid); // Unique id
        // Implement custom random hash using Laravels Str::random
        $website->uuid = str_random(10);
        app(WebsiteRepository::class)->create($website);
        $website->managed_by_database_connection = 'system.base';
        $website->save();
        $hostname = new Hostname;
        $hostname->fqdn = 'app.system.localhost';
        $hostname = app(HostnameRepository::class)->create($hostname);
        app(HostnameRepository::class)->attach($hostname, $website);
        dump($website->hostnames); // Collection with $hostname

//        $tenancy = app(Environment::class);
//        $tenancy->website(); // resolves the currently active website
//        $tenancy->hostname(); // resolves the currently active hostname
//
//        $tenancy->hostname($hostname); // sets the currently active hostname
//        $tenancy->identifyHostname();
    }

    public function edit()
    {
//        $tenancy = app(Environment::class);
//
//        $tenancy->hostname($hostname);
//
//        $tenancy->hostname(); // resolves $hostname as currently active hostname
//
//        $tenancy->tenant($website); // switches the tenant and reconfigures the app
//
//        $tenancy->website(); // resolves $website
//        $tenancy->tenant(); // resolves $website
//
//        $tenancy->identifyHostname(); // resets resolving $hostname by using the Request
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($this->hostname->find($id)->delete()) {
            flash('Tenant Host removido com sucesso')->success();
            return redirect()->route('admin.tenancy.index');
        }
        flash('Não foi possível remover o tenant')->error();
        return redirect()->back();
    }

    /**
     * Exibir itens removidos com softdeleted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function trashed(PesquisasRequest $pesquisasRequest)
    {
        $tenant = $this->hostname->onlyTrashed()->orderBy('deleted_at', 'DESC');
        if ($parametro = $pesquisasRequest->search) {
            $tenant->where('fqdn', 'like', "%{$parametro}%");
        }
        return view('admin.tenancy.lixeira', ['tenancys' => $tenant->paginate(20)]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $tenant = $this->hostname->onlyTrashed()->where('id', $id)->first();
        if (!empty($tenant)) {
            if ($tenant->restore()) {
                flash('Tenant recuperado com sucesso.')->success();
                return redirect()->route('admin.tenancy.trashed');
            }
            flash('Não foi possível localizar o item, parece que ele já foi removido')->error();
            return redirect()->route('admin.tenancy.index');
        }
        flash('Não foi possível recuperar o item.')->error();
        return redirect()->route('admin.tenancy.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        if ($this->hostname->onlyTrashed()->where('id', $id)->forceDelete()) {
            $this->website->where('id', $id)->forceDelete();
            flash('Tenant removido da lixeira com sucesso')->success();
            return redirect()->route('admin.tenancy.trashed');
        }
        flash('Não é possível deletar este Tenant')->info()->important();
        return redirect()->back();
    }
}
