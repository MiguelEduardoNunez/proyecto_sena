<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- AdminLTE App -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            {{-- <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search fa-lg"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> --}}

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell fa-lg"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item dropdown-footer" href="#">See All Notifications</a>
                </div>
            </li>

            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user-circle fa-lg"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user mr-2"></i>
                        {{ __('Perfil') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            {{ __('Cerrar Sesión') }}
                        </a>
                    </form>
                </div>
            </li>

            {{-- <!-- Full Screen -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li> --}}
        </ul>
    </nav>

    <!-- Main Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a class="brand-link" href="#">
            <img src="{{ asset('adminlte/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Elementos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link active" href="">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar Elemento</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestionar Elementos</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Proyectos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link" href={{ route('proyectos.create') }}>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar Proyecto</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href={{ route('proyectos.index') }}>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestionar Proyectos</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Stands
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar Stand</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestionar Stands</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Novedades
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar Novedad</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestionar Novedades</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Perfiles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('perfiles.create') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar Perfil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('perfiles.index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestionar Perfiles</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('usuarios.create') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Registrar Usuario</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Gestionar Usuarios</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Page Content -->
    <div class="content-wrapper">
        <!-- Header Content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">{{ $page ?? 'Null' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                @include('sweetalert::alert')
                {{ $slot }}
            </div>
        </section>
    </div>

    <!-- Page Foot -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="#">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Daterange picker -->
    <script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/js/adminlte.js') }}"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>