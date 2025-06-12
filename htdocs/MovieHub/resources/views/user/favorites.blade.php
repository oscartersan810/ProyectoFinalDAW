@extends('layouts.app')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-gray-900 to-black flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Partículas decorativas -->
    <div class="absolute inset-0 pointer-events-none opacity-20 z-0">
        <div class="particle" style="top: 20%; left: 10%; width: 6px; height: 6px;"></div>
        <div class="particle" style="top: 60%; left: 80%; width: 8px; height: 8px;"></div>
        <div class="particle" style="top: 30%; left: 50%; width: 4px; height: 4px;"></div>
        <div class="particle" style="top: 75%; left: 30%; width: 5px; height: 5px;"></div>
    </div>

    <div 
        x-data="{ open: false, selectedItem: {}, isMovie: false }"
        class="relative bg-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-5xl border border-green-500 backdrop-blur-sm overflow-hidden z-10 animate-fade-in"
    >
        <div class="absolute top-0 right-0 w-32 h-32 bg-green-500 opacity-10 rounded-bl-full"></div>
        <div class="text-center mb-10 relative z-10">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-yellow-400 animate-text-glow">
                ❤️ Mis películas y series favoritas
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-green-500 to-yellow-500 mx-auto rounded-full mb-6"></div>
        </div>

        <div class="mb-10" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-yellow-400 mb-4">Películas favoritas</h2>
            @if($favoriteMovies->isEmpty())
                <p class="text-gray-400 mb-6">No tienes películas favoritas.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($favoriteMovies as $movie)
                        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700 transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl group animate-fade-in-up">
                            <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-white mb-2 group-hover:text-green-400 transition">{{ $movie->title }}</h3>
                                <div class="text-gray-400 text-sm mb-1">{{ $movie->genre }}</div>
                                <div class="text-gray-400 text-sm mb-2">{{ $movie->year }}</div>
                                <button
                                    @click="selectedItem = {{ json_encode([
                                        'id' => $movie->id,
                                        'title' => $movie->title,
                                        'poster' => $movie->poster,
                                        'genre' => $movie->genre,
                                        'year' => $movie->year,
                                        'description' => $movie->description,
                                        'rating' => $movie->average_rating,
                                        'type' => 'movies'
                                    ]) }}; isMovie = true; open = true"
                                    class="text-green-400 hover:underline focus:outline-none transition"
                                >
                                    Ver detalles
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-2xl font-bold text-yellow-400 mb-4">Series favoritas</h2>
            @if($favoriteSeries->isEmpty())
                <p class="text-gray-400 mb-6">No tienes series favoritas.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($favoriteSeries as $serie)
                        <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden border border-gray-700 transform transition duration-300 hover:-translate-y-2 hover:shadow-2xl group animate-fade-in-up">
                            <img src="{{ asset('storage/' . $serie->poster) }}" alt="{{ $serie->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-white mb-2 group-hover:text-green-400 transition">{{ $serie->title }}</h3>
                                <div class="text-gray-400 text-sm mb-1">{{ $serie->genre }}</div>
                                <div class="text-gray-400 text-sm mb-2">{{ $serie->year }}</div>
                                <button
                                    @click="selectedItem = {{ json_encode([
                                        'id' => $serie->id,
                                        'title' => $serie->title,
                                        'poster' => $serie->poster,
                                        'genre' => $serie->genre,
                                        'year' => $serie->year,
                                        'description' => $serie->description,
                                        'rating' => $serie->average_rating,
                                        'type' => 'series'
                                    ]) }}; isMovie = false; open = true"
                                    class="text-green-400 hover:underline focus:outline-none transition"
                                >
                                    Ver detalles
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Modal Detalles -->
        <div 
            x-show="open" 
            x-transition.opacity 
            class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center p-4"
            style="display: none;"
        >
            <div @click.away="open = false" class="bg-gray-800 rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-gray-700 relative animate-fade-in-up">
                <button @click="open = false" class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl font-bold z-10 transition">&times;</button>
                <div class="relative">
                    <div class="h-64 w-full bg-gray-900 overflow-hidden">
                        <img :src="'/storage/' + selectedItem.poster" class="w-full h-full object-cover opacity-50 transition duration-500" alt="">
                    </div>
                    <div class="relative z-10 p-6 md:p-8">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-shrink-0 w-full md:w-1/3 -mt-20">
                                <img :src="'/storage/' + selectedItem.poster" class="w-full rounded-xl shadow-xl border-4 border-gray-700" alt="">
                            </div>
                            <div class="flex-grow">
                                <h2 class="text-3xl font-bold text-white mb-2" x-text="selectedItem.title"></h2>
                                <div class="flex items-center space-x-4 mb-4">
                                    <span class="text-gray-400" x-text="selectedItem.year"></span>
                                    <span class="text-gray-400">•</span>
                                    <span class="text-gray-400" x-text="selectedItem.genre"></span>
                                </div>
                                <div class="flex items-center mb-6">
                                    <template x-for="i in 5" :key="i">
                                        <span
                                            :class="i <= Math.round(selectedItem.rating || 0) ? 'text-yellow-400' : 'text-gray-600'"
                                            class="text-2xl transition">★</span>
                                    </template>
                                    <span class="text-white ml-2" x-text="selectedItem.rating !== null ? '(' + parseFloat(selectedItem.rating).toFixed(1) + ')' : '(Sin valoración)'"></span>
                                </div>
                                <p class="text-gray-300 mb-6" x-text="selectedItem.description"></p>
                                <div class="flex space-x-4">
                                    <a :href="'/resenas/create?type=' + selectedItem.type + '&id=' + selectedItem.id"
                                        class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl transition"
                                    >
                                        Escribir Reseña
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<style>
    .particle {
        position: absolute;
        background-color: rgba(132, 204, 22, 0.6);
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
        z-index: 1;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    .animate-fade-in {
        animation: fadeIn 1s ease;
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(.39,.575,.565,1) both;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }
        100% {
            opacity: 1;
            transform: none;
        }
    }
    .animate-text-glow {
        animation: text-glow 3s ease-in-out infinite alternate;
    }
    @keyframes text-glow {
        from { text-shadow: 0 0 5px rgba(247, 239, 5, 0.5); }
        to { text-shadow: 0 0 15px rgba(16, 185, 129, 0.7); }
    }
</style>
@endsection