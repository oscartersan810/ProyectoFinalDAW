@extends('layouts.app')

@section('content')
<!-- BIENVENIDA - Sección mejorada -->
<section id="bienvenida" class="text-center py-16 min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-800 to-gray-900 relative overflow-hidden" data-aos="fade-up">
    <!-- Efecto de partículas mejorado -->
    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute top-1/4 left-1/4 w-4 h-4 bg-yellow-500 rounded-full animate-float"></div>
        <div class="absolute top-1/3 right-1/3 w-6 h-6 bg-pink-500 rounded-full animate-float animation-delay-2000"></div>
        <div class="absolute bottom-1/4 left-1/3 w-5 h-5 bg-yellow-400 rounded-full animate-float animation-delay-3000"></div>
        <div class="absolute bottom-1/3 right-1/4 w-3 h-3 bg-blue-400 rounded-full animate-float animation-delay-1500"></div>
    </div>

    <div class="relative z-10">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-12 tracking-wide transform hover:scale-105 transition duration-500">
            BIENVENIDO A <span class="text-yellow-400">MOVIEHUB</span>
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 px-4 w-full max-w-6xl mx-auto">
            <div class="overflow-hidden rounded-3xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800 border-2 border-gray-700 hover:border-yellow-500 group">
                <img src="/images/moviesimages/movie1.png" alt="Película 1" class="w-full h-48 md:h-96 object-cover object-top group-hover:opacity-90 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
            </div>
            <div class="overflow-hidden rounded-3xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800 border-2 border-gray-700 hover:border-pink-500 group hidden sm:block">
                <img src="/images/moviesimages/movie2.jpg" alt="Película 2" class="w-full h-48 md:h-96 object-cover object-top group-hover:opacity-90 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
            </div>
            <div class="overflow-hidden rounded-3xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800 border-2 border-gray-700 hover:border-yellow-400 group hidden sm:block">
                <img src="/images/moviesimages/movie3.png" alt="Película 3" class="w-full h-48 md:h-96 object-cover object-top group-hover:opacity-90 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
            </div>
        </div>

        <div class="mt-16">
            <a href="#acerca" class="inline-flex items-center text-yellow-400 hover:text-white group transition duration-300">
                <span class="mr-2">Explora más</span>
                <svg class="w-5 h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- ACERCA DE MOVIEHUB - Sección mejorada -->
<section id="acerca" class="relative bg-gradient-to-br from-gray-900 to-gray-800 py-20 px-4 min-h-screen flex items-center overflow-hidden" data-aos="fade-up">
    <!-- Burbujas animadas mejoradas -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="bubble animate-float" style="left: 10%; animation-delay: 0s; width: 20px; height: 20px; background: rgba(99, 102, 241, 0.6);"></div>
            <div class="bubble animate-float" style="left: 30%; animation-delay: 2s; width: 25px; height: 25px; background: rgba(236, 72, 153, 0.6);"></div>
            <div class="bubble animate-float" style="left: 70%; animation-delay: 4s; width: 15px; height: 15px; background: rgba(16, 185, 129, 0.6);"></div>
            <div class="bubble animate-float" style="left: 90%; animation-delay: 1s; width: 30px; height: 30px; background: rgba(245, 158, 11, 0.6);"></div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-10">
        <div>
            <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-tight">
                ACERCA DE <span class="text-yellow-400">MOVIEHUB</span>
            </h2>
            <div class="w-24 h-1 bg-yellow-500 mb-8 rounded-full"></div>
        </div>
        <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-8 rounded-3xl border border-gray-700">
            <p class="text-lg md:text-xl text-gray-300 leading-relaxed">
                MovieHub es tu plataforma definitiva para descubrir, valorar y compartir películas y series.
                <span class="text-yellow-400 font-medium">Únete</span> a nuestra creciente comunidad de cinéfilos y
                <span class="text-pink-400 font-medium">explora</span> un universo de contenido cinematográfico.
            </p>
            <div class="mt-8 flex space-x-4">
                <a href="{{ route('register')}}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl transition duration-300 transform hover:-translate-y-1 inline-block text-center">
                    Registrarse
                </a>
                <a href="#acciones" class="bg-transparent hover:bg-gray-700 text-white font-bold py-3 px-6 border border-gray-600 rounded-xl transition duration-300 transform hover:-translate-y-1 inline-block text-center">
                    Saber más
                </a>

            </div>
        </div>
    </div>
</section>

<!-- ¿QUÉ PUEDES HACER? - Sección mejorada -->
<section id="acciones" class="py-20 px-4 min-h-screen flex flex-col justify-center bg-gradient-to-br from-gray-800 to-gray-700 relative overflow-hidden" data-aos="fade-up">
    <!-- Efecto de partículas -->
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="absolute top-1/4 left-1/4 w-4 h-4 bg-yellow-500 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-6 h-6 bg-pink-500 rounded-full animate-pulse animation-delay-2000"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-6xl font-bold text-white mb-4 tracking-wide">
                ¿QUÉ PUEDES HACER EN <span class="text-yellow-400">MOVIEHUB</span>?
            </h2>
            <div class="w-32 h-1 bg-yellow-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8 justify-items-center">
            <!-- Caja 1 mejorada -->
            <div class="w-full h-48 bg-gradient-to-br from-purple-700 to-yellow-700 rounded-3xl flex flex-col items-center justify-center text-center p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-purple-400">
                <div class="bg-white bg-opacity-20 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Puntuar peliculas y series</h3>
            </div>

            <!-- Caja 2 mejorada -->
            <div class="w-full h-48 bg-gradient-to-br from-pink-600 to-red-600 rounded-3xl flex flex-col items-center justify-center text-center p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-pink-400">
                <div class="bg-white bg-opacity-20 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Leer y escribir reseñas</h3>
            </div>

            <!-- Caja 3 mejorada -->
            <div class="w-full h-48 bg-gradient-to-br from-green-600 to-emerald-600 rounded-3xl flex flex-col items-center justify-center text-center p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-green-400">
                <div class="bg-white bg-opacity-20 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 9l6 6" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Consultar rankings</h3>
            </div>

            <!-- Caja 4 mejorada -->
            <div class="w-full h-48 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-3xl flex flex-col items-center justify-center text-center p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-yellow-400">
                <div class="bg-white bg-opacity-20 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Crear listas</h3>
            </div>

            <!-- Caja 5 mejorada -->
            <div class="w-full h-48 bg-gradient-to-br from-sky-500 to-blue-600 rounded-3xl flex flex-col items-center justify-center text-center p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-blue-400">
                <div class="bg-white bg-opacity-20 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h2a2 2 0 0 1 2 2v6m-6-6h6" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">Seguir usuarios</h3>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN: LA MÁS VALORADA -->
<section id="valorada" class="bg-gradient-to-br from-gray-900 to-gray-800 py-20 px-4 min-h-screen flex items-center" data-aos="fade-up" x-data="{ open: false, selectedItem: null }">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                PELÍCULA <span class="text-yellow-400">MÁS VALORADA</span>
            </h2>
            <div class="w-32 h-1 bg-yellow-500 mx-auto rounded-full"></div>
        </div>

        @if($topRatedMovie)
        <div class="flex flex-col md:flex-row items-center gap-12 bg-gray-800 bg-opacity-50 backdrop-blur-sm p-8 rounded-3xl border border-gray-700">
            <div class="w-full md:w-1/3 lg:w-1/4 overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105">
                <img src="{{ asset('storage/' . $topRatedMovie->poster) }}" alt="{{ $topRatedMovie->title }}" class="w-full h-auto object-cover">
            </div>
            <div class="w-full md:w-2/3 lg:w-3/4 text-gray-300">
                <h3 class="text-3xl font-bold text-white mb-4">{{ $topRatedMovie->title }}</h3>

                <div class="flex items-center mb-6">
                    <div class="flex mr-4">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="text-yellow-400 text-2xl">
                            {{ $i <= round($topRatedMovie->rating ?? 0) ? '★' : '☆' }}
                            </span>
                        @endfor
                    </div>
                    <span class="text-xl">{{ number_format($topRatedMovie->rating ?? 0, 1) }}/5</span>
                </div>

                <p class="text-lg leading-relaxed mb-6">
                    {{ $topRatedMovie->description ?? 'Sinopsis no disponible.' }}
                </p>

                @if($topRatedMovie->year)
                <div class="flex gap-4 mb-4">
                    <span class="px-4 py-2 bg-gray-700 rounded-full text-sm">{{ $topRatedMovie->year }}</span>
                </div>
                @endif

                <button 
                    @click="selectedItem = {{ $topRatedMovie->toJson() }}; open = true" 
                    class="mt-8 inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-8 rounded-xl transition duration-300 transform hover:-translate-y-1"
                >
                    Ver ahora
                </button>
            </div>
        </div>
        @else
        <p class="text-center text-gray-400">No hay películas valoradas aún.</p>
        @endif
    </div>

    {{-- Modal para película más valorada --}}
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center p-4" style="display: none;">
        <div @click.away="open = false" class="bg-gray-800 rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-gray-700 relative">
            <button @click="open = false" class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl font-bold z-10">&times;</button>

            <div class="relative">
                <div class="h-64 w-full bg-gray-900 overflow-hidden">
                    <img :src="'/storage/' + selectedItem.poster" class="w-full h-full object-cover opacity-50" alt="" />
                </div>

                <div class="relative z-10 p-6 md:p-8">
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex-shrink-0 w-full md:w-1/3 -mt-20">
                            <img :src="'/storage/' + selectedItem.poster" class="w-full rounded-xl shadow-xl border-4 border-gray-700" alt="" />
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
                                    <span :class="i <= Math.round(selectedItem.rating) ? 'text-yellow-400' : 'text-gray-600'" class="text-2xl">★</span>
                                </template>
                                <span class="text-white ml-2" x-text="'(' + parseFloat(selectedItem.rating).toFixed(1) + ')'"></span>
                            </div>

                            <p class="text-gray-300 mb-6" x-text="selectedItem.description"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Estilos para animaciones -->
<style>
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-3000 {
        animation-delay: 3s;
    }

    .animation-delay-1500 {
        animation-delay: 1.5s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .bubble {
        position: absolute;
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
    }
</style>
@endsection