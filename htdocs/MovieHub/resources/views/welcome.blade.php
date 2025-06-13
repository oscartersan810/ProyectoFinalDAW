@extends('layouts.app')

@section('content')
<!-- BIENVENIDA - Optimizada para móviles pequeños -->
<section id="bienvenida" class="text-center py-8 md:py-16 min-h-[60vh] md:min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-gray-800 to-gray-900 relative overflow-hidden" data-aos="fade-up">
    <!-- Efecto de partículas simplificado para móviles -->
    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-500 rounded-full animate-float"></div>
        <div class="absolute bottom-1/3 right-1/4 w-1.5 h-1.5 bg-blue-400 rounded-full animate-float animation-delay-1500"></div>
    </div>

    <div class="relative z-10 w-full px-4">
        <!-- Título ajustado para móviles -->
        <h1 class="text-3xl xs:text-4xl md:text-6xl font-bold text-white mb-6 md:mb-12 tracking-wide">
            BIENVENIDO A <span class="text-yellow-400">MOVIEHUB</span>
        </h1>

        <!-- Grid de películas optimizado para móviles -->
        <div class="flex sm:grid sm:grid-cols-3 gap-4 md:gap-8 w-full max-w-6xl mx-auto overflow-x-auto sm:overflow-visible pb-6 sm:pb-0 hide-scrollbar">
            <!-- Película 1 - Siempre visible -->
            <div class="min-w-[180px] sm:min-w-0 overflow-hidden rounded-xl md:rounded-3xl shadow-lg transform transition duration-300 hover:scale-105 bg-gray-800 border border-gray-700 hover:border-yellow-500 group">
                <img src="/images/moviesimages/movie1.png" alt="Película 1" class="w-full h-40 sm:h-48 md:h-96 object-cover object-top group-hover:opacity-90 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
            </div>

            <!-- Película 2 - Visible en móviles como scroll horizontal -->
            <div class="min-w-[180px] sm:min-w-0 overflow-hidden rounded-xl md:rounded-3xl shadow-lg transform transition duration-300 hover:scale-105 bg-gray-800 border border-gray-700 hover:border-pink-500 group sm:block">
                <img src="/images/moviesimages/movie2.jpg" alt="Película 2" class="w-full h-40 sm:h-48 md:h-96 object-cover object-top group-hover:opacity-90 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
            </div>

            <!-- Película 3 - Visible en móviles como scroll horizontal -->
            <div class="min-w-[180px] sm:min-w-0 overflow-hidden rounded-xl md:rounded-3xl shadow-lg transform transition duration-300 hover:scale-105 bg-gray-800 border border-gray-700 hover:border-yellow-400 group sm:block">
                <img src="/images/moviesimages/movie3.png" alt="Película 3" class="w-full h-40 sm:h-48 md:h-96 object-cover object-top group-hover:opacity-90 transition duration-300">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
            </div>
        </div>

        <!-- Botón de explorar ajustado -->
        <div class="mt-8 md:mt-16">
            <a href="#acerca" class="inline-flex items-center text-yellow-400 hover:text-white group transition duration-300 text-base sm:text-lg">
                <span class="mr-2 sm:mr-2">Explora más</span>
                <svg class="w-4 h-4 sm:w-5 sm:h-5 group-hover:translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- ACERCA DE MOVIEHUB - Sección mejorada -->
<section id="acerca" class="relative bg-gradient-to-br from-gray-900 to-gray-800 py-12 md:py-20 px-4 md:px-4 min-h-[70vh] md:min-h-screen flex items-center overflow-hidden" data-aos="fade-up">
    <!-- Burbujas animadas mejoradas -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="bubble animate-float" style="left: 10%; animation-delay: 0s; width: 12px; height: 12px; background: rgba(99, 102, 241, 0.6);"></div>
            <div class="bubble animate-float" style="left: 30%; animation-delay: 2s; width: 14px; height: 14px; background: rgba(236, 72, 153, 0.6);"></div>
            <div class="bubble animate-float" style="left: 70%; animation-delay: 4s; width: 10px; height: 10px; background: rgba(16, 185, 129, 0.6);"></div>
            <div class="bubble animate-float" style="left: 90%; animation-delay: 1s; width: 18px; height: 18px; background: rgba(245, 158, 11, 0.6);"></div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center relative z-10 px-2">
        <div class="text-center md:text-left">
            <h2 class="text-3xl sm:text-4xl md:text-6xl font-bold text-white mb-6 md:mb-8 leading-tight">
                ACERCA DE <span class="text-yellow-400">MOVIEHUB</span>
            </h2>
            <div class="w-24 md:w-24 h-1 bg-yellow-500 mb-6 md:mb-8 rounded-full mx-auto md:mx-0"></div>
        </div>
        <div class="bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 md:p-8 rounded-xl md:rounded-3xl border border-gray-700">
            <p class="text-base sm:text-lg md:text-xl text-gray-300 leading-relaxed mb-4">
                MovieHub es tu plataforma definitiva para descubrir, valorar y compartir películas y series.
                <span class="text-yellow-400 font-medium">Únete</span> a nuestra creciente comunidad de cinéfilos y
                <span class="text-pink-400 font-medium">explora</span> un universo de contenido cinematográfico.
            </p>
            <div class="mt-6 md:mt-8 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 justify-center md:justify-start">
                <a href="{{ route('register')}}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 md:py-3 md:px-6 rounded-xl transition duration-300 transform hover:-translate-y-1 inline-block text-center text-base md:text-base">
                    Registrarse
                </a>
                <a href="#acciones" class="bg-transparent hover:bg-gray-700 text-white font-bold py-3 px-6 md:py-3 md:px-6 border border-gray-600 rounded-xl transition duration-300 transform hover:-translate-y-1 inline-block text-center text-base md:text-base">
                    Saber más
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ¿QUÉ PUEDES HACER? - Sección mejorada -->
<section id="acciones" class="py-12 md:py-20 px-4 md:px-4 min-h-[70vh] md:min-h-screen flex flex-col justify-center bg-gradient-to-br from-gray-800 to-gray-700 relative overflow-hidden" data-aos="fade-up">
    <!-- Efecto de partículas -->
    <div class="absolute inset-0 z-0 opacity-10">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 sm:w-4 sm:h-4 bg-yellow-500 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 sm:w-6 sm:h-6 bg-pink-500 rounded-full animate-pulse animation-delay-2000"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-2">
        <div class="text-center mb-10 md:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-6xl font-bold text-white mb-4 md:mb-4 tracking-wide">
                ¿QUÉ PUEDES HACER EN <span class="text-yellow-400">MOVIEHUB</span>?
            </h2>
            <div class="w-24 md:w-32 h-1 bg-yellow-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6 md:gap-10 justify-items-center place-items-center">
            <!-- Caja 1 -->
            <div class="w-full max-w-xs h-36 sm:h-40 md:h-48 bg-gradient-to-br from-purple-700 to-yellow-700 rounded-xl md:rounded-3xl flex flex-col items-center justify-center text-center p-4 md:p-6 text-white shadow-lg md:shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-purple-400">
                <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-full mb-3 md:mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-10 md:h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold">Puntuar películas y series</h3>
            </div>
            <!-- Caja 2 -->
            <div class="w-full max-w-xs h-36 sm:h-40 md:h-48 bg-gradient-to-br from-pink-600 to-red-600 rounded-xl md:rounded-3xl flex flex-col items-center justify-center text-center p-4 md:p-6 text-white shadow-lg md:shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-pink-400">
                <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-full mb-3 md:mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-10 md:h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold">Leer y escribir reseñas</h3>
            </div>
            <!-- Caja 3 -->
            <div class="w-full max-w-xs h-36 sm:h-40 md:h-48 bg-gradient-to-br from-green-600 to-emerald-600 rounded-xl md:rounded-3xl flex flex-col items-center justify-center text-center p-4 md:p-6 text-white shadow-lg md:shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-green-400">
                <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-full mb-3 md:mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-10 md:h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 9l6 6" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold">Consultar rankings</h3>
            </div>
            <!-- Caja 4 -->
            <div class="w-full max-w-xs h-36 sm:h-40 md:h-48 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-xl md:rounded-3xl flex flex-col items-center justify-center text-center p-4 md:p-6 text-white shadow-lg md:shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 border-2 border-transparent hover:border-yellow-400">
                <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-full mb-3 md:mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-10 md:h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="text-sm md:text-lg font-semibold">Añadir favoritas</h3>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN: LA MÁS VALORADA -->
<section id="valorada" class="bg-gradient-to-br from-gray-900 to-gray-800 py-12 md:py-20 px-4 md:px-4 min-h-[70vh] md:min-h-screen flex items-center" data-aos="fade-up" x-data="{ open: false, selectedItem: null }">
    <div class="max-w-6xl mx-auto w-full">
        <div class="text-center mb-10 md:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 md:mb-4">
                PELÍCULA <span class="text-yellow-400">MÁS VALORADA</span>
            </h2>
            <div class="w-24 md:w-32 h-1 bg-yellow-500 mx-auto rounded-full"></div>
        </div>

        @if($topRatedMovie)
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12 bg-gray-800 bg-opacity-50 backdrop-blur-sm p-6 md:p-8 rounded-xl md:rounded-3xl border border-gray-700">
            <!-- Imagen más grande en móvil -->
            <div class="w-full md:w-1/5 overflow-hidden rounded-xl md:rounded-2xl shadow-xl md:shadow-2xl transform transition duration-500 hover:scale-105">
                <img src="{{ asset('storage/' . $topRatedMovie->poster) }}" alt="{{ $topRatedMovie->title }}" class="w-full h-auto object-cover">
            </div>
            <div class="w-full md:w-4/5 text-gray-300 mt-4 md:mt-0">
                <h3 class="text-2xl sm:text-3xl md:text-3xl font-bold text-white mb-3 md:mb-4">{{ $topRatedMovie->title }}</h3>
                <div class="flex items-center mb-4 md:mb-6">
                    <div class="flex mr-3 md:mr-4">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="text-yellow-400 text-xl md:text-2xl">
                            {{ $i <= round($topRatedMovie->rating ?? 0) ? '★' : '☆' }}
                            </span>
                            @endfor
                    </div>
                    <span class="text-lg md:text-xl">{{ number_format($topRatedMovie->rating ?? 0, 1) }}/5</span>
                </div>
                <p class="text-base md:text-lg leading-relaxed mb-4 md:mb-6">
                    {{ $topRatedMovie->description ?? 'Sinopsis no disponible.' }}
                </p>
                @if($topRatedMovie->year)
                <div class="flex gap-3 md:gap-4 mb-4 md:mb-4">
                    <span class="px-4 py-2 md:px-4 md:py-2 bg-gray-700 rounded-full text-sm md:text-sm">{{ $topRatedMovie->year }}</span>
                </div>
                @endif

                <button
                    @click="selectedItem = {{ $topRatedMovie->toJson() }}; open = true"
                    class="mt-6 md:mt-8 inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-8 md:py-3 md:px-8 rounded-xl transition duration-300 transform hover:-translate-y-1 text-base md:text-base w-full sm:w-auto text-center">
                    Ver ahora
                </button>
            </div>
        </div>
        @else
        <p class="text-center text-gray-400 text-lg">No hay películas valoradas aún.</p>
        @endif
    </div>

    {{-- Modal para película más valorada --}}
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center p-4 md:p-4" style="display: none;">
        <div @click.away="open = false" class="bg-gray-800 rounded-xl md:rounded-2xl max-w-2xl md:max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-gray-700 relative">
            <button @click="open = false" class="absolute top-4 md:top-4 right-4 md:right-4 text-gray-400 hover:text-white text-2xl md:text-2xl font-bold z-10">&times;</button>
            <div class="relative">
                <div class="h-40 md:h-64 w-full bg-gray-900 overflow-hidden">
                    <img :src="'/storage/' + selectedItem.poster" class="w-full h-full object-cover opacity-50" alt="" />
                </div>
                <div class="relative z-10 p-6 md:p-8">
                    <div class="flex flex-col md:flex-row gap-6 md:gap-6">
                        <div class="flex-shrink-0 w-full md:w-1/3 -mt-16 md:-mt-20">
                            <img :src="'/storage/' + selectedItem.poster" class="w-full rounded-lg md:rounded-xl shadow-xl border-2 md:border-4 border-gray-700" alt="" />
                        </div>
                        <div class="flex-grow mt-4 md:mt-0">
                            <h2 class="text-2xl md:text-3xl font-bold text-white mb-2 md:mb-2" x-text="selectedItem.title"></h2>
                            <div class="flex flex-wrap items-center space-x-2 md:space-x-4 mb-3 md:mb-4">
                                <span class="text-gray-400 text-sm md:text-base" x-text="selectedItem.year"></span>
                                <span class="text-gray-400 hidden md:inline">•</span>
                                <span class="text-gray-400 text-sm md:text-base" x-text="selectedItem.genre"></span>
                            </div>
                            <div class="flex items-center mb-4 md:mb-6">
                                <template x-for="i in 5" :key="i">
                                    <span :class="i <= Math.round(selectedItem.rating) ? 'text-yellow-400' : 'text-gray-600'" class="text-xl md:text-2xl">★</span>
                                </template>
                                <span class="text-white ml-2 text-sm md:text-base" x-text="'(' + parseFloat(selectedItem.rating).toFixed(1) + ')'"></span>
                            </div>
                            <p class="text-gray-300 mb-4 md:mb-6 text-sm md:text-base" x-text="selectedItem.description"></p>
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
        0%, 100% {
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
    
    /* Ocultar scrollbar en móvil pero permitir scroll */
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    
    /* Mejorar espaciado en móviles pequeños */
    @media (max-width: 400px) {
        #bienvenida h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }
        #acciones .grid {
            gap: 0.5rem;
        }
    }
</style>
@endsection