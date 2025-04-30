<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - MovieHub</title>
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
        <h2 class="text-3xl font-bold text-green-300 text-center mb-8">Crea tu cuenta en MovieHub</h2>

        <form method="POST" action="{{ route('register') }}" class="space-y-6" enctype="multipart/form-data">
            @csrf

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-sm font-medium mb-1">Nombre de usuario</label>
                <input type="text" name="name" id="name" required autofocus
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium mb-1">Correo electrónico</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Avatar -->
            <div>
                <label for="avatar" class="block text-sm font-medium mb-1">Avatar (opcional)</label>
                <input type="file" name="avatar" id="avatar"
                       class="block w-full text-sm text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                              file:text-sm file:font-semibold file:bg-green-400 file:text-black hover:file:bg-green-500 transition">
                @error('avatar')
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

            <!-- Confirmar Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium mb-1">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full px-4 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:ring-2 focus:ring-green-300">
            </div>

            <!-- Botón -->
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-green-400 hover:bg-green-500 text-black font-bold rounded-lg transition duration-300 transform hover:scale-105">
                    Registrarse
                </button>
            </div>

            <div class="text-center text-sm text-gray-400">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-green-300 hover:underline">Inicia sesión</a>
            </div>
        </form>
    </div>

</body>
</html>
