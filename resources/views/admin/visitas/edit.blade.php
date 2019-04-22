@extends('layouts.master')

@section('h1', 'Editar Visita')

@section('content')
        <div class="form-header-classic materialize">
            {{ Form::model($usuario, ['class' => 'form-ladda', 'route' => ['admin.usuarios.edit', $usuario->id]]) }}
            {{ Form::hidden('_method', 'POST') }}
            {{ Form::hidden('id') }}
            <div class="card-box">
                @include('admin.visitas.blocks.form')
            </div>

            <div class="form-wizard-buttons sticky-button">
                <button type="submit" class="btn btn-success btn-block btn-small ladda-button">Salvar</button>
            </div>
            {{ Form::close() }}
        </div>
@endsection

@section('css')
@endsection

@section('scripts')
@endsection
