<section class="bg-gray-900 rounded-2xl shadow-xl p-8 max-w-lg mx-auto mt-16 border border-red-600">
    <header class="flex flex-col items-center mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="MovieHub Logo" class="w-20 h-20 mb-4">
        <h2 class="text-3xl font-bold text-red-500 mb-2 tracking-wide">
            {{ __('Eliminar cuenta') }}
        </h2>
        <p class="text-sm text-gray-400 text-center">
            {{ __('Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar tu cuenta, descarga cualquier dato o información que desees conservar.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
        @csrf
        @method('delete')

        <div>
            <x-input-label for="delete_user_password" :value="__('Contraseña')" class="text-gray-300" />
            <x-text-input id="delete_user_password" name="password" type="password" class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3" autocomplete="current-password" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl transition">
                {{ __('Eliminar cuenta') }}
            </button>
        </div>
    </form>
</section>
