<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de edición del perfil.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Actualiza la información del perfil del usuario.
     */
    public function update(Request $request): RedirectResponse
{
    $user = Auth::user();

    // Validación condicional para los campos de contraseña
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'avatar' => ['nullable', 'image', 'max:2048'],
        'current_password' => [
            'nullable',
            'string',
            // Si se rellena, los otros dos son obligatorios
            function ($attribute, $value, $fail) use ($request) {
                if ($value && (!$request->filled('new_password') || !$request->filled('new_password_confirmation'))) {
                    $fail('Debes escribir la nueva contraseña y confirmarla.');
                }
            }
        ],
        'new_password' => [
            'nullable',
            'confirmed',
            \Illuminate\Validation\Rules\Password::defaults(),
            // Si se rellena, la actual y la confirmación son obligatorias
            function ($attribute, $value, $fail) use ($request) {
                if ($value && !$request->filled('current_password')) {
                    $fail('Debes escribir la contraseña actual para cambiar la contraseña.');
                }
                if ($value && !$request->filled('new_password_confirmation')) {
                    $fail('Debes confirmar la nueva contraseña.');
                }
            }
        ],
        'new_password_confirmation' => [
            'nullable',
            // Si se rellena, la actual y la nueva son obligatorias
            function ($attribute, $value, $fail) use ($request) {
                if ($value && (!$request->filled('current_password') || !$request->filled('new_password'))) {
                    $fail('Debes escribir la contraseña actual y la nueva contraseña.');
                }
            }
        ],
    ]);

    // Actualizar nombre y email
    $user->name = $request->name;
    $user->email = $request->email;

    // Actualizar avatar si se sube uno nuevo
    if ($request->hasFile('avatar')) {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $avatarPath;
    }

    // Si se quiere cambiar la contraseña
    if ($request->filled('current_password') || $request->filled('new_password')) {
        // Verifica la contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withInput()->with('password_error', 'La contraseña actual no es correcta.');
        }
        // Si hay nueva contraseña y confirmación válida
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }
    }

    $user->save();

    return back()->with('status', 'profile-updated');
}

    /**
     * Elimina la cuenta del usuario.
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();

        // Elimina el usuario
        $user->delete();

        // Invalida la sesión y regenera el token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Cuenta eliminada correctamente.');
    }


}
