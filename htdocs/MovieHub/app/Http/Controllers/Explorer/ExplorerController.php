<?php

namespace App\Http\Controllers\Explorer;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExplorerController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type', 'movies'); // Por defecto 'movies'
        $title = $request->input('title');
        $genre = $request->input('genre');
        $year = $request->input('year');

        if ($type === 'series') {
            $query = Serie::query();
        } else {
            $query = Movie::query();
        }

        if ($title) {
            $query->where('title', 'LIKE', "%$title%");
        }

        if ($genre) {
            $query->where('genre', $genre);
        }

        if ($year) {
            $query->where('year', $year);
        }

        $items = $query->paginate(12);

        if ($type === 'series') {
            $genres = Serie::select('genre')->distinct()->pluck('genre');
        } else {
            $genres = Movie::select('genre')->distinct()->pluck('genre');
        }

        $user = Auth::user();

        if ($user) {
            $favoriteIds = [];

            if ($type === 'series') {
                $favoriteIds = DB::table('favorites')
                    ->where('user_id', $user->id)
                    ->whereNotNull('serie_id')
                    ->pluck('serie_id')
                    ->toArray();
            } else {
                $favoriteIds = DB::table('favorites')
                    ->where('user_id', $user->id)
                    ->whereNotNull('movie_id')
                    ->pluck('movie_id')
                    ->toArray();
            }

            foreach ($items as $item) {
                $item->isFavorite = in_array($item->id, $favoriteIds);
                // CORREGIDO: type en plural
                $item->type = $type === 'series' ? 'series' : 'movies';
            }
        }

        return view('pages.explore', compact('items', 'genres', 'type', 'title', 'genre', 'year'));
    }
}