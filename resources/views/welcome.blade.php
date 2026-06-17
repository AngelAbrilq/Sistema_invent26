<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InvenControl · Sistema de Inventario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg { background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1d4ed8 100%); }
    </style>
</head>
<body class="bg-white antialiased">

    {{-- NAVBAR --}}
    <nav class="absolute top-0 left-0 right-0 z-10 px-6 lg:px-16 py-5 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-blue-500 bg-opacity-30 rounded-xl flex items-center justify-center border border-blue-300 border-opacity-30">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <span class="text-white font-semibold text-lg tracking-wide">InvenControl</span>
        </div>
        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('dashboard') }}" class="text-white text-sm font-medium px-4 py-2 rounded-lg border border-white border-opacity-30 hover:bg-white hover:bg-opacity-10 transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-white text-sm font-medium hover:text-blue-200 transition">
                    Iniciar sesión
                </a>
                <a href="{{ route('register') }}" class="text-sm font-semibold px-4 py-2 bg-white text-blue-800 rounded-lg hover:bg-blue-50 transition shadow-sm">
                    Registrarse
                </a>
            @endauth
        </div>
    </nav>

    {{-- HERO --}}
    <section class="hero-bg min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-white opacity-5 rounded-full"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-blue-400 opacity-10 rounded-full"></div>
        <div class="absolute top-1/2 right-16 w-48 h-48 bg-blue-600 opacity-10 rounded-full -translate-y-1/2"></div>

        <div class="relative z-10 px-6 lg:px-16 max-w-7xl mx-auto w-full">
            <div class="max-w-2xl">
                <span class="inline-block text-blue-300 text-xs font-semibold tracking-widest uppercase mb-4 bg-blue-500 bg-opacity-20 px-3 py-1.5 rounded-full border border-blue-400 border-opacity-30">
                    Sistema Profesional
                </span>
                <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                    Tu inventario,<br>
                    <span class="text-blue-300">bajo control</span>
                </h1>
                <p class="text-blue-100 text-lg leading-relaxed mb-10 opacity-80 max-w-lg">
                    Gestiona productos, compras, ventas, devoluciones y garantías en una sola plataforma. Rápido, seguro y profesional.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('register') }}"
                       class="px-7 py-3.5 bg-white text-blue-800 font-semibold rounded-xl hover:bg-blue-50 transition shadow-lg text-sm">
                        Comenzar gratis
                    </a>
                    <a href="{{ route('login') }}"
                       class="px-7 py-3.5 border border-white border-opacity-30 text-white font-medium rounded-xl hover:bg-white hover:bg-opacity-10 transition text-sm">
                        Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section class="py-20 px-6 lg:px-16 bg-slate-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-slate-800 mb-3">Todo lo que necesitas</h2>
                <p class="text-slate-500 text-base max-w-lg mx-auto">Una plataforma completa para gestionar tu negocio con eficiencia y control.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @php
                    $features = [
                        ['icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'title' => 'Control de Productos', 'desc' => 'Gestiona tu catálogo con precios, stock mínimo y alertas automáticas.'],
                        ['icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z', 'title' => 'Compras y Ventas', 'desc' => 'Registra facturas de compra y venta con cálculo automático de ganancias.'],
                        ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'title' => 'Reportes en tiempo real', 'desc' => 'Visualiza el movimiento de tu inventario y métricas clave al instante.'],
                        ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'title' => 'Roles de usuario', 'desc' => 'Administrador, vendedor y cliente con permisos diferenciados.'],
                        ['icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'title' => 'Devoluciones', 'desc' => 'Gestión completa del ciclo de devoluciones con reintegro de stock automático.'],
                        ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Garantías', 'desc' => 'Seguimiento del estado de garantías por producto y cliente.'],
                    ];
                @endphp

                @foreach($features as $f)
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition">
                    <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $f['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-slate-800 font-semibold text-base mb-2">{{ $f['title'] }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $f['desc'] }}</p>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="hero-bg py-16 px-6 lg:px-16 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">¿Listo para empezar?</h2>
        <p class="text-blue-200 mb-8 text-base opacity-80">Crea tu cuenta en segundos y empieza a gestionar tu inventario.</p>
        <a href="{{ route('register') }}"
           class="inline-block px-8 py-3.5 bg-white text-blue-800 font-semibold rounded-xl hover:bg-blue-50 transition shadow-lg text-sm">
            Crear cuenta gratis
        </a>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-slate-500 text-center py-5 text-xs">
        © {{ date('Y') }} InvenControl · Sistema de Gestión de Inventario
    </footer>

</body>
</html>
