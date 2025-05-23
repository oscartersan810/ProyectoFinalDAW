@extends('layouts.app')

@section('content')
<main class="py-12 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-900 to-black min-h-screen">
    <div class="max-w-4xl mx-auto bg-gradient-to-br from-gray-900 via-gray-800 to-black bg-opacity-90 backdrop-blur-lg rounded-xl shadow-2xl overflow-hidden border border-yellow-600">
        <!-- Encabezado con degradado -->
        <div class="bg-gradient-to-r from-yellow-700 to-yellow-900 p-6">
            <h1 class="text-3xl font-bold text-center text-white font-[Concert+One]">
                <svg class="w-8 h-8 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                </svg>
                Añadir Nueva Película
            </h1>
        </div>

        <div class="p-8">
            <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <!-- Grupo de campos -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-yellow-300">Título</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent placeholder-gray-500">
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-yellow-300">Descripción</label>
                    <textarea name="description" rows="4" required
                        class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent placeholder-gray-500">{{ old('description') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-yellow-300">Género</label>
                        <input type="text" name="genre" value="{{ old('genre') }}" required
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-yellow-300">Año</label>
                        <input type="number" name="year" value="{{ old('year') }}" required min="1880" max="2100"
                            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-yellow-300">Póster (imagen)</label>
                    <div class="flex flex-col items-center justify-center w-full">
                        <label
                            class="flex flex-col w-full h-32 border-2 border-dashed border-yellow-600 hover:border-yellow-500 rounded-lg cursor-pointer bg-gray-800 hover:bg-gray-750 transition relative">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="pt-1 text-sm text-yellow-300">Seleccionar imagen</p>
                            </div>
                            <input type="file" name="poster" accept="image/*" required class="opacity-0 absolute inset-0 cursor-pointer"
                                id="posterInput" onchange="previewImage(event)">
                        </label>
                        <p id="fileName" class="mt-2 text-yellow-400 font-semibold"></p>
                        <img id="preview" class="mt-2 max-h-40 rounded-lg shadow-lg hidden" alt="Vista previa imagen">
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-4 pt-4">
                    <a href="{{ route('admin.movies') }}"
                        class="px-6 py-2 border border-yellow-600 text-yellow-400 rounded-lg hover:bg-yellow-900 hover:bg-opacity-30 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-yellow-600 text-gray-900 font-semibold rounded-lg hover:bg-yellow-500 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Guardar Película
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function previewImage(event) {
        const input = event.target;
        const fileName = document.getElementById('fileName');
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            fileName.textContent = input.files[0].name;

            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            fileName.textContent = '';
            preview.src = '';
            preview.classList.add('hidden');
        }
    }
</script>
@endsection
