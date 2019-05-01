@extends('layouts.master')

@section('title-bar') @endsection

@section('content')
    <div class="form-wizard form-header-classic materialize">
        <h3 class="titleStep">Bem-vindo ao <span>SecretaryBird</span></h3>
        <p class="subtitleStep">O que vamos fazer hoje {{Auth::user()->name}} ?</p>

        @include("admin.dashboard.blocks.tiles")
    </div>
@endsection

@section('css')
    <link href="{{ vAsset('css/dashboard/index.css') }}" rel="stylesheet" />
    <link href="http://idealtrends.io/idealui/assets/vendor/exploding-tiles/exploding-tiles.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="//idealtrends.io/idealui/assets/vendor/exploding-tiles/exploding-tiles.js"></script>
@endsection
