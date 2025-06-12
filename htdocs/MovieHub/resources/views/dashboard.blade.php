@extends('layouts.app')

@section('content')

<!-- DASHBOARD PRINCIPAL -->
<main class="min-h-screen bg-gradient-to-br from-gray-900 to-black flex items-center justify-center p-6">
    <!-- Efecto de partículas -->
    <div class="absolute inset-0 overflow-hidden opacity-20">
        <div class="particle" style="top: 20%; left: 10%; width: 4px; height: 4px;"></div>
        <div class="particle" style="top: 60%; left: 80%; width: 6px; height: 6px;"></div>
        <div class="particle" style="top: 30%; left: 50%; width: 3px; height: 3px;"></div>
    </div>

    <div class="relative bg-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-6xl border border-yellow-500 backdrop-blur-sm overflow-hidden">
        <!-- Efecto de esquina -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 opacity-10 rounded-bl-full"></div>
        
        <!-- Encabezado -->
        <div class="text-center mb-10 relative z-10">
            <h1 class="text-4xl md:text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-green-400 animate-text-glow">
                ¡Bienvenido, <span class="font-[Concert+One]">{{ Auth::user()->name }}</span>!
            </h1>
            
            <!-- Avatar -->
            <div class="flex justify-center mb-8">
                @php
                    $avatarPath = Auth::user()->avatar;
                    $avatarUrl = Storage::disk('public')->exists('avatars/' . basename($avatarPath)) 
                        ? asset('storage/avatars/' . basename($avatarPath)) 
                        : asset('images/default_avatars/' . basename($avatarPath));
                @endphp
                
                <div class="relative group">
                    <img src="{{ $avatarUrl }}" 
                         alt="Avatar de {{ Auth::user()->name }}"
                         class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-yellow-500 shadow-xl group-hover:border-green-400 transition duration-500">
                    <div class="absolute inset-0 rounded-full border-4 border-transparent group-hover:border-white opacity-0 group-hover:opacity-100 transition duration-500"></div>
                </div>
            </div>
            
            <p class="text-xl text-gray-400 mb-2">Panel de control de tu cuenta</p>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-500 to-green-500 mx-auto rounded-full"></div>
        </div>

        <!-- Opciones principales -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Tarjeta 1: Mis reseñas -->
            <a href="{{ route('dashboard.resenas') }}" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-yellow-400 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                <div class="flex items-center mb-4">
                    <div class="bg-yellow-500 p-3 rounded-lg mr-4 group-hover:bg-yellow-600 transition">
                        <span class="text-2xl">🎬</span>
                    </div>
                    <h3 class="text-xl font-bold text-white">Mis reseñas</h3>
                </div>
                <p class="text-gray-400">Revisa y gestiona todas tus reseñas</p>
            </a>
            
            <!-- Tarjeta 2: Puntuadas -->
            <a href="{{ route('dashboard.puntuadas') }}" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-yellow-400 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                <div class="flex items-center mb-4">
                    <div class="bg-pink-500 p-3 rounded-lg mr-4 group-hover:bg-pink-600 transition">
                        <span class="text-2xl">⭐</span>
                    </div>
                    <h3 class="text-xl font-bold text-white">Películas y series puntuadas</h3>
                </div>
                <p class="text-gray-400">Tus valoraciones y calificaciones</p>
            </a>

            <!-- Tarjeta 3: Favoritos -->
            <a href="{{ route('dashboard.favorites') }}" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-pink-400 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                <div class="flex items-center mb-4">
                    <div class="bg-pink-500 p-3 rounded-lg mr-4 group-hover:bg-pink-600 transition">
                        <span class="text-2xl">❤️</span>
                    </div>
                    <h3 class="text-xl font-bold text-white">Mis películas y series favoritas</h3>
                </div>
                <p class="text-gray-400">Consulta tu lista de favoritos</p>
            </a>
            
            <!-- Tarjeta 4: Editar perfil -->
            <a href="{{ route('profile.edit') }}" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-yellow-400 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                <div class="flex items-center mb-4">
                    <div class="bg-yellow-500 p-3 rounded-lg mr-4 group-hover:bg-yellow-600 transition">
                        <span class="text-2xl">✏️</span>
                    </div>
                    <h3 class="text-xl font-bold text-white">Editar perfil</h3>
                </div>
                <p class="text-gray-400">Actualiza tu información personal</p>
            </a>
            
            <!-- Tarjeta 5: Cerrar sesión -->
            <form method="POST" action="{{ route('logout') }}" class="contents">
                @csrf
                <button type="submit" class="bg-gray-800 hover:bg-gray-700 border border-gray-700 hover:border-red-400 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group text-left w-full">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-500 p-3 rounded-lg mr-4 group-hover:bg-red-600 transition">
                            <span class="text-2xl">🔒</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Cerrar sesión</h3>
                    </div>
                    <p class="text-gray-400">Salir de tu cuenta</p>
                </button>
            </form>
        </div>

        <!-- Panel de administrador -->
        @auth
        @if(Auth::user()->role === 'admin')
        <div class="mt-12 pt-8 border-t border-gray-800">
            <h2 class="text-2xl font-bold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-cyan-400">
                Panel de Administrador
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Admin 1 -->
                <a href="{{ route('admin.movies') }}" class="bg-gray-800 hover:bg-green-900 border border-green-500 hover:border-green-300 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-500 p-3 rounded-lg mr-4 group-hover:bg-green-400 transition">
                            <span class="text-2xl">🎥</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Administrar películas</h3>
                    </div>
                    <p class="text-gray-400">Gestiona el catálogo de películas</p>
                </a>
                
                <!-- Admin 2 -->
                <a href="{{ route('admin.series') }}" class="bg-gray-800 hover:bg-green-900 border border-green-500 hover:border-green-300 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-500 p-3 rounded-lg mr-4 group-hover:bg-green-400 transition">
                            <span class="text-2xl">📺</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Administrar series</h3>
                    </div>
                    <p class="text-gray-400">Gestiona el catálogo de series</p>
                </a>
                
                <!-- Admin 3 -->
                <a href="{{ route('admin.users') }}" class="bg-gray-800 hover:bg-green-900 border border-green-500 hover:border-green-300 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-500 p-3 rounded-lg mr-4 group-hover:bg-green-400 transition">
                            <span class="text-2xl">👥</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Administrar usuarios</h3>
                    </div>
                    <p class="text-gray-400">Gestiona los usuarios del sistema</p>
                </a>

                <!-- Admin 4: Administrar reseñas -->
                <a href="{{ route('admin.reviews') }}" class="bg-gray-800 hover:bg-green-900 border border-green-500 hover:border-green-300 rounded-2xl p-6 shadow-lg transform hover:-translate-y-1 transition duration-300 group">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-500 p-3 rounded-lg mr-4 group-hover:bg-green-400 transition">
                            <span class="text-2xl">📝</span>
                        </div>
                        <h3 class="text-xl font-bold text-white">Administrar reseñas</h3>
                    </div>
                    <p class="text-gray-400">Gestiona todas las reseñas de usuarios</p>
                </a>
            </div>
        </div>
        @endif
        @endauth
    </div>
</main>

<!-- Estilos personalizados -->
<style>
    .animate-text-glow {
        animation: text-glow 3s ease-in-out infinite alternate;
    }
    @keyframes text-glow {
        from { text-shadow: 0 0 5px rgba(247, 239, 5, 0.5); }
        to { text-shadow: 0 0 15px rgba(16, 185, 129, 0.7); }
    }
    
    .particle {
        position: absolute;
        background-color: rgba(199, 228, 12, 0.6);
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
</style>
@endsection