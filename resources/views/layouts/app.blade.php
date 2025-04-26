<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'IDS_G17')</title>

    <!-- AdminLTE core -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- OverlayScrollbars (scroll bonito lateral) -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- Aquí siguen tus propios assets (Vite) -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- NAVBAR  --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Botón hamburguesa -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Área derecha (logout) -->
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">Cerrar sesión</button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>

        {{-- SIDEBAR  --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('/') }}" class="brand-link text-center">
                <span class="brand-text font-weight-light">IDS_G17</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview" data-accordion="false">

                        {{-- Bloque “Sistema”  --}}
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Sistema <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Administrar Usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        {{-- CONTENIDO CENTRAL  --}}
        <div class="content-wrapper">
            {{-- Cabecera  --}}
            <section class="content-header">
                <div class="container-fluid">
                    <h1>@yield('page-title', 'Dashboard')</h1>
                </div>
            </section>

            {{-- Contenido  --}}
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        {{-- FOOTER opcional  --}}
        <footer class="main-footer text-sm">
            <strong>&copy; {{ date('Y') }} IDS_G17</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Versión</b> 1.0
            </div>
        </footer>
    </div>

    {{-- JS core de AdminLTE  --}}
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>