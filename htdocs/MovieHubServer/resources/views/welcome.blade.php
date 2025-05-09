@extends('layouts.app')

@section('content')
    <!-- BIENVENIDA -->
    <section id="bienvenida" class="text-center py-12 min-h-screen flex flex-col justify-center items-center bg-gray-700" data-aos="fade-up">
        <!-- Canvas para burbujas -->
        <h1 class="text-2xl md:text-5xl font-bold text-white mb-10 tracking-wide">BIENVENIDO A MOVIEHUB</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 w-full max-w-6xl">
            <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800">
                <img src="/images/moviesimages/movie1.png" alt="Película 1" class="w-full h-48 md:h-[28rem] object-cover object-top">
            </div>
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800">
                <img src="/images/moviesimages/movie2.jpg" alt="Película 2" class="w-full h-48 md:h-[28rem] object-cover object-top">
            </div>
            <div class="overflow-hidden rounded-2xl shadow-2xl transform transition duration-500 hover:scale-105 bg-gray-800">
                <img src="/images/moviesimages/movie3.png" alt="Película 3" class="w-full h-48 md:h-[28rem] object-cover object-top">
            </div>
        </div>
    </section>




    <!-- ACERCA DE MOVIEHUB -->
    <section id="acerca" class="relative bg-gray-800 py-10 px-4 min-h-screen flex items-center overflow-hidden" data-aos="fade-up">
        <!-- Burbujas animadas -->
        <div id="bubbles"></div>
        <div id="bubbles2"></div>
        <div id="bubbles3"></div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
            <h2 class="text-2xl md:text-5xl font-bold text-center md:text-left text-white">
                ACERCA DE MOVIEHUB
            </h2>
            <p class="text-base md:text-xl text-gray-300 text-center md:text-left">
                MovieHub es tu plataforma para descubrir, valorar y compartir películas y series. Únete a nuestra comunidad y empieza a explorar.
            </p>
        </div>
    </section>

    <!-- ¿QUÉ PUEDES HACER? -->
    <section id="acciones" class="py-16 px-6 min-h-screen flex flex-col justify-center bg-gray-700" data-aos="fade-up">
        <!-- Canvas para burbujas -->
        <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>
        <div class="relative z-10 max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-bold mb-12 text-center text-white tracking-wide">¿QUÉ PUEDES HACER EN MOVIEHUB?</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 justify-items-center">

                <!-- Caja 1 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-purple-700 to-indigo-700 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Puntuar tus películas y series favoritas
                </div>
                <!-- Caja 2 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-pink-600 to-red-600 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9" />
                    </svg>
                    Escribir y leer reseñas de otros usuarios
                </div>
                <!-- Caja 3 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-green-600 to-emerald-600 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 9l6 6" />
                    </svg>
                    Consultar rankings y valoraciones
                </div>
                <!-- Caja 4 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-yellow-500 to-orange-500 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Crear y gestionar listas personalizadas
                </div>
                <!-- Caja 5 -->
                <div class="w-36 h-36 bg-gradient-to-tr from-sky-500 to-blue-600 rounded-2xl flex flex-col items-center justify-center text-center p-4 text-white text-sm md:text-base font-medium shadow-lg hover:scale-105 hover:shadow-xl transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h2a2 2 0 0 1 2 2v6m-6-6h6" />
                    </svg>
                    Seguir a otros usuarios con gustos similares
                </div>
            </div>
        </div>
    </section>



    <!-- LA MÁS VALORADA DE LA SEMANA -->
    <section id="valorada" class="bg-gray-800 py-10 px-4 min-h-screen flex items-center" data-aos="fade-up">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">LA MÁS VALORADA DE ESTA SEMANA</h2>
            <div class="flex flex-col md:flex-row items-center space-y-6 md:space-y-0 md:space-x-6">
                <div class="w-full md:w-60 h-auto bg-gray-700 rounded-lg"></div>
                <div class="text-gray-300 text-center md:text-left">
                    <h3 class="text-xl font-semibold">Título y descripción de la película</h3>
                    <p class="text-lg">Una breve sinopsis o información destacada que motive al usuario a verla.</p>
                </div>
            </div>
        </div>
    </section>
 @endsection