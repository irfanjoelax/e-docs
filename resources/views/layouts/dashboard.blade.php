<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tab Bar -->
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" />
    <title>{{ str_replace('-', ' ', env('APP_NAME')) }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Plugins -->
    @yield('css')

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/style.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/components.css">

</head>


<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('images/logo.svg') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ url('/profile', []) }}" class="dropdown-item has-icon">
                                <i class="fas fa-user"></i> Profile
                            </a>
                            <a href="{{ url('/change-password', []) }}" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">{{ str_replace('-', ' ', env('APP_NAME')) }}</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">
                            <img src="{{ asset('images/logo.svg') }}" class="" width="35">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        @if (Auth::user()->role == 'atasan')
                        @include('layouts._nav_atasan')
                        @endif

                        @if (Auth::user()->role == 'admin')
                        @include('layouts._nav_admin')
                        @endif

                        @if (Auth::user()->role == 'petugas')
                        @include('layouts._nav_petugas')
                        @endif
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> version {{ env('APP_VERSION') }}
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="main-footer">
                <div class="text-center">
                    Copyright &copy; {{ date('Y') }}
                    <div class="bullet"></div> Developed By <a href="#">Asep Sukmawan</a>
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://demo.getstisla.com/assets/modules/jquery.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/popper.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/tooltip.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/moment.min.js"></script>
    <script src="https://demo.getstisla.com/assets/js/stisla.js"></script>

    <!-- JS Libraries -->
    @yield('js')

    <!-- Template JS File -->
    <script src="https://demo.getstisla.com/assets/js/scripts.js"></script>
    <script src="https://demo.getstisla.com/assets/js/custom.js"></script>

</body>
</html>
