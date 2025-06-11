@extends('layouts.app')

@section('content')
    <main class="p-6 flex flex-col items-center justify-center min-h-screen bg-black bg-opacity-60">
        <div class="max-w-3xl mx-auto p-6 bg-gray-900 rounded-xl shadow-lg border border-yellow-400 text-white">
            <h2 class="text-2xl font-bold text-yellow-300 mb-6">✏️ Editar Película</h2>

            <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1 text-yellow-300">Título</label>
                    <input type="text" name="title" value="{{ old('title', $movie->title) }}" required
                        class="w-full px-4 py-2 bg-gray-800 border border-yellow-400 rounded-lg text-white">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-yellow-300">Descripción</label>
                    <textarea name="description" required
                        class="w-full px-4 py-2 bg-gray-800 border border-yellow-400 rounded-lg text-white">{{ old('description', $movie->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-yellow-300">Póster actual</label>
                    @if($movie->poster)
                    <img src="{{ asset('storage/' . $movie->poster) }}" alt="Póster" class="h-32 mb-2 rounded shadow">
                    @else
                    <p class="text-sm text-gray-400">No hay póster subido.</p>
                    @endif
                    <input type="file" name="poster" accept="image/*"
                        class="w-full px-4 py-2 bg-gray-800 border border-yellow-400 rounded-lg text-white">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-yellow-300">Género</label>
                    <input type="text" name="genre" value="{{ old('genre', $movie->genre) }}" required
                        class="w-full px-4 py-2 bg-gray-800 border border-yellow-400 rounded-lg text-white">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-yellow-300">Año</label>
                    <input type="number" name="year" value="{{ old('year', $movie->year) }}" required min="1880" max="2100"
                        class="w-full px-4 py-2 bg-gray-800 border border-yellow-400 rounded-lg text-white">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.movies') }}"
                        class="mr-4 px-4 py-2 bg-gray-700 rounded hover:bg-gray-600 transition">Cancelar</a>
                    <button type="submit"
                        class="px-6 py-2 bg-yellow-400 text-black font-semibold rounded-lg hover:bg-yellow-300 transition">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </main>
    @endsection