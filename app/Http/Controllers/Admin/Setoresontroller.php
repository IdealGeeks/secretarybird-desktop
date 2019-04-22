<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Setoresontroller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        return view('admin.empresas.index', ['registros' => []]);
    }

    public function create(Request $request)
    {
        return view('admin.empresas.create', []);
    }

    public function edit($id, Request $request)
    {
        return view('admin.empresas.edit', ['id' => $id]);
    }

    public function trashed(Request $request)
    {
        return view('admin.empresas.lixeira', ['registros' => []]);
    }
}
