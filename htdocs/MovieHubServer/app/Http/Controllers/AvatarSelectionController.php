<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; // Importar Storage
use App\Models\User;

class AvatarSelectionController extends Controller
{
    /**
     * Muestra la vista para seleccionar el avatar.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Obtener los avatares disponibles desde el directorio de imágenes
        $avatarDir = public_path('images/default_avatars');

        // Verificamos si el directorio existe
        if (!File::exists($avatarDir)) {
            abort(404, 'El directorio de avatares no existe.');
        }

        // Obtener todos los archivos del directorio de avatares
        $avatars = collect(File::files($avatarDir))->map(function ($file) {
            // Aquí generamos la URL correcta usando asset()
            return asset('images/default_avatars/' . $file->getFilename());
        });

        // Pasamos los avatares a la vista
        return view('selectAvatar.index', compact('avatars'));
    }

    /**
     * Almacena el avatar seleccionado por el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'avatar' => 'required|string',  // Aseguramos que se seleccione un avatar
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        if (!$user) {
            abort(403, 'No estás autenticado.');
        }

        // Obtener el avatar seleccionado
        $selectedAvatar = $request->avatar;

        // Si es un avatar predeterminado (ruta dentro de `images/default_avatars`)
        if (strpos($selectedAvatar, 'images/default_avatars/') !== false) {
            // Guardar la ruta como está, pero solo la parte relevante
            $avatarPath = 'images/default_avatars/' . basename($selectedAvatar);
        } else {
            // Si es un avatar personalizado (moverlo a storage/avatars)
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                // Mover la imagen a la carpeta de avatars en el storage
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
            } else {
                // En caso de que no se haya subido ningún archivo, lo dejamos como estaba
                return back()->with('error', 'Hubo un problema al subir el avatar.');
            }
        }

        // Asignar el avatar al usuario
        $user->avatar = $avatarPath;  // Guarda la ruta relativa

        // Guardar el usuario con el nuevo avatar
        $user->save();

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Avatar seleccionado correctamente.');
    }
}
