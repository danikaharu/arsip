<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Arsip Digital') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/dashboard.js') }}" defer></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed font-sans antialiased">
    <div class="wrapper">

        <!-- Navbar -->
        @livewire('navigation-menu')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-warning elevation-2">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="" width="36" class="brand-image img-circle elevation-1"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="image">
                            <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-1"
                                alt="{{ Auth::user()->name }}">
                        </div>
                    @endif
                    <div class="info">
                        <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ request()->is('dashboard') ? ' active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    {{ __('Dashboard') }}
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 1)
                            <li class="nav-item">
                                <a href="#" class="nav-link {{ request()->is('production') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-box "></i>
                                    <p>
                                        {{ __('Produksi') }}
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('gallon') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Galon</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cup') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cup 240 ml</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logistic') }}"
                                    class="nav-link {{ request()->is('logistic') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        {{ __('Logistik') }}
                                    </p>
                                </a>
                            </li>
                        @elseif(auth()->user()->role == 0)
                            <li class="nav-item">
                                <a href="{{ route('quality-control') }}"
                                    class="nav-link {{ request()->is('quality-control') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        {{ __('Quality Control') }}
                                    </p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-box "></i>
                                    <p>
                                        {{ __('Produksi') }}
                                    </p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('gallon') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Galon</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cup') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Cup 240 ml</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logistic') }}"
                                    class="nav-link {{ request()->is('logistic') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        {{ __('Logistik') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('quality-control') }}"
                                    class="nav-link {{ request()->is('quality-control') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>
                                        {{ __('Quality Control') }}
                                    </p>
                                </a>
                            </li>
                        @endif
                        <hr class="dropdown-divider">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault();  this.closest('form').submit(); ">
                                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                    <p>
                                        {{ __('Logout') }}
                                    </p>
                                </a>
                            </li>
                        </form>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col">
                            <h1>{{ $header }}</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            {{ $slot }}
                        </div>

                        @if (isset($aside))
                            <div class="col-lg-3">
                                {{ $aside }}
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Powered by</strong> <a href="https://adminlte.io">AdminLTE</a>
        </footer>
    </div>

    @stack('modals')
    @livewireScripts
    @stack('scripts')
</body>

</html>
