<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class WelcomeController extends Controller
{
    public function index()
    {
        $topRatedMovie = Movie::orderByDesc('rating')->first(); // Solo ordenamos por el campo "rating"

        return view('welcome', compact('topRatedMovie'));
    }
}
