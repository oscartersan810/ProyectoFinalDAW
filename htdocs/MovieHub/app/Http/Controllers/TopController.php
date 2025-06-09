<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        // Top 10 películas según rating, con al menos 1 reseña
        $topMovies = Movie::whereNotNull('rating')
            ->orderByDesc('rating')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        // Top 10 series según rating, con al menos 1 reseña
        $topSeries = Serie::whereNotNull('rating')
            ->orderByDesc('rating')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        return view('tops.top', compact('topMovies', 'topSeries'));
    }
}
