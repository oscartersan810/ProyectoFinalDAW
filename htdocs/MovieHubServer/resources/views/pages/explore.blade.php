@extends('layouts.app')

@section('content')

{{-- Filtros --}}
<div class="w-full bg-gray-800 py-10 px-4" data-aos="fade-up">
    <h2 class="text-5xl md:text-6xl font-bold text-white mb-8 text-center font-['Concert_One']">Explorar Películas/Series</h2>

    <form method="GET" action="{{ route('explore') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
        <select name="type" class="p-4 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-800 text-lg">
            <option value="movies" {{ request('type', 'movies') == 'movies' ? 'selected' : '' }}>Películas</option>
            <option value="series" {{ request('type') == 'series' ? 'selected' : '' }}>Series</option>
        </select>

        <input type="text" name="title" placeholder="Buscar por nombre" value="{{ request('title') }}"
            class="p-4 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-800 text-lg">

        <select name="genre"
            class="p-4 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-800 text-lg">
            <option value="">Todos los géneros</option>
            @foreach($genres as $genre)
                <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                    {{ $genre }}
                </option>
            @endforeach
        </select>

        <input type="number" name="year" placeholder="Año" value="{{ request('year') }}"
            class="p-4 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 text-gray-800 text-lg">

        <button type="submit"
            class="md:col-span-4 bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 px-6 rounded-xl transition duration-300 mt-2 w-full text-xl">
            Filtrar
        </button>
    </form>
</div>

{{-- Resultados --}}
<section data-aos="fade-up" class="min-h-screen flex flex-col justify-start items-center bg-gray-700 py-16 px-4">
    <h2 class="text-5xl md:text-6xl font-bold text-white mb-10 font-['Concert_One'] text-center">Resultados</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-6xl">
        @forelse ($items as $item)
            <div data-aos="zoom-in" class="overflow-hidden rounded-2xl shadow-xl transform transition duration-500 hover:scale-105 bg-white bg-opacity-95">
                <img src="{{ asset('storage/' . $item->poster) }}" alt="{{ $item->title}}"
                    class="w-full h-72 object-cover object-top">
                <div class="p-5 text-gray-800">
                    <h3 class="text-2xl md:text-3xl font-bold mb-2 font-['Concert_One']">{{ $item->title}}</h3>
                    <p class="text-base md:text-lg mb-1">🎬 <span class="font-semibold">Género:</span> {{ $item->genre }}</p>
                    <p class="text-base md:text-lg mb-1">📅 <span class="font-semibold">Año:</span> {{ $item->year }}</p>
                    <p class="text-base md:text-lg">⭐ <span class="font-semibold">Rating:</span> <span class="text-yellow-500 font-bold">{{ $item->rating }}</span></p>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-white text-2xl">No se encontraron resultados con esos filtros.</p>
        @endforelse
    </div>

    {{-- Paginación --}}
    <div class="mt-12">
        {{ $items->withQueryString()->links() }}
    </div>
</section>

@endsection
