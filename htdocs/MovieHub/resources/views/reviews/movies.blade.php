@extends('layouts.app')

@section('content')
<!-- SECCIÓN DE RESEÑAS -->
<section id="reviews" class="min-h-screen bg-gray-700 py-12 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
    <!-- Canvas para burbujas (opcional) -->
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <div class="max-w-7xl mx-auto relative z-10">
        {{-- Título principal --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-5xl font-bold text-white tracking-wide">
                RESEÑAS DE PELÍCULAS
            </h1>
            <div class="w-20 h-1 bg-yellow-500 mx-auto mt-4 rounded-full"></div>
        </div>

        {{-- Filtros de búsqueda --}}
        <form method="GET" action="{{ route('reviews.movies') }}" class="mb-8">
            <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0 justify-center">
                <input type="text" name="movie_title" value="{{ request('movie_title') }}"
                    placeholder="Título de la película"
                    class="w-full md:w-60 px-4 py-2 rounded-lg bg-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                <input type="text" name="user_name" value="{{ request('user_name') }}"
                    placeholder="Nombre de usuario"
                    class="w-full md:w-60 px-4 py-2 rounded-lg bg-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" />
                <select name="rating" class="w-full md:w-40 px-4 py-2 rounded-lg bg-gray-600 text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="">Todos los puntajes</option>
                    @for ($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" @if(request('rating')==$i) selected @endif>{{ $i }} estrellas</option>
                    @endfor
                </select>
                <button type="submit"
                    class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition font-semibold shadow">
                    Filtrar
                </button>
            </div>
        </form>


        {{-- Grid de reseñas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($reviews as $review)
            <div class="bg-gray-800 p-6 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 border border-gray-700 transform hover:-translate-y-1">
                {{-- Encabezado con avatar y título --}}
                <div class="flex items-center mb-4">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $review->user->avatar) }}"
                            class="w-14 h-14 rounded-full border-2 border-yellow-500 object-cover"
                            alt="Avatar de {{ $review->user->name }}">
                        <div class="absolute -bottom-1 -right-1 bg-yellow-600 rounded-full w-6 h-6 flex items-center justify-center">
                            <span class="text-white text-xs font-bold">★</span>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-white">{{ $review->movie->title }}</h3>
                        <p class="text-yellow-400">{{ $review->user->name }}</p>
                    </div>
                </div>

                {{-- Rating --}}
                <div class="flex mb-3">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="text-{{ $i <= $review->rating ? 'yellow-400' : 'gray-500' }} text-xl mr-1">★</span>
                        @endfor
                        <span class="text-white ml-2 font-medium">{{ $review->rating }}/5</span>
                </div>

                {{-- Contenido de la reseña --}}
                <div class="bg-gray-700 p-4 rounded-lg">
                    <p class="text-gray-300 whitespace-pre-line">{{ $review->content }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div> <!-- Aquí termina el grid -->
    <div class="mt-10 flex justify-center">
        {{ $reviews->withQueryString()->links() }}
    </div>
    </div>
</section>
@endsection