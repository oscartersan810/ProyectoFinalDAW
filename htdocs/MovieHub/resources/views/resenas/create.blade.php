@extends('layouts.app')

@section('content')
@if(isset($movie) || isset($serie))
<section id="create-review" class="min-h-screen bg-gray-700 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center" data-aos="fade-up">
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <div class="max-w-2xl w-full relative z-10">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-gray-700 transform hover:shadow-3xl transition duration-300">
            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-white tracking-wide">
                    ESCRIBIR RESEÑA
                </h1>
                <div class="w-16 h-1 bg-indigo-500 mx-auto mt-3 rounded-full"></div>

                @if(isset($movie))
                <p class="text-indigo-400 mt-4 text-lg">
                    Para: <span class="font-semibold">{{ $movie->title }}</span>
                </p>
                @elseif(isset($serie))
                <p class="text-indigo-400 mt-4 text-lg">
                    Para: <span class="font-semibold">{{ $serie->title }}</span>
                </p>
                @endif
            </div>

            {{-- Formulario --}}
            <form
                action="{{ isset($movie) ? route('resenas.pelicula.store') : route('resenas.serie.store') }}"
                method="POST"
                class="space-y-6">
                @csrf

                {{-- Campos ocultos --}}
                @if(isset($movie))
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                @elseif(isset($serie))
                <input type="hidden" name="serie_id" value="{{ $serie->id }}">
                @endif

                {{-- Calificación --}}
                <div>
                    <label class="block text-lg font-medium text-gray-300 mb-3">Tu Calificación</label>
                    <div class="flex justify-center space-x-2 mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            <input type="radio" name="rating" id="star-{{ $i }}" value="{{ $i }}"
                            class="hidden peer/star-{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                            <label for="star-{{ $i }}"
                                class="text-2xl cursor-pointer peer-checked/star-{{ $i }}:text-yellow-400 text-gray-500 hover:text-yellow-300 transition">
                                ★
                            </label>
                            @endfor
                    </div>
                    <div class="flex justify-between text-xs text-gray-400 px-2">
                        <span>1 ★</span>
                        <span>5 ★</span>
                    </div>
                    @error('rating')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contenido --}}
                <div>
                    <label for="content" class="block text-lg font-medium text-gray-300 mb-2">Tu Reseña</label>
                    <textarea name="content" id="content" rows="6"
                        class="w-full bg-gray-700 border border-gray-600 rounded-xl p-4 text-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-transparent placeholder-gray-500"
                        placeholder="Comparte tus pensamientos sobre esta {{ isset($movie) ? 'película' : 'serie' }}..."
                        required>{{ old('content') }}</textarea>
                    @error('content')
                    <p class="text-red-400 text-sm mt-1"></p>
                    @enderror
                </div>

                {{-- Botón --}}
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 transform hover:scale-[1.02]">
                        PUBLICAR RESEÑA
                    </button>
                </div>
            </form>
        </div>

        {{-- Volver --}}
        <div class="text-center mt-8">
            <a href="{{ isset($movie) ? route('movies.show', $movie->id) : route('series.show', $serie->id) }}"
                class="text-indigo-400 hover:text-indigo-300 inline-flex items-center transition">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver a {{ isset($movie) ? 'la película' : 'la serie' }}
            </a>
        </div>
    </div>
</section>
@else
<div class="text-center text-white py-20">
    <h2 class="text-2xl font-semibold">No se encontró ni película ni serie para reseñar.</h2>
</div>
@endif
@endsection