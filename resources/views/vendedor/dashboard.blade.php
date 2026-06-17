<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vendedor | InvenControl</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- NAVBAR --}}
    <nav class="main-header navbar navbar-expand navbar-dark navbar-success">
        {{-- Izquierda --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link font-weight-bold">
                    <i class="fas fa-boxes mr-1"></i> InvenControl
                </a>
            </li>
        </ul>

        {{-- Derecha --}}
        <ul class="navbar-nav ml-auto">
            {{-- Notificaciones --}}
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Sin notificaciones</span>
                </div>
            </li>

            {{-- Usuario --}}
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user-circle mr-1"></i>
                    <span>{{ auth()->user()->name }} {{ auth()->user()->apellido }}</span>
                    <span class="badge badge-light ml-1">Vendedor</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fas fa-user-cog mr-2"></i> Mi perfil
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Cerrar sesión
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    {{-- SIDEBAR --}}
    <aside class="main-sidebar sidebar-dark-success elevation-4">
        <a href="#" class="brand-link">
            <i class="fas fa-boxes brand-image ml-3 text-success"></i>
            <span class="brand-text font-weight-bold">InvenControl</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <div class="img-circle elevation-2 bg-success d-flex align-items-center justify-content-center"
                         style="width:35px;height:35px;font-weight:bold;color:#fff;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>Productos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cash-register"></i>
                            <p>Ventas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-undo"></i>
                            <p>Devoluciones</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shield-alt"></i>
                            <p>Garantías</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    {{-- CONTENIDO --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard <small class="text-muted">Vendedor</small></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Inicio</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="callout callout-success">
                    <h5><i class="fas fa-info-circle mr-2"></i>Bienvenido, {{ auth()->user()->name }}!</h5>
                    Panel de ventas — el contenido estará disponible próximamente.
                </div>
            </div>
        </section>
    </div>

    {{-- FOOTER --}}
    <footer class="main-footer">
        <strong>InvenControl</strong> &copy; {{ date('Y') }}
        <div class="float-right d-none d-sm-inline-block">
            <b>Rol:</b> Vendedor
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
