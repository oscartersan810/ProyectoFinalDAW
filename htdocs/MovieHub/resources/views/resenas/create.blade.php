@extends('layouts.app')

@section('content')
@if(isset($movie) || isset($serie))
<section id="create-review" class="min-h-screen bg-gray-700 py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center" data-aos="fade-up">
    <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

    <div class="max-w-2xl w-full relative z-10">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl border border-gray-700 transform hover:shadow-3xl transition duration-300">
            <div class="text-center mb-8">
                <div class="inline-block relative">
                    <h1 class="text-3xl md:text-4xl font-bold text-white tracking-wide relative z-10">
                        ESCRIBIR RESEÑA
                    </h1>
                    <div class="absolute bottom-0 left-0 w-full h-2 bg-yellow-500 opacity-30 rounded-full transform translate-y-1 z-0"></div>
                </div>
                
                <div class="mt-6">
                    @if(isset($movie))
                    <div class="inline-flex items-center bg-gray-900 px-4 py-2 rounded-full border border-yellow-500/20">
                        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"></path>
                        </svg>
                        <p class="text-yellow-400 text-lg">
                            <span class="font-normal text-gray-300">Para:</span> <span class="font-semibold">{{ $movie->title }}</span>
                        </p>
                    </div>
                    @elseif(isset($serie))
                    <div class="inline-flex items-center bg-gray-900 px-4 py-2 rounded-full border border-yellow-500/20">
                        <svg class="w-5 h-5 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm3 2h6v4H7V5zm8 8v2h1v-2h-1zm-2-8h1V5h-1v2zm2 4h1V9h-1v2zm0 4h1v-2h-1v2zm-4 0h1v-2h-1v2zm-4 0h1v-2H7v2zm-1-4h1V9H6v2zm0-4h1V5H6v2zm-1 8h1v-2H5v2z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-yellow-400 text-lg">
                            <span class="font-normal text-gray-300">Para:</span> <span class="font-semibold">{{ $serie->title }}</span>
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Formulario --}}
            <form
                action="{{ isset($movie) ? route('resenas.pelicula.store') : route('resenas.serie.store') }}"
                method="POST"
                class="space-y-8">
                @csrf

                {{-- Campos ocultos --}}
                @if(isset($movie))
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                @elseif(isset($serie))
                <input type="hidden" name="serie_id" value="{{ $serie->id }}">
                @endif

                {{-- Calificación --}}
                <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-700">
                    <label class="block text-lg font-medium text-gray-300 mb-4 text-center">
                        ¿Cómo calificarías esta {{ isset($movie) ? 'película' : 'serie' }}?
                    </label>
                    <div class="flex justify-center space-x-1 mb-3 flex-row-reverse">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star-{{ $i }}" value="{{ $i }}"
                            class="hidden peer" {{ old('rating') == $i ? 'checked' : '' }} required>
                            <label for="star-{{ $i }}"
                                class="text-3xl cursor-pointer text-gray-600 hover:text-yellow-300 transition transform hover:scale-110 duration-200
                                peer-checked:text-yellow-400
                                peer-checked~label:text-yellow-400">
                                ★
                            </label>
                        @endfor
                    </div>
                    <div class="flex justify-between text-sm text-gray-500 px-2 mt-2">
                        <span>Mala</span>
                        <span>Excelente</span>
                    </div>
                    @error('rating')
                    <p class="text-red-400 text-sm mt-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contenido --}}
                <div class="relative">
                    <label for="content" class="block text-lg font-medium text-gray-300 mb-3">
                        Tu opinión
                        <span class="text-sm text-gray-500 font-normal">(mínimo 100 caracteres)</span>
                    </label>
                    <div class="relative">
                        <textarea name="content" id="content" rows="8"
                            class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-gray-300 shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-transparent placeholder-gray-600 transition duration-200"
                            placeholder="Escribe aquí tus impresiones, lo que te gustó, lo que no... sé sincero/a con tu opinión sobre esta {{ isset($movie) ? 'película' : 'serie' }}..."
                            required>{{ old('content') }}</textarea>
                        <div class="absolute bottom-3 right-3 text-xs text-gray-500 bg-gray-800 px-2 py-1 rounded">
                            <span id="char-count">0</span>/500
                        </div>
                    </div>
                    @error('content')
                        <p class="text-red-400 text-sm mt-1">{{ $__messageOriginal }}</p>
                    @enderror
                </div>

                {{-- Botón --}}
                <div class="pt-2">
                    <button type="submit"
                        class="w-full group relative bg-gradient-to-r from-yellow-600 to-yellow-700 hover:from-yellow-500 hover:to-yellow-600 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                            PUBLICAR RESEÑA
                        </span>
                        <span class="absolute inset-0 bg-gradient-to-r from-yellow-500 to-yellow-400 opacity-0 group-hover:opacity-20 transition duration-300"></span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Volver --}}
        <div class="text-center mt-10">
            <a href="{{ isset($movie) ? route('movies.show', $movie->id) : route('series.show', $serie->id) }}"
                class="inline-flex items-center text-gray-400 hover:text-yellow-300 transition group">
                <span class="mr-2 group-hover:-translate-x-1 transition-transform duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </span>
                <span class="border-b border-transparent group-hover:border-yellow-300 pb-0.5 transition duration-200">
                    Volver a {{ isset($movie) ? 'la película' : 'la serie' }}
                </span>
            </a>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Contador de caracteres
    document.getElementById('content').addEventListener('input', function() {
        const charCount = this.value.length;
        document.getElementById('char-count').textContent = charCount;
        
        // Cambiar color si se acerca al límite
        const counter = document.getElementById('char-count');
        if(charCount > 450) {
            counter.classList.add('text-yellow-400');
            counter.classList.remove('text-gray-500');
        } else {
            counter.classList.remove('text-yellow-400');
            counter.classList.add('text-gray-500');
        }
    });
</script>
@endpush

@else
<div class="text-center text-white py-20">
    <h2 class="text-2xl font-semibold">No se encontró ni película ni serie para reseñar.</h2>
    <a href="{{ route('home') }}" class="mt-4 inline-flex items-center text-yellow-400 hover:text-yellow-300">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Volver al inicio
    </a>
</div>
@endif
@endsection
