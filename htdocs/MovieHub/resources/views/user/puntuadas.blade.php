@extends('layouts.app')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-gray-900 to-black flex items-center justify-center p-6">
    <div class="relative bg-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-xl border border-yellow-500 backdrop-blur-sm overflow-hidden">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-10 text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-green-400 animate-text-glow">
            Películas y Series Puntuadas
        </h2>

        <div class="flex flex-col md:flex-row gap-8 justify-center items-center">
            <div class="bg-yellow-600 bg-opacity-80 rounded-xl p-8 shadow text-center flex-1">
                <div class="text-5xl font-bold mb-2">{{ $movieCount }}</div>
                <div class="text-xl font-semibold">Películas puntuadas</div>
                <div class="mt-2 text-yellow-200 text-4xl">🎬</div>
            </div>
            <div class="bg-green-600 bg-opacity-80 rounded-xl p-8 shadow text-center flex-1">
                <div class="text-5xl font-bold mb-2">{{ $serieCount }}</div>
                <div class="text-xl font-semibold">Series puntuadas</div>
                <div class="mt-2 text-green-100 text-4xl">📺</div>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('dashboard.resenas') }}"
               class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition duration-300">
                Ver mis reseñas
            </a>
        </div>
    </div>
</main>

<style>
    .animate-text-glow {
        animation: text-glow 3s ease-in-out infinite alternate;
    }
    @keyframes text-glow {
        from { text-shadow: 0 0 5px rgba(247, 239, 5, 0.5); }
        to { text-shadow: 0 0 15px rgba(16, 185, 129, 0.7); }
    }
</style>
@endsection
