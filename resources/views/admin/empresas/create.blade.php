@extends('layouts.master')

@section('h1',' Adicionar Visita')

@section('content')
    <div class=" form-header-classic materialize">
        {{ Form::open(['class' => 'form-ladda']) }}
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
