@extends('layouts.app')

@section('content')
<main class="p-6 flex flex-col items-center justify-center min-h-screen bg-black bg-opacity-60">
    <div class="bg-gray-900 bg-opacity-70 backdrop-blur-md border border-yellow-400 rounded-2xl p-10 w-full max-w-3xl shadow-2xl text-white animate-fade-in">

        <h1 class="text-3xl font-bold mb-8 text-center text-yellow-300 font-[Concert+One]">
            ✏️ Editar Usuario
        </h1>

        @if ($errors->any())
            <div class="mb-6 bg-red-500 bg-opacity-20 border border-red-400 text-red-300 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-yellow-300 font-semibold mb-2">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div>
                <label for="email" class="block text-yellow-300 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div>
                <label for="role" class="block text-yellow-300 font-semibold mb-2">Rol</label>
                <select name="role" id="role"
                    class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <div>
                <label for="avatar" class="block text-yellow-300 font-semibold mb-2">Avatar</label>
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar actual" class="w-28 h-24 rounded-full mb-3 border-2 border-yellow-400 shadow object-cover">
                @endif
                <input type="file" id="avatar" name="avatar"
                    class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white file:bg-yellow-500 file:text-white file:rounded file:px-4 file:py-2 file:border-none focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('admin.users') }}"
                    class="text-gray-400 hover:text-gray-200 transition hover:underline">← Volver</a>
                <button type="submit"
                    class="bg-yellow-500 text-white font-semibold py-2 px-6 rounded-xl shadow hover:bg-yellow-400 hover:scale-105 transition duration-300 ease-in-out">
                    💾 Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
