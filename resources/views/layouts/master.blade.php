<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title>SecretaryBird</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Webapp dashboard for SecretaryBird Ecosystem" name="description"/>
    <meta content="Creative Tim && Helike Long" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- Icons css -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="{{asset('node_modules/@mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('node_modules/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('paper-dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- MetisMenu CSS -->
    <link href="{{asset('node_modules/metismenu/dist/metisMenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Sweet Alert -->
    <link href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('node_modules/mohithg-switchery/dist/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/jquery-ui/themes/base/datepicker.css') }}" rel="stylesheet"/>
    <link href="{{ asset('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet"/>
    <!-- Ladda Button -->
    <link href="{{ asset('node_modules/ladda/dist/ladda.min.css') }}" rel="stylesheet"/>
    <!-- IdealUI -->
    <link href="http://idealtrends.io/idealui/dist/idealui/idealui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://idealtrends.io/idealui/assets/vendor/material-input/css/material-input.css" rel="stylesheet" type="text/css"/>
    <!-- App css -->
    <link href="{{asset('paper-dashboard/css/paper-dashboard.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('paper-dashboard/demo/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>

<body>
    <div id="topnav">
        <!-- Navbar -->
        <nav class="navbar-custom">
            {{--Menu--}}
            <a href="{{route('admin.dashboard')}}" class="logo">
                <div class="logo-lg">
                    <img src="{{ asset('images/logo-notext-alt.png') }}" height="40">
                </div>
            </a>
            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        @include('admin.elements.menu')
                    </div>
                </div>
            </div>
            <div class="actions">
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="dropdownNotifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Notificações</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownNotifications" x-placement="bottom-end">
                                    @include('admin.elements.notifications')
                                </div>
                            </div>
                        </li>

                        <li class="nav-item btn-rotate dropdown-user">
                            <div class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle nav-user" id="dropdownUser" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="ml-1"> {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->nome }} <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser" x-placement="bottom-end">
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Olá, {{ \Illuminate\Support\Facades\Auth::guard('admin')->user()->nome }}
                                            !</h6>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('admin.administradores.edit', \Illuminate\Support\Facades\Auth::guard('admin')->user()->id) }}" class="dropdown-item notify-item link-out">
                                        <i class="dripicons-user"></i> <span>Conta</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="dripicons-gear"></i> <span>Configurações</span>
                                    </a>
                                    <a href="{{ route('noacl.route.login.logout') }}" class="dropdown-item notify-item">
                                        <i class="dripicons-power"></i> <span>Sair</span>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
         </nav>
    </div>

    <div class="wrapper ">
        <div>
            @section('title-bar')
                <div class="page-title-box">
                    @if (!\Request::is('/'))
                        <a href="javascript:history.back()" role="button" class="header-icon btn-voltar link-out">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    @endif
                    @include('admin.elements.breadcrumb')
                    <h4 class="page-title @if (\Request::is('/')) p-0 @endif">@yield('h1')</h4>
                </div>
            @show
        </div>

        <div class="container-fluid">
            <div class="content">
                <div class="content_container">
                    @include('flash::message')
                    @include('layouts.elements.validator')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-black  footer-white ">
        @include('admin.elements.footer')
    </footer>
</body>

    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('node_modules/moment/min/moment.min.js') }}"></script>
    <!-- jQuery  -->
    <script src="{{asset('node_modules/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- SweetAlert -->
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <!-- MetisMenu JS -->
    <script src="{{ asset('node_modules/metismenu/dist/metisMenu.min.js')}}"></script>
    <!-- Jquery-Ui -->
    <script src="{{ asset('node_modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Masks -->
    <script src="{{ asset('node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('node_modules/jquery-maskmoney/dist/jquery.maskMoney.min.js') }}"></script>
    <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('node_modules/mohithg-switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <!-- Ladda Button -->
    <script src="{{ asset('node_modules/ladda/node_modules/spin.js/spin.min.js') }}"></script>
    <script src="{{ asset('node_modules/ladda/dist/ladda.min.js') }}"></script>
    <!-- IdealUI -->
    <script src="//idealtrends.io/idealui/dist/idealui/idealui.min.js"></script>
    <script>
        IdealUiJs.baseUrl = '{{ \Illuminate\Support\Facades\URL::to('/') }}';
    </script>
    <script src="//idealtrends.io/idealui/assets/vendor/form-wizard/js/form-wizard.js"></script>

    <script src="{{ asset('paper-dashboard/js/paper-dashboard.min.js') }}"></script>
    <!-- Core.js -->
    <script src="{{asset('js/core.js')}}"></script>

    @include('admin.elements.flash')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('scripts')
</html>
