@extends('layouts.app')

@section('content')
<div>
    <section class="min-h-screen bg-gray-900 p-6 flex items-center justify-center">
        <div class="bg-gray-800 rounded-2xl shadow-xl p-8 w-full max-w-lg mx-auto">
            <h2 class="text-3xl font-bold text-white mb-6 text-center">Editar Reseña</h2>
            <div class="mb-6">
                <p class="text-gray-300 mb-1"><span class="font-bold">Tipo:</span> {{ $isMovie ? 'Película' : 'Serie' }}</p>
                <p class="text-gray-300 mb-1"><span class="font-bold">Título:</span> {{ $isMovie ? $review->movie->title ?? 'Sin título' : $review->serie->title ?? 'Sin título' }}</p>
                <p class="text-gray-300 mb-1"><span class="font-bold">Usuario:</span> {{ $review->user->name ?? 'Sin usuario' }}</p>
                <p class="text-gray-300 mb-1"><span class="font-bold">Fecha:</span>
                    @if($review->created_at)
                        {{ $review->created_at->format('d/m/Y') }}
                    @else
                        Sin fecha
                    @endif
                </p>
            </div>
            <form method="POST" action="{{ route('admin.reviews.update', ['type' => $isMovie ? 'movie' : 'serie', 'review' => $review->id]) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-300 mb-2">Puntuación</label>
                    <select name="rating" class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-3" required>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-300 mb-2">Contenido</label>
                    <textarea name="content" rows="5" class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-3" required>{{ old('content', $review->content) }}</textarea>
                </div>
                <div class="flex justify-between">
                    <a href="{{ route('admin.reviews') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-xl transition">Cancelar</a>
                    <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-xl transition">Guardar cambios</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection