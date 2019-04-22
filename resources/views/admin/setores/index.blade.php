@extends('layouts.master')

@section('h1', 'Visitas')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="toolbar row mb-3">
                <form action="" method="get" class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    @include('admin.elements.filters.searchbar')
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-1">
                    <a href="{{ route('admin.visitas.index') }}" class="btn btn-outline-danger btn-toolbar addAction text-uppercase d-block" data-toggle="tooltip" title="Limpar pesquisa">
                        <i class="mdi mdi-filter-remove"></i>
                    </a>
                </div>
                @can('acl.view', 'admin.visitas.create')
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <a href="{{ route('admin.visitas.create') }}" class="btn btn-outline-success btn-toolbar addAction text-uppercase d-block" data-toggle="tooltip" title="Novo">
                            <i class="mdi mdi-note-plus-outline mr-2"></i> <span class="hidden-xs hidden-sm">Novo</span>
                        </a>
                    </div>
                @endcan

                @can('acl.view', 'admin.visitas.trashed')
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-1">
                        <a href="{{ route('admin.visitas.trashed') }}" class="btn btn-outline-secondary btn-toolbar addAction text-uppercase d-block" data-toggle="tooltip" title="Lixeira">
                            <i class="mdi mdi-delete-outline noti-icon"></i>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($registros as $registro)
                            <tr>
                                <td class="align-middle">{{ $registro->id }}</td>
                                <td class="align-middle" nowrap>{{ $registro->getFullName() }}</td>
                                <td class="align-middle">{{ $registro->email }}</td>
                                <td class="align-middle">{{ $registro->status()->first()->titulo }}</td>
                                <td class="align-middle text-right">
                                    {{ Form::open(['route' => ['admin.visitas.destroy', $registro->id], 'class' => 'confirmDelete']) }}
                                    <div class="btn-group">
                                        @can('acl.view', 'admin.visitas.edit')
                                            <a href="{{route('admin.visitas.edit', $registro->id)}}" class="btn btn-outline-primary" data-toggle="tooltip" title="Editar"><i class="mdi mdi-pencil"></i></a>
                                        @endcan
                                        @can('acl.view', 'admin.visitas.destroy')
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Remover">
                                                <i class="mdi mdi-delete"></i>
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
    <div class="row mb-5">
        <div class="col-md-12">
            <ul class="pagination" role="navigation">
                <li class="page-item disabled" aria-disabled="true" aria-label="« Anterior">
                    <span class="page-link" aria-hidden="true">‹</span>
                </li>

                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>

                <li class="page-item">
                    <a class="page-link" href="#" rel="next" aria-label="Próximo »">›</a>
                </li>
            </ul>
        </div>
        <div class="col-md-12 pagination_desc">
            Página <span class="current"></span> de <span class="last"></span>,
            total de <span class="total"></span> registros.
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('scripts')
@endsection