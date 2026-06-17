<x-guest-layout>

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Crear cuenta</h2>
        <p class="text-slate-500 text-sm mt-1">Completa tus datos para registrarte</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        {{-- Nombre y Apellido --}}
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">Nombre <span class="text-red-500">*</span></label>
                <input
                    id="name" type="text" name="name"
                    value="{{ old('name') }}"
                    required autofocus autocomplete="name"
                    placeholder="Juan"
                    class="w-full px-3 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                           placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition
                           @error('name') border-red-400 bg-red-50 @enderror"
                >
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="apellido" class="block text-sm font-medium text-slate-700 mb-1.5">Apellido</label>
                <input
                    id="apellido" type="text" name="apellido"
                    value="{{ old('apellido') }}"
                    autocomplete="family-name"
                    placeholder="Pérez"
                    class="w-full px-3 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                           placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition
                           @error('apellido') border-red-400 bg-red-50 @enderror"
                >
                @error('apellido')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">Correo electrónico <span class="text-red-500">*</span></label>
            <input
                id="email" type="email" name="email"
                value="{{ old('email') }}"
                required autocomplete="username"
                placeholder="correo@ejemplo.com"
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                       placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition
                       @error('email') border-red-400 bg-red-50 @enderror"
            >
            @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Teléfono y Dirección --}}
        <div class="grid grid-cols-2 gap-3">
            <div>
                <label for="telefono" class="block text-sm font-medium text-slate-700 mb-1.5">Teléfono</label>
                <input
                    id="telefono" type="text" name="telefono"
                    value="{{ old('telefono') }}"
                    placeholder="3001234567"
                    class="w-full px-3 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                           placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition
                           @error('telefono') border-red-400 bg-red-50 @enderror"
                >
                @error('telefono')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="direccion" class="block text-sm font-medium text-slate-700 mb-1.5">Dirección</label>
                <input
                    id="direccion" type="text" name="direccion"
                    value="{{ old('direccion') }}"
                    placeholder="Calle 123 #45-67"
                    class="w-full px-3 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                           placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition
                           @error('direccion') border-red-400 bg-red-50 @enderror"
                >
                @error('direccion')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Contraseña --}}
        <div>
            <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Contraseña <span class="text-red-500">*</span></label>
            <input
                id="password" type="password" name="password"
                required autocomplete="new-password"
                placeholder="Mínimo 8 caracteres"
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                       placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition
                       @error('password') border-red-400 bg-red-50 @enderror"
            >
            @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirmar contraseña --}}
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Confirmar contraseña <span class="text-red-500">*</span></label>
            <input
                id="password_confirmation" type="password" name="password_confirmation"
                required autocomplete="new-password"
                placeholder="Repite la contraseña"
                class="w-full px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-800 text-sm
                       placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
            >
            @error('password_confirmation')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botón --}}
        <button
            type="submit"
            class="w-full py-2.5 px-4 bg-blue-700 hover:bg-blue-800 active:bg-blue-900
                   text-white font-semibold text-sm rounded-lg transition duration-150 shadow-sm mt-2"
        >
            Crear cuenta
        </button>

        <p class="text-center text-sm text-slate-500">
            ¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium transition">
                Inicia sesión
            </a>
        </p>
    </form>

</x-guest-layout>
