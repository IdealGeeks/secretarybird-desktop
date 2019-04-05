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
    <link href="{{ asset('node_modules/ladda/ladda.min.css') }}" rel="stylesheet"/>
    <!-- IdealUI -->
    <link href="http://idealtrends.io/idealui/dist/idealui/idealui.min.css" rel="stylesheet" type="text/css"/>
    <link href="http://idealtrends.io/idealui/assets/vendor/form-wizard/css/form-wizard.css" rel="stylesheet" type="text/css"/>
    <!-- App css -->
    <link href="{{asset('paper-dashboard/css/paper-dashboard.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('paper-dashboard/demo/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>

<body>
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="#" class="logo-normal">
                <div class="logo-image-big">
                    <img src="{{ asset('images/logo.png') }}">
                </div>
            </a>
        </div>
        <div class="sidebar-wrapper">
            @include('admin.elements.menu')
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo">@yield('h1')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="#pablo">
                                <i class="nc-icon nc-layout-11"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="#pablo">
                                <i class="nc-icon nc-settings-gear-65"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- <div class="panel-header panel-header-lg">

    <canvas id="bigDashboardChart"></canvas>


  </div> -->
        <div class="content">
            <div class="content_container">
                @include('flash::message')
                @include('layouts.elements.validator')
                @yield('content')
            </div>
        </div>
        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>

    <script src="{{ asset('paper-dashboard/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('paper-dashboard/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('paper-dashboard/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('paper-dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('paper-dashboard/js/plugins/moment.min.js') }}"></script>

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
    <script src="{{ asset('node_modules/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('node_modules/ladda/ladda.min.js') }}"></script>
    <!-- IdealUI -->
    <script src="http://idealtrends.io/idealui/dist/idealui/idealui.min.js"></script>
    <script>
        IdealUiJs.baseUrl = '{{ \Illuminate\Support\Facades\URL::to('/') }}';
    </script>
    <script src="http://idealtrends.io/idealui/assets/vendor/form-wizard/js/form-wizard.js"></script>

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
