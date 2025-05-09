@extends('layouts.app')

@section('content')
    <main class="p-6 flex flex-col items-center justify-center min-h-screen bg-black bg-opacity-60">
        <div class="bg-gray-900 bg-opacity-70 backdrop-blur-md border border-green-400 rounded-2xl p-10 w-full max-w-6xl shadow-2xl text-white animate-fade-in">

            <h1 class="text-4xl font-bold mb-8 text-center text-green-300 font-[Concert+One]">
                🎬 Administrar Películas
            </h1>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <a href="{{ route('admin.movies.create') }}"
                    class="bg-green-500 text-white font-semibold py-2 px-6 rounded-xl shadow hover:bg-green-400 hover:scale-105 transition duration-300 ease-in-out animate-pop-in">
                    ➕ Añadir Nueva Película
                </a>

                <form method="GET" action="{{ route('admin.movies') }}" class="flex flex-col sm:flex-row gap-2 w-full md:w-auto">
                    <input type="text" name="search" placeholder="Buscar por título..."
                        value="{{ request('search') }}"
                        class="px-4 py-2 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-400 w-full sm:w-64" />

                    <button type="submit"
                        class="bg-green-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-green-400 transition duration-300">
                        🔍 Buscar
                    </button>
                </form>
            </div>

            @if($movies->isEmpty())
            <div class="text-center text-lg text-gray-300">
                No hay películas registradas.
            </div>
            @else
            <div class="overflow-x-auto animate-fade-in delay-100">
                <table class="min-w-full table-auto rounded-xl overflow-hidden border border-green-400 shadow-lg bg-gray-800">
                    <thead class="bg-green-300 text-black font-semibold">
                        <tr>
                            <th class="px-6 py-4 text-left">🎞️ Título</th>
                            <th class="px-6 py-4 text-left">📹 Descripción</th>
                            <th class="px-6 py-4 text-left">🪧 Póster</th>
                            <th class="px-6 py-4 text-left">🎭 Género</th>
                            <th class="px-6 py-4 text-left">✨ Año</th>
                            <th class="px-6 py-4 text-left">⚙️ Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-green-400">
                        @foreach($movies as $movie)
                        <tr class="hover:bg-gray-700 transition duration-200">
                            <td class="px-6 py-4">{{ $movie->title }}</td>
                            <td class="px-6 py-4 max-w-xs truncate" title="{{ $movie->description }}">
                                {{ \Illuminate\Support\Str::limit($movie->description, 60) }}
                            </td>
                            <td class="px-6 py-4">
                                @if($movie->poster)
                                <img src="{{ asset('storage/' . $movie->poster) }}" alt="Póster" class="w-20 rounded shadow">
                                @else
                                <span class="text-gray-400 italic">Sin imagen</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $movie->genre }}</td>
                            <td class="px-6 py-4">{{ $movie->year }}</td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="{{ route('admin.movies.edit', $movie->id) }}" class="text-blue-400 hover:underline hover:text-blue-300 transition">Editar</a>
                                <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?')" class="text-red-400 hover:underline hover:text-red-300 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-6">
                    {{ $movies->links() }}
                </div>
            </div>
            @endif
        </div>
    </main>
    @endsection