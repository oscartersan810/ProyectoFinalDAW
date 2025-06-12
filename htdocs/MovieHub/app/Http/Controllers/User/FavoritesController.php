<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Obtén los IDs de películas y series favoritas del usuario directamente desde la tabla favorites
        $favoriteMovieIds = Favorite::where('user_id', $userId)
            ->whereNotNull('movie_id')
            ->get()
            ->map(function($fav) { return $fav->movie_id; })
            ->filter();

        $favoriteSerieIds = Favorite::where('user_id', $userId)
            ->whereNotNull('serie_id')
            ->get()
            ->map(function($fav) { return $fav->serie_id; })
            ->filter();

        // Obtén las películas y series favoritas directamente
        $favoriteMovies = Movie::whereIn('id', $favoriteMovieIds)->get();
        $favoriteSeries = Serie::whereIn('id', $favoriteSerieIds)->get();

        return view('user.favorites', compact('favoriteMovies', 'favoriteSeries'));
    }
}
