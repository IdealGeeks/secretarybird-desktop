@extends('layouts.master')

@section('h1',' Perfil')

@section('content')
    <div class=" form-header-classic materialize">
        {{ Form::open(['class' => 'form-ladda']) }}
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-8">
                <div class="card-box">
                    @include('admin.usuarios.blocks.informacoes')
                </div>
            </div>
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
