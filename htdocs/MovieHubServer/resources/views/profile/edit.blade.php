<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');

        body {
            background-color: #1e1e1e;
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>

<body class="text-white">

    <!-- NAVBAR -->
    <nav class="flex justify-between items-center px-6 py-4 bg-gray-900">
        <div class="text-2xl font-bold text-green-300">MOVIEHUB</div>
        <ul class="flex space-x-6 text-sm items-center">
            <li><a href="{{ route('dashboard') }}" class="hover:text-green-300 transition">Inicio</a></li>
            <li><a href="#" class="hover:text-green-300 transition">Explorar</a></li>
            <li><a href="{{ route('profile.edit') }}" class="hover:text-green-300 transition">Mi Cuenta</a></li>
            <li>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-red-400 transition">Cerrar Sesión</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- CONTENIDO -->
    <section class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-3xl bg-gray-800 p-10 rounded-xl shadow-2xl space-y-6">
            <h1 class="text-3xl font-bold text-green-300 text-center">Editar Perfil</h1>

            @if (session('status') === 'profile-updated')
            <div class="bg-green-500 text-white text-center p-3 rounded-md">
                Perfil actualizado con éxito.
            </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Nombre -->
                <div>
                    <label for="name" class="block mb-1">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required
                        class="w-full bg-gray-700 border border-gray-600 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block mb-1">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required
                        class="w-full bg-gray-700 border border-gray-600 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition">
                </div>

                <!-- Avatar -->
                <div>
                    <label for="avatar" class="block mb-1">Foto de Perfil</label>
                    <input type="file" name="avatar" id="avatar" accept="image/*"
                        class="bg-gray-700 text-white border border-gray-600 p-2 rounded-lg w-full cursor-pointer">
                    @if (auth()->user()->avatar)
                    <div class="mt-4">
                        <p class="text-sm text-gray-400">Vista previa actual:</p>
                        @if (auth()->user()->avatar)
                        <img src="{{ asset('storage/avatars/' . basename(auth()->user()->avatar)) }}" class="w-24 h-24 rounded-full object-cover border-2 border-green-300 mt-2">
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Botón -->
                <div class="text-center pt-4">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 transition px-6 py-2 rounded-lg font-semibold text-white">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-4 bg-gray-900 text-gray-400">
        © 2025 MovieHub
    </footer>

</body>

</html>