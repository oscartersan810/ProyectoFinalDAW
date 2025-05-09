@extends('layouts.app')

@section('content')

<!-- CONTENIDO PRINCIPAL -->
<main class="p-6 flex flex-col items-center justify-center min-h-screen bg-black bg-opacity-60">
    <div class="bg-gray-900 bg-opacity-80 rounded-2xl shadow-2xl p-10 w-full max-w-5xl text-white border border-green-300 backdrop-blur-sm">
        <h1 class="text-4xl font-extrabold mb-4 text-center text-green-300 font-[Concert+One] animate-fade-in">
            ¡Hola {{ Auth::user()->name }}!
        </h1>

        <!-- Foto de perfil en grande -->
        <div class="flex justify-center mb-6 animate-fade-in delay-75">
            @php
            // Obtener la ruta completa del avatar
            $avatarPath = Auth::user()->avatar;

            // Verificar si el avatar está en storage/avatars o en images/default_avatars
            $avatarUrl = Storage::disk('public')->exists('avatars/' . basename($avatarPath))
            ? asset('storage/avatars/' . basename($avatarPath))
            : asset('images/default_avatars/' . basename($avatarPath));
            @endphp

            <img src="{{ $avatarUrl }}"
                alt="Avatar de {{ Auth::user()->name }}"
                class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-green-300 shadow-lg">
        </div>

        <p class="text-lg text-center text-gray-300 mb-6 animate-fade-in delay-100">
            Opciones de perfil
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 mt-8">
            <!-- Opciones generales -->
            <a href="#"
                class="border border-white text-white py-4 px-6 rounded-xl text-center shadow-lg transform hover:scale-105 hover:bg-white hover:text-black transition duration-300 ease-in-out animate-pop-in">
                🎬 Mis reseñas
            </a>
            <a href="#"
                class="border border-white text-white py-4 px-6 rounded-xl text-center shadow-lg transform hover:scale-105 hover:bg-white hover:text-black transition duration-300 ease-in-out animate-pop-in">
                ⭐ Películas puntuadas
            </a>
            <a href="{{ route('profile.edit') }}"
                class="border border-white text-white py-4 px-6 rounded-xl text-center shadow-lg transform hover:scale-105 hover:bg-white hover:text-black transition duration-300 ease-in-out animate-pop-in">
                ✏️ Editar perfil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="animate-pop-in delay-300">
                @csrf
                <button type="submit"
                    class="w-full border border-white text-white py-4 px-6 rounded-xl shadow-lg transform hover:scale-105 hover:bg-white hover:text-black transition duration-300 ease-in-out animate-pop-in">
                    🔒 Cerrar sesión
                </button>
            </form>

            <!-- Opciones de administrador -->
            @auth
            @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.movies') }}"
                class="border border-green-400 text-white py-4 px-6 rounded-xl text-center shadow-lg transform hover:scale-105 hover:bg-green-400 hover:text-black transition duration-300 ease-in-out animate-pop-in delay-400">
                🎥 Administrar películas
            </a>
            <a href="{{ route('admin.series') }}"
                class="border border-green-400 text-white py-4 px-6 rounded-xl text-center shadow-lg transform hover:scale-105 hover:bg-green-400 hover:text-black transition duration-300 ease-in-out animate-pop-in delay-400">
                📺 Administrar series
            </a>

            <!-- Botón centrado en su propia fila -->
            <div class="col-span-1 sm:col-span-2 flex justify-center animate-pop-in delay-600">
                <a href="{{ route('admin.users') }}"
                    class="border border-green-400 text-white py-4 px-6 rounded-xl text-center shadow-lg transform hover:scale-105 hover:bg-green-400 hover:text-black transition duration-300 ease-in-out w-full sm:w-1/2">
                    👥 Administrar usuarios
                </a>
            </div>
            @endif
            @endauth
        </div>

    </div>
</main>
@endsection