@extends('layouts.app')

@section('content')
<main class="min-h-screen bg-gradient-to-br from-gray-900 to-black flex items-center justify-center p-6">
    <div class="absolute inset-0 overflow-hidden opacity-10">
        <div class="particle" style="top: 20%; left: 10%; width: 4px; height: 4px;"></div>
        <div class="particle" style="top: 60%; left: 80%; width: 6px; height: 6px;"></div>
    </div>

    <div class="relative bg-gray-900 rounded-3xl shadow-2xl p-8 md:p-12 w-full max-w-6xl border border-yellow-500 backdrop-blur-sm overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-500 opacity-10 rounded-bl-full"></div>
        
        <div class="text-center mb-10 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-green-400">
                👥 Administración de Usuarios
            </h1>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-500 to-green-500 mx-auto rounded-full mb-6"></div>
            
            @if (session('success'))
                <div class="bg-green-600 bg-opacity-20 border border-green-500 text-green-300 px-6 py-3 rounded-xl mb-6 shadow-lg">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="bg-red-600 bg-opacity-20 border border-red-500 text-red-300 px-6 py-3 rounded-xl mb-6 shadow-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        @php
            // Buscar el usuario administrador si no está en la colección
            $adminUser = $users->first(function($u) {
                return $u->name === 'Administrador' && $u->email === 'admin@gmail.com';
            });
            if (!$adminUser) {
                $adminUser = \App\Models\User::where('name', 'Administrador')->where('email', 'admin@gmail.com')->first();
            }
        @endphp

        @if ($users->isEmpty() && !$adminUser)
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <p class="text-xl text-gray-400">No hay usuarios registrados</p>
            </div>
        @else
            <div class="overflow-x-auto rounded-xl border border-gray-700 shadow-lg">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gradient-to-r from-yellow-600 to-green-600">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider w-16">
                                Avatar
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider min-w-[120px]">
                                Nombre
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider hidden sm:table-cell">
                                Email
                            </th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-bold text-white uppercase tracking-wider w-24">
                                Rol
                            </th>
                            <th scope="col" class="px-4 py-3 text-right text-sm font-bold text-white uppercase tracking-wider min-w-[150px]">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        {{-- Mostrar el usuario administrador primero si no está en la colección --}}
                        @if($adminUser && !$users->contains('id', $adminUser->id))
                        <tr class="hover:bg-gray-750 transition duration-150">
                            <td class="px-4 py-3">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($adminUser->avatar)
                                        <img class="h-10 w-10 rounded-full border-2 border-yellow-400 object-cover" src="{{ asset('storage/' . $adminUser->avatar) }}" alt="Avatar">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center border-2 border-gray-600">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-white">{{ $adminUser->name }}</div>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">
                                <div class="text-sm text-gray-300 truncate">{{ $adminUser->email }}</div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow">
                                    ADMIN
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.users.edit', $adminUser->id) }}" class="text-yellow-400 hover:text-yellow-300 transition flex items-center" title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="hidden sm:inline ml-1">Editar</span>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $adminUser->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" 
                                            class="text-red-400 hover:text-red-300 transition flex items-center" title="Eliminar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span class="hidden sm:inline ml-1">Eliminar</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif

                        @foreach($users as $user)
                        <tr class="hover:bg-gray-750 transition duration-150">
                            <td class="px-4 py-3">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($user->avatar)
                                        <img class="h-10 w-10 rounded-full border-2 border-yellow-400 object-cover" src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center border-2 border-gray-600">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="text-sm font-medium text-white">{{ $user->name }}</div>
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">
                                <div class="text-sm text-gray-300 truncate">{{ $user->email }}</div>
                            </td>
                            <td class="px-4 py-3">
                                @if($user->role === 'admin')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gradient-to-r from-purple-600 to-pink-500 text-white shadow">
                                        ADMIN
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ strtoupper($user->role) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-yellow-400 hover:text-yellow-300 transition flex items-center" title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="hidden sm:inline ml-1">Editar</span>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" 
                                            class="text-red-400 hover:text-red-300 transition flex items-center" title="Eliminar">
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

            <div class="mt-8">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</main>

<style>
    .particle {
        position: absolute;
        background-color: rgba(241, 239, 99, 0.6);
        border-radius: 50%;
        animation: float 8s infinite ease-in-out;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
</style>
@endsection