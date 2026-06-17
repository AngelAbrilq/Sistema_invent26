<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin · InvenControl</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-100 antialiased">

    {{-- SIDEBAR --}}
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-slate-900 flex flex-col flex-shrink-0">
            {{-- Logo --}}
            <div class="px-6 py-5 border-b border-slate-700">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">InvenControl</p>
                        <p class="text-blue-400 text-xs">Administrador</p>
                    </div>
                </div>
            </div>

            {{-- Nav --}}
            <nav class="flex-1 px-4 py-4 space-y-1">
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg bg-blue-600 text-white text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Productos
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    Compras
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Ventas
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Usuarios
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-white text-sm transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    Reportes
                </a>
            </nav>

            {{-- Logout --}}
            <div class="px-4 py-4 border-t border-slate-700">
                <div class="flex items-center gap-3 px-3 py-2.5 mb-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white text-xs font-medium truncate">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</p>
                        <p class="text-slate-500 text-xs truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-slate-400 hover:bg-slate-800 hover:text-red-400 text-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        {{-- CONTENIDO PRINCIPAL --}}
        <main class="flex-1 overflow-y-auto">
            {{-- Header --}}
            <div class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-bold text-slate-800">Dashboard</h1>
                    <p class="text-slate-500 text-xs">Resumen general del sistema</p>
                </div>
                <span class="text-xs text-slate-400">{{ now()->format('d/m/Y') }}</span>
            </div>

            <div class="p-8">
                {{-- Bienvenida --}}
                <div class="bg-gradient-to-r from-slate-900 to-blue-900 rounded-2xl p-6 mb-8 text-white">
                    <p class="text-blue-300 text-sm mb-1">Bienvenido de nuevo,</p>
                    <h2 class="text-2xl font-bold">{{ auth()->user()->name }} {{ auth()->user()->apellido }} 👋</h2>
                    <p class="text-blue-200 text-sm mt-1 opacity-75">Panel de administración · InvenControl</p>
                </div>

                {{-- KPIs --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                    @php
                        $cards = [
                            ['label' => 'Productos', 'value' => '—', 'color' => 'blue', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                            ['label' => 'Ventas hoy', 'value' => '—', 'color' => 'emerald', 'icon' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z'],
                            ['label' => 'Usuarios', 'value' => '—', 'color' => 'violet', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                            ['label' => 'Proveedores', 'value' => '—', 'color' => 'amber', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                        ];
                        $colors = ['blue' => 'bg-blue-50 text-blue-700', 'emerald' => 'bg-emerald-50 text-emerald-700', 'violet' => 'bg-violet-50 text-violet-700', 'amber' => 'bg-amber-50 text-amber-700'];
                    @endphp

                    @foreach($cards as $card)
                    <div class="bg-white rounded-2xl p-5 border border-slate-100 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-slate-500 text-sm">{{ $card['label'] }}</span>
                            <div class="w-9 h-9 {{ $colors[$card['color']] }} rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $card['icon'] }}"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-3xl font-bold text-slate-800">{{ $card['value'] }}</p>
                        <p class="text-xs text-slate-400 mt-1">Próximamente disponible</p>
                    </div>
                    @endforeach
                </div>

                {{-- Info rol --}}
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
                    <h3 class="text-slate-700 font-semibold text-sm mb-4">Información de sesión</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                        <div>
                            <p class="text-slate-400 text-xs mb-1">Nombre</p>
                            <p class="text-slate-700 font-medium">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 text-xs mb-1">Email</p>
                            <p class="text-slate-700 font-medium">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 text-xs mb-1">Rol</p>
                            <span class="inline-block px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">Administrador</span>
                        </div>
                        <div>
                            <p class="text-slate-400 text-xs mb-1">Estado</p>
                            <span class="inline-block px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-semibold">{{ auth()->user()->estado }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
