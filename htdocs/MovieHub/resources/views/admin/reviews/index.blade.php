@extends('layouts.app')

@section('content')
<div>
    <section class="min-h-screen bg-gray-900 p-6" data-aos="fade-up">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-white mb-10 text-center tracking-wide">ADMINISTRAR RESEÑAS</h2>
            <form method="GET" action="{{ route('admin.reviews') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
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
                <div>
                    <label class="block text-gray-300 mb-2">Usuario</label>
                    <input type="text" name="user" placeholder="Nombre de usuario..." value="{{ request('user') }}"
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
                <div class="overflow-x-auto rounded-xl border border-gray-700 shadow-lg">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gradient-to-r from-yellow-600 to-green-600">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Tipo</th>
                                <th class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Título</th>
                                <th class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Usuario</th>
                                <th class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Puntuación</th>
                                <th class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Contenido</th>
                                <th class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider">Fecha</th>
                                <th class="px-4 py-3 text-right text-sm font-bold text-white uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @foreach($reviews as $review)
                            <tr class="hover:bg-gray-750 transition duration-150">
                                <td class="px-4 py-3">{{ $review['type'] }}</td>
                                <td class="px-4 py-3">{{ $review['title'] }}</td>
                                <td class="px-4 py-3">{{ $review['user'] }}</td>
                                <td class="px-4 py-3">{{ $review['rating'] }} ⭐</td>
                                <td class="px-4 py-3">{{ $review['content'] }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($review['created_at'])->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('admin.reviews.edit', ['type' => $review['type'] === 'Película' ? 'movie' : 'serie', 'review' => $review['id']]) }}" class="text-yellow-400 hover:text-yellow-300 transition flex items-center" title="Editar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            <span class="hidden sm:inline ml-1">Editar</span>
                                        </a>
                                        <form method="POST" action="{{ route('admin.reviews.destroy', $review['id']) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta reseña?')" class="text-red-400 hover:text-red-300 transition flex items-center" title="Eliminar">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                <span class="hidden sm:inline ml-1">Eliminar</span>
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
                <div class="mt-8 flex justify-center">
                    {{ $reviews->links() }}
                </div>
            @endif
        </div>
    </section>
</div>
@endsection