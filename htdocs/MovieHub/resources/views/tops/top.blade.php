@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-700 py-12 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
    <div class="max-w-7xl mx-auto relative z-10">

        {{-- Título principal --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-5xl font-bold text-white tracking-wide">
                TOP 10 PELÍCULAS & SERIES
            </h1>
            <div class="w-24 h-1 bg-yellow-500 mx-auto mt-4 rounded-full"></div>
        </div>

        {{-- Top 10 Películas --}}
        <div class="mb-16">
            <h2 class="text-2xl md:text-3xl font-bold text-yellow-400 mb-6 text-center">Top 10 Películas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($topMovies as $movie)
                    <div class="bg-gray-800 p-6 rounded-2xl shadow-xl border border-gray-700 hover:shadow-2xl transition duration-300 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ $loop->iteration }}. {{ $movie->title }}</h3>
                            @if ($movie->poster)
                                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="rounded-lg w-full mb-4 object-cover h-48">
                            @endif
                            <p class="text-gray-300 mb-2">{{ Str::limit($movie->description, 100) }}</p>
                        </div>
                        <div class="flex items-center mt-4">
                            <span class="text-yellow-400 text-2xl font-bold mr-2">{{ $movie->rating ?? 'N/A' }}</span>
                            <span class="text-gray-400">/ 5 ★</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-3 text-center">No hay películas calificadas aún.</p>
                @endforelse
            </div>
        </div>

        {{-- Top 10 Series --}}
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-indigo-400 mb-6 text-center">Top 10 Series</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($topSeries as $serie)
                    <div class="bg-gray-800 p-6 rounded-2xl shadow-xl border border-gray-700 hover:shadow-2xl transition duration-300 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ $loop->iteration }}. {{ $serie->title }}</h3>
                            @if ($serie->poster)
                                <img src="{{ asset('storage/' . $serie->poster) }}" alt="{{ $serie->title }}" class="rounded-lg w-full mb-4 object-cover h-48">
                            @endif
                            <p class="text-gray-300 mb-2">{{ Str::limit($serie->description, 100) }}</p>
                        </div>
                        <div class="flex items-center mt-4">
                            <span class="text-indigo-400 text-2xl font-bold mr-2">{{ $serie->rating ?? 'N/A' }}</span>
                            <span class="text-gray-400">/ 5 ★</span>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-400 col-span-3 text-center">No hay series calificadas aún.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
