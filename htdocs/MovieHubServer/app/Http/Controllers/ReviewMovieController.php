<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\ReviewMovie;
use Illuminate\Support\Facades\Auth;

class ReviewMovieController extends Controller
{
    // Todas las reseñas de películas
    public function index()
    {
        $reviews = ReviewMovie::with(['user', 'movie'])->latest()->get();
        return view('reviews.movies', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        ReviewMovie::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::id(), // ← más claro para IDEs
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        $average = ReviewMovie::where('movie_id', $request->movie_id)->avg('rating');

        $movie = Movie::find($request->movie_id);
        $movie->rating = round($average, 1);
        $movie->save();

        return redirect()->route('explore')->with('success', 'Reseña publicada');

    }

    // // Mostrar una película específica y sus reseñas + formulario
    // public function show($movieId)
    // {
    //     $movie = Movie::findOrFail($movieId);
    //     $reviews = ReviewMovie::with('user')->where('movie_id', $movieId)->latest()->get();
    //     return view('reviews.movie', compact('movie', 'reviews'));
    // }


    // // Guardar reseña para una película
    // public function store(Request $request, $movieId)
    // {
    //     $request->validate([
    //         'content' => 'required|string',
    //         'rating' => 'required|integer|min:1|max:5',
    //     ]);

    //     ReviewMovie::create([
    //         'user_id' => Auth::id() ?? 1,
    //         'movie_id' => $movieId,
    //         'content' => $request->content,
    //         'rating' => $request->rating,
    //     ]);

    //     return back()->with('success', '¡Reseña enviada con éxito!');
    // }
}
