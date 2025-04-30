<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');
        body {
            background: #1e1e1e;
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-gray-900 rounded-xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-green-300 text-center mb-8">Inicia Sesión en MovieHub</h2>

        @if (session('status'))
            <div class="mb-4 text-green-500 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" required autofocus
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium mb-1">Contraseña</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2 text-green-500">
                <label for="remember" class="text-sm">Recuérdame</label>
            </div>

            <!-- Botón -->
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-green-400 hover:bg-green-500 text-black font-bold rounded-lg transition duration-300 transform hover:scale-105">
                    Iniciar Sesión
                </button>
            </div>

            <div class="text-center text-sm text-gray-400">
                ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-green-300 hover:underline">Regístrate aquí</a>
            </div>
        </form>
    </div>

</body>
</html>
