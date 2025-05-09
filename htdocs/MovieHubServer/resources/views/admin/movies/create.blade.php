@extends('layouts.app')

@section('content')
    <main class="p-6 flex flex-col items-center justify-center min-h-screen bg-black bg-opacity-60">
        <div class="bg-gray-900 bg-opacity-70 backdrop-blur-md border border-green-400 rounded-2xl p-10 w-full max-w-3xl shadow-2xl text-white">
            <h1 class="text-3xl font-bold mb-8 text-center text-green-300 font-[Concert+One]">
                Añadir Nueva Película
            </h1>

            <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 text-green-300">Título</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-2 bg-gray-800 border border-green-400 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-300">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-green-300">Descripción</label>
                    <textarea name="description" required
                        class="w-full px-4 py-2 bg-gray-800 border border-green-400 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-green-300">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-green-300">Póster (imagen)</label>
                    <input type="file" name="poster" accept="image/*" required
                        class="w-full px-4 py-2 bg-gray-800 border border-green-400 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-400 file:text-black hover:file:bg-green-300">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-green-300">Género</label>
                    <input type="text" name="genre" value="{{ old('genre') }}" required
                        class="w-full px-4 py-2 bg-gray-800 border border-green-400 rounded-lg text-white">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 text-green-300">Año</label>
                    <input type="number" name="year" value="{{ old('year') }}" required min="1880" max="2100"
                        class="w-full px-4 py-2 bg-gray-800 border border-green-400 rounded-lg text-white">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.movies') }}" class="mr-4 px-4 py-2 bg-gray-700 rounded hover:bg-gray-600 transition">Cancelar</a>
                    <button type="submit" class="px-6 py-2 bg-green-400 text-black font-semibold rounded-lg hover:bg-green-300 transition">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </main>
    @endsection