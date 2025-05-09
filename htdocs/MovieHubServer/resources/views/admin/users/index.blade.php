@extends('layouts.app')

@section('content')
<main class="p-6 flex flex-col items-center justify-center min-h-screen bg-black bg-opacity-60">
    <div class="bg-gray-900 bg-opacity-70 backdrop-blur-md border border-green-400 rounded-2xl p-10 w-full max-w-6xl shadow-2xl text-white animate-fade-in">

        <h1 class="text-4xl font-bold mb-8 text-center text-green-300 font-[Concert+One]">
            👥 Administrar Usuarios
        </h1>

        @if (session('success'))
            <div class="bg-green-500 bg-opacity-20 border border-green-400 text-green-300 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="bg-red-500 bg-opacity-20 border border-red-400 text-red-300 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($users->isEmpty())
            <div class="text-center text-lg text-gray-300">
                No hay usuarios registrados.
            </div>
        @else
            <div class="overflow-x-auto animate-fade-in delay-100">
                <table class="min-w-full table-auto rounded-xl overflow-hidden border border-green-400 shadow-lg bg-gray-800">
                    <thead class="bg-green-300 text-black font-semibold">
                        <tr>
                            <th class="px-6 py-4 text-left">🖼️ Avatar</th>
                            <th class="px-6 py-4 text-left">📛 Nombre</th>
                            <th class="px-6 py-4 text-left">📧 Email</th>
                            <th class="px-6 py-4 text-left">🔐 Rol</th>
                            <th class="px-6 py-4 text-left">⚙️ Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-green-400">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-700 transition duration-200">
                                <td class="px-6 py-4 align-middle">
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar de {{ $user->name }}"
                                            class="w-20 h-16 rounded-xl border-2 border-green-400 shadow object-cover">
                                    @else
                                        <span class="text-gray-400 italic">Sin avatar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 align-middle">{{ $user->name }}</td>
                                <td class="px-6 py-4 align-middle">{{ $user->email }}</td>
                                <td class="px-6 py-4 align-middle">{{ $user->role}}</td>
                                <td class="px-6 py-4 align-middle space-x-3">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-blue-400 hover:underline hover:text-blue-300 transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')"
                                            class="text-red-400 hover:underline hover:text-red-300 transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        @endif
    </div>
</main>
@endsection
