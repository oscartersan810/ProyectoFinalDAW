<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Muestra una lista de usuarios.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')
             ->where('id', '!=', Auth::id())
             ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Muestra el formulario para editar un usuario.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Actualiza los datos de un usuario.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'role'     => 'required|in:user,admin', // <-- Añadido aquí
            'avatar'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        // Si se subió un nuevo avatar, lo almacenamos
        if ($request->hasFile('avatar')) {
            // Elimina el avatar anterior si existe
            if ($user->avatar && Storage::exists($user->avatar)) {
                Storage::delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Actualiza los demás campos
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role']; // <-- Aquí también
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente.');
    }


    /**
     * Elimina un usuario.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() === $user->id) {
            return redirect()->route('admin.users')->with('error', 'No puedes eliminar tu propio usuario.');
        }

        // Elimina el avatar si existe
        if ($user->avatar && Storage::exists($user->avatar)) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente.');
    }
}
