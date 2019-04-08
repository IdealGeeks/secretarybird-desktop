<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}">
    <link href="http://idealtrends.io/idealui/assets/vendor/material-input/css/material-input.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('greeva/dist/css/app.css')}}" rel="stylesheet"/>
    <link href="{{ asset('css/login/login.css')}}" rel="stylesheet"/>

    <title>{{ env('APP_NAME') }}</title>
</head>
<body class="bg-account-pages">
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper-page">
                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box">
                                @include('flash::message')
                                @include('layouts.elements.validator')
                                <h2 class="text-uppercase text-center">
                                    <a href="#" target="_blank" class="text-success">
                                        <span><img src="{{ asset('images/logo.png')}}" alt="" height="100"></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <div class="button-container">
                                    <button onclick="window.location='{{route('admin.dashboard')}}'"><span>Acessar o sistema</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>