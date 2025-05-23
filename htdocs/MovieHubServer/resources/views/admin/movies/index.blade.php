@extends('layouts.app')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-gray-900 to-black flex items-center justify-center p-6">
    <!-- Efecto de partículas sutiles -->
    <div class="absolute inset-0 overflow-hidden opacity-10">
        <div class="particle" style="top: 30%; left: 20%; width: 4px; height: 4px;"></div>
        <div class="particle" style="top: 70%; left: 70%; width: 6px; height: 6px;"></div>
    </div>

    <div class="relative bg-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-6xl border border-indigo-500 backdrop-blur-sm overflow-hidden">
        <!-- Efecto de esquina -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500 opacity-10 rounded-bl-full"></div>
        
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10 relative z-10">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-2 text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-green-400">
                    🎬 Administrar Películas
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-indigo-500 to-green-500 rounded-full mb-6"></div>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('admin.movies.create') }}" 
                    class="bg-gradient-to-r from-indigo-600 to-green-600 text-white font-semibold py-2 px-6 rounded-xl shadow-lg hover:from-indigo-500 hover:to-green-500 transition duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nueva Película
                </a>
                
                <form method="GET" action="{{ route('admin.movies') }}" class="flex">
                    <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}"
                        class="px-4 py-2 rounded-l-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg hover:bg-indigo-500 transition duration-300 flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Contenido de la tabla -->
        @if($movies->isEmpty())
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                </svg>
                <p class="text-xl text-gray-400">No hay películas registradas</p>
                <p class="text-gray-500 mt-2">Comienza agregando una nueva película</p>
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-gray-700 shadow-lg">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gradient-to-r from-indigo-600 to-green-600">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                Póster
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                Título
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                Descripción
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                Género
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                Año
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-sm font-bold text-white uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($movies as $movie)
                        <tr class="hover:bg-gray-750 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex-shrink-0 h-20 w-16">
                                    @if($movie->poster)
                                        <img class="h-20 w-16 rounded-lg object-cover border border-gray-600 shadow" src="{{ asset('storage/' . $movie->poster) }}" alt="Póster">
                                    @else
                                        <div class="h-20 w-16 rounded-lg bg-gray-700 flex items-center justify-center border border-gray-600">
                                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-white">{{ $movie->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-300 max-w-xs truncate" title="{{ $movie->description }}">
                                    {{ \Illuminate\Support\Str::limit($movie->description, 60) }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                    {{ $movie->genre }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-300">{{ $movie->year }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('admin.movies.edit', $movie->id) }}" class="text-indigo-400 hover:text-indigo-300 transition flex items-center">
                                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta película?')" 
                                            class="text-red-400 hover:text-red-300 transition flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
                <div class="mt-8">
                    {{ $movies->links() }}
                </div>
        @endif
    </div>
</main>

<style>
    .particle {
        position: absolute;
        background-color: rgba(99, 102, 241, 0.6);
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
</style>
@endsection