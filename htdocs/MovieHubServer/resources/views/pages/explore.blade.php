@extends('layouts.app')

@section('content')
<div x-data="{ open: false, selectedItem: {} }">
    <section class="min-h-screen bg-gray-700" data-aos="fade-up">
        <canvas class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none"></canvas>

        {{-- Mensaje flash --}}
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition
             class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg flex items-center space-x-4">
            <span class="text-lg font-semibold">{{ session('success') }}</span>
            <button @click="show = false" class="text-white hover:text-gray-200 text-xl font-bold">&times;</button>
        </div>
        @endif

        {{-- Filtros --}}
        <div class="bg-gray-800 py-12 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-10 text-center tracking-wide">EXPLORAR CONTENIDO</h2>

                <form method="GET" action="{{ route('explore') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div>
                        <label class="block text-gray-300 mb-2">Tipo</label>
                        <select name="type" class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            <option value="movies" {{ request('type', 'movies') == 'movies' ? 'selected' : '' }}>Películas</option>
                            <option value="series" {{ request('type') == 'series' ? 'selected' : '' }}>Series</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Título</label>
                        <input type="text" name="title" placeholder="Buscar..." value="{{ request('title') }}"
                               class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Género</label>
                        <select name="genre" class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            <option value="">Todos</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-300 mb-2">Año</label>
                        <input type="number" name="year" placeholder="Año" value="{{ request('year') }}"
                               class="w-full bg-gray-700 border border-gray-600 text-white rounded-xl px-4 py-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>

                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                            FILTRAR
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Resultados --}}
        <div class="py-16 px-4 sm:px-6 lg:px-8" data-aos="fade-up">
            <div class="max-w-7xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-12 text-center tracking-wide">RESULTADOS</h2>

                @if($items->isEmpty())
                <div class="bg-gray-800 rounded-2xl p-8 text-center">
                    <p class="text-gray-400 text-xl">No se encontraron resultados con esos filtros.</p>
                </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($items as $item)
                    <div @click="selectedItem = {{ $item->toJson() }}; open = true"
                         class="cursor-pointer bg-gray-800 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border border-gray-700">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $item->poster) }}" alt="{{ $item->title }}"
                                 class="w-full h-80 object-cover">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                <div class="flex items-center">
                                    @php $avg = $item->averageRating(); @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= round($avg) ? 'text-yellow-400' : 'text-gray-400' }} text-lg">★</span>
                                    @endfor
                                    <span class="text-white ml-2 text-sm">{{ number_format($avg, 1) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-white mb-2 truncate">{{ $item->title }}</h3>
                            <div class="flex justify-between text-gray-400 text-sm">
                                <span>{{ $item->year }}</span>
                                <span>{{ $item->genre }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Paginación --}}
                <div class="mt-12">
                    {{ $items->withQueryString()->links() }}
                </div>
                @endif
            </div>
        </div>
    </section>

{{-- Modal --}}
<div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center p-4" style="display: none;">
    <div @click.away="open = false" class="bg-gray-800 rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-gray-700 relative">
        <button @click="open = false" class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl font-bold z-10">&times;</button>

        <div class="relative">
            <div class="h-64 w-full bg-gray-900 overflow-hidden">
                <img :src="'/storage/' + selectedItem.poster" class="w-full h-full object-cover opacity-50" alt="">
            </div>

            <div class="relative z-10 p-6 md:p-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="flex-shrink-0 w-full md:w-1/3 -mt-20">
                        <img :src="'/storage/' + selectedItem.poster" class="w-full rounded-xl shadow-xl border-4 border-gray-700" alt="">
                    </div>

                    <div class="flex-grow">
                        <h2 class="text-3xl font-bold text-white mb-2" x-text="selectedItem.title"></h2>
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="text-gray-400" x-text="selectedItem.year"></span>
                            <span class="text-gray-400">•</span>
                            <span class="text-gray-400" x-text="selectedItem.genre"></span>
                        </div>

                        <div class="flex items-center mb-6">
                            <template x-for="i in 5" :key="i">
                                <span 
                                    :class="i <= Math.round(selectedItem.rating || 0) ? 'text-yellow-400' : 'text-gray-600'" 
                                    class="text-2xl"
                                >★</span>
                            </template>
                            <span class="text-white ml-2" x-text="selectedItem.rating !== null ? '(' + parseFloat(selectedItem.rating).toFixed(1) + ')' : '(Sin valoración)'"></span>
                        </div>

                        <p class="text-gray-300 mb-6" x-text="selectedItem.description"></p>

                        <a :href="'/resenas/create?type=' + (selectedItem.type || 'movies') + '&id=' + selectedItem.id"
                           class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-3 px-6 rounded-xl transition">
                            Escribir Reseña
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
