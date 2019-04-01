@extends('layouts.master')

@section('h1', 'Lixeira de Tenants')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="toolbar row mb-3">
                <form action="" method="get" class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    @include('admin.elements.filters.searchbar')
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-1">
                    <a href="{{ route('admin.tenancy.trashed') }}" class="btn btn-outline-danger btn-toolbar addAction text-uppercase d-block" data-toggle="tooltip" title="Limpar pesquisa">
                        <i class="mdi mdi-filter-remove"></i>
                    </a>
                </div>
                @can('acl.view', 'admin.tenancy.index')
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                        <a href="{{ route('admin.tenancy.index') }}" class="btn btn-outline-dark btn-toolbar addAction text-uppercase d-block" data-toggle="tooltip" title="Lista de tenancy">
                            <i class="mdi mdi-format-list-numbers mr-2"></i> <span class="hidden-xs hidden-sm">Tenants</span>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Host</th>
                            <th>Data de criação</th>
                            <th>Data de atualização</th>
                            <th>Data de exclusão</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tenancys as $tenant)
                            <tr>
                                <td class="align-middle" scope="row">{{ $tenant->id }}</td>
                                <td class="align-middle" nowrap>{{ $tenant->fqdn }}</td>
                                <td class="align-middle">{{ $tenant->created_at }}</td>
                                <td class="align-middle">{{ $tenant->updated_at }}</td>
                                <td class="align-middle">{{ $tenant->deleted_at }}</td>
                                <td class="align-middle">
                                    {{ Form::open(['route' => ['admin.tenancy.forceDelete', $tenant->id], 'class' => 'confirmDelete']) }}
                                    <div class="btn-group">
                                        @can('acl.view', 'admin.tenancy.restore')
                                            <a href="{{ route('admin.tenancy.restore', [$tenant->id]) }}" class="btn btn-outline-info" data-toggle="tooltip" title="Restaurar">
                                                <i class="mdi mdi-delete-restore"></i> Restaurar
                                            </a>
                                        @endcan
                                        @can('acl.view', 'admin.tenancy.forceDelete')
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Remover da lixeira">
                                                <i class="mdi mdi-delete-forever"></i>
                                            </button>
                                        @endcan
                                    </div>
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            {{ $tenancys->appends(request()->query())->links() }}
        </div>
        <div class="col-md-12">
            Página {{$tenancys->currentPage()}} de {{$tenancys->lastPage()}}, mostrando {{$tenancys->count()}}
            resultados de {{$tenancys->total()}} no total
        </div>
    </div>
@endsection

@section('css')
    <link href="{{ vAsset('idealui/assets/vendor/material-input/css/material-input.css') }}" rel="stylesheet"/>
@endsection

@section('scripts')
@endsection