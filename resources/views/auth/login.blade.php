<x-guest-layout>

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Bienvenido de nuevo</h2>
        <p class="text-slate-500 text-sm mt-1">Inicia sesión en tu cuenta</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-lg">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                Correo electrónico
            </label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="correo@ejemplo.com"
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                       placeholder-slate-400 transition
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                       @error('email') border-red-400 bg-red-50 @enderror"
            >
            @error('email')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-sm font-medium text-slate-700">Contraseña</label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs text-blue-600 hover:text-blue-800 transition">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                       placeholder-slate-400 transition
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                       @error('password') border-red-400 bg-red-50 @enderror"
            >
            @error('password')
                <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Recuérdame -->
        <div class="flex items-center gap-2">
            <input
                id="remember_me"
                type="checkbox"
                name="remember"
                class="w-4 h-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer"
            >
            <label for="remember_me" class="text-sm text-slate-600 cursor-pointer">Recordar sesión</label>
        </div>

        <!-- Botón -->
        <button
            type="submit"
            class="w-full py-2.5 px-4 bg-blue-700 hover:bg-blue-800 active:bg-blue-900
                   text-white font-semibold text-sm rounded-lg transition duration-150 shadow-sm"
        >
            Iniciar sesión
        </button>

        <!-- Registro -->
        <p class="text-center text-sm text-slate-500">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium transition">
                Regístrate aquí
            </a>
        </p>
    </form>

</x-guest-layout>
