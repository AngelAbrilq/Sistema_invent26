<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'InvenControl') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .auth-bg { background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 55%, #1d4ed8 100%); }
    </style>
</head>
<body class="bg-slate-100 antialiased">

    <div class="min-h-screen flex">

        {{-- Panel izquierdo decorativo --}}
        <div class="hidden lg:flex lg:w-1/2 auth-bg flex-col justify-between p-12 relative overflow-hidden">
            <div class="absolute -top-20 -right-20 w-80 h-80 bg-white opacity-5 rounded-full"></div>
            <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-blue-400 opacity-10 rounded-full"></div>

            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-10 h-10 bg-blue-500 bg-opacity-30 rounded-xl flex items-center justify-center border border-blue-300 border-opacity-30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="text-white font-semibold text-xl tracking-wide">InvenControl</span>
                </div>
                <p class="text-blue-300 text-sm pl-1">Sistema de Gestión de Inventario</p>
            </div>

            <div class="relative z-10">
                <h1 class="text-4xl font-bold text-white leading-snug mb-4">
                    Gestiona tu inventario<br>
                    <span class="text-blue-300">con precisión</span>
                </h1>
                <p class="text-blue-100 text-sm leading-relaxed opacity-75 max-w-sm">
                    Control total de productos, compras, ventas y devoluciones desde un solo lugar.
                </p>
                <div class="mt-10 grid grid-cols-3 gap-3">
                    <div class="bg-white bg-opacity-10 rounded-xl p-4 border border-white border-opacity-10 text-center">
                        <p class="text-2xl font-bold text-white">∞</p>
                        <p class="text-blue-200 text-xs mt-1">Productos</p>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-xl p-4 border border-white border-opacity-10 text-center">
                        <p class="text-2xl font-bold text-white">3</p>
                        <p class="text-blue-200 text-xs mt-1">Roles</p>
                    </div>
                    <div class="bg-white bg-opacity-10 rounded-xl p-4 border border-white border-opacity-10 text-center">
                        <p class="text-2xl font-bold text-white">24/7</p>
                        <p class="text-blue-200 text-xs mt-1">Disponible</p>
                    </div>
                </div>
            </div>

            <p class="text-blue-400 text-xs relative z-10 opacity-50">
                © {{ date('Y') }} InvenControl · Todos los derechos reservados
            </p>
        </div>

        {{-- Panel derecho --}}
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 overflow-y-auto">
            <div class="w-full max-w-md py-8">
                <div class="flex lg:hidden items-center gap-2 justify-center mb-8">
                    <div class="w-9 h-9 bg-blue-700 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="text-slate-800 font-semibold text-lg">InvenControl</span>
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>
