<section class="bg-gray-900 rounded-2xl shadow-xl p-8 max-w-lg mx-auto mt-16 border border-yellow-600">
    <header class="flex flex-col items-center mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="MovieHub Logo" class="w-20 h-20 mb-4">
        <h2 class="text-3xl font-bold text-yellow-500 mb-2 tracking-wide">
            {{ __('Actualizar contraseña') }}
        </h2>
        <p class="text-sm text-gray-400 text-center">
            {{ __('Asegúrate de usar una contraseña larga y aleatoria para mantener tu cuenta segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Contraseña actual')" class="text-gray-300" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Nueva contraseña')" class="text-gray-300" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar contraseña')" class="text-gray-300" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-gray-800 border border-gray-700 text-white rounded-xl px-4 py-3" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-xl transition">
                {{ __('Guardar') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
