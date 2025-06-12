@extends('layouts.app')
@section('content')
<div>
    <section class="min-h-screen bg-gray-900 p-6" data-aos="fade-up">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-4xl font-bold text-white mb-10 text-center tracking-wide">MIS RESEÑAS</h2>
            <form method="GET" action="{{ route('dashboard.resenas') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div>
                    <label class="block text-gray-300 mb-2">Tipo</label>
                    <select name="type" class="w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3">
                        <option value="all" {{ $type === 'all' ? 'selected' : '' }}>Todas</option>
                        <option value="movie" {{ $type === 'movie' ? 'selected' : '' }}>Películas</option>
                        <option value="serie" {{ $type === 'serie' ? 'selected' : '' }}>Series</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-300 mb-2">Título</label>
                    <input type="text" name="title" placeholder="Buscar..." value="{{ $title }}"
                        class="w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3">
                </div>
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition duration-300">
                        FILTRAR
                    </button>
                </div>
            </form>

            @if($reviews->isEmpty())
                <div class="bg-gray-800 rounded-2xl p-8 text-center">
                    <p class="text-gray-400 text-xl">No se encontraron reseñas con esos filtros.</p>
                </div>
            @else
                <div class="overflow-x-auto rounded-xl shadow">
                    <table class="min-w-full bg-gray-800 text-white">
                        <thead>
                            <tr>
                                <th class="px-3 py-2">Tipo</th>
                                <th class="px-3 py-2">Título</th>
                                <th class="px-3 py-2">Puntuación</th>
                                <th class="px-3 py-2">Contenido</th>
                                <th class="px-3 py-2">Fecha</th>
                                <th class="px-3 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td class="px-3 py-2">{{ $review['type'] }}</td>
                                <td class="px-3 py-2">{{ $review['title'] }}</td>
                                <td class="px-3 py-2">{{ $review['rating'] }} ⭐</td>
                                <td class="px-3 py-2">{{ $review['content'] }}</td>
                                <td class="px-3 py-2">{{ \Carbon\Carbon::parse($review['created_at'])->format('d/m/Y') }}</td>
                                <td class="px-3 py-2">
                                    <form method="POST" action="{{ $review['type'] === 'Película' 
                                        ? route('reviews.movies.destroy', $review['id']) 
                                        : route('reviews.series.destroy', $review['id']) }}" 
                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta reseña?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-xl text-sm transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection