<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage; // Importar Storage
use Illuminate\Support\Str;


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
        $request->validate([
            'avatar' => 'required|string',
        ]);
    
        $selectedPath = $request->input('avatar');
        $user = auth()->user();
    
        // Eliminar avatar anterior si era personalizado (no predeterminado)
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            $defaultAvatars = File::files(public_path('images/default_avatars'));
            $defaultNames = array_map(fn($f) => $f->getFilename(), $defaultAvatars);
    
            if (!in_array(basename($user->avatar), $defaultNames)) {
                Storage::disk('public')->delete($user->avatar);
            }
        }
    
        // Si el avatar viene desde la carpeta predeterminada
        if (Str::contains($selectedPath, 'images/default_avatars/')) {
            $filename = basename($selectedPath);
    
            // Convertimos la URL pública en ruta del sistema
            $relativePath = str_replace(asset('/'), '', $selectedPath);
            $sourcePath = public_path($relativePath);
            $targetPath = storage_path('app/public/avatars/' . $filename);
    
            if (!File::exists($sourcePath)) {
                return back()->withErrors(['avatar' => 'El avatar seleccionado no existe.']);
            }
    
            // Copiar el archivo a storage si aún no está
            if (!File::exists($targetPath)) {
                File::copy($sourcePath, $targetPath);
            }
    
            $user->avatar = 'avatars/' . $filename;
            $user->save();
        } elseif (Str::startsWith($selectedPath, 'storage/avatars/')) {
            $user->avatar = str_replace('storage/', '', $selectedPath);
            $user->save();
        }
    
        return redirect()->route('dashboard')->with('success', 'Avatar actualizado correctamente.');
    }
}
