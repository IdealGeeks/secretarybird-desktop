@extends('layouts.master')

@section('h1', 'Adicionar Usuário')

@section('content')
    <div class=" form-header-classic materialize">
        {{ Form::open(['class' => 'form-ladda']) }}
        <fieldset class='informacoes'>
            <div class="card-box">
                @include('admin.usuarios.blocks.informacoes')
            </div>
        </fieldset>

        @include('admin.usuarios.blocks.permissoes')

        <div class="form-wizard-buttons sticky-button">
            <button type="submit" class="btn btn-success btn-block btn-small ladda-button">Salvar</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('css')
@endsection

@section('scripts')
    <script>
        var grupoUrl = '{{route('admin.grupos.permissoes')}}';
    </script>
    <script src="{{asset('js/admin/usuarios/grupo_permissoes.js')}}"></script>
@endsection
