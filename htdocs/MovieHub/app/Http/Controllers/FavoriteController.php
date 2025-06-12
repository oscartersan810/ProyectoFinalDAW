<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $itemId = $request->input('id');
        $type = $request->input('type'); // 'movie' o 'serie'

        if (!in_array($type, ['movie', 'serie'])) {
            return redirect()->back()->with('error', 'Tipo inválido');
        }

        $column = $type . '_id';

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