<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;

class WelcomeController extends Controller
{
    public function index()
    {
        $topRatedMovie = Movie::orderByDesc('rating')->first(); // Solo ordenamos por el campo "rating"

        // Obtener 3 portadas aleatorias de películas y series
        $movies = Movie::select('poster')->get();
        $series = Serie::select('poster')->get();
        $randomCovers = $movies->concat($series)->shuffle()->take(3);

        return view('welcome', compact('topRatedMovie', 'randomCovers'));
    }

    public function masValorada()
    {
        $topRatedMovie = Movie::orderByDesc('rating')->first(); // Solo ordenamos por el campo "rating"

        return view('welcome', compact('topRatedMovie'));
    }
}
