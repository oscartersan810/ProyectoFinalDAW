<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MovieHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');
        body {
            background: #1e1e1e;
            font-family: 'Orbitron', sans-serif;
        }
        .group:hover .group-hover\:opacity-100 {
            opacity: 1;
        }
    </style>
</head>
<body class="text-white">

    <!-- NAVBAR -->
    <nav class="flex justify-between items-center px-6 py-4 bg-gray-900 text-white relative">
        <div class="text-3xl font-bold text-green-300">MOVIEHUB</div>
        <ul class="flex space-x-6 text-sm items-center">
            <li><a href="{{ route('dashboard') }}" class="hover:text-green-300 transition duration-300">Inicio</a></li>
            <li><a href="#" class="hover:text-green-300 transition duration-300">Explorar</a></li>
            <li><a href="#" class="hover:text-green-300 transition duration-300">Top Películas / Series</a></li>
            <li><a href="#" class="hover:text-green-300 transition duration-300">Reseñas</a></li>

            <!-- Avatar + Menú -->
            <li class="relative group">
                <button class="focus:outline-none flex items-center space-x-2">
                    <img src="{{ asset('storage/avatars/' . basename(Auth::user()->avatar)) }}"
                         alt="avatar"
                         class="w-10 h-10 rounded-full object-cover border-2 border-green-300">
                    <span class="text-sm hidden md:inline">{{ Auth::user()->name }}</span>
                </button>
                <ul class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition duration-200 z-50">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-700">Mi cuenta</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <section class="text-center py-20 min-h-screen">
        <h1 class="text-4xl font-bold mb-6">Bienvenido, {{ Auth::user()->name }}</h1>
        <p class="text-gray-300 text-lg">Aquí puedes gestionar tus películas, reseñas y mucho más.</p>

        <div class="mt-10 flex justify-center space-x-4">
            <a href="#" class="bg-green-500 hover:bg-green-400 text-black px-6 py-3 rounded-xl transition duration-300">Explorar Contenido</a>
            <a href="{{ route('profile.edit') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-3 rounded-xl transition duration-300">Editar Perfil</a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-4 bg-gray-900 text-gray-400">
        © 2025 MovieHub
    </footer>

</body>
</html>
