<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    // Solo el método toggle del FavoriteController
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $itemId = $request->input('id');
        $type = $request->input('type'); // 'movies' o 'series'

        // Acepta solo los valores en plural
        if (!in_array($type, ['movies', 'series'])) {
            return redirect()->back()->with('error', 'Tipo inválido');
        }

        // Asigna el nombre de columna correcto
        $column = $type === 'series' ? 'serie_id' : 'movie_id';

        $existing = Favorite::where('user_id', $user->id)
            ->where($column, $itemId)
            ->first();

        if ($existing) {
            $existing->delete();
            $favorited = false;
        } else {
            Favorite::create([
                'user_id' => $user->id,
                $column => $itemId,
            ]);
            $favorited = true;
        }

        $message = $favorited ? 'Añadido a favoritos.' : 'Eliminado de favoritos.';

        return redirect()->back()->with('success', $message);
    }
}
