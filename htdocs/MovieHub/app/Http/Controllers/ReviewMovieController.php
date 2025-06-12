<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\ReviewMovie;
use Illuminate\Support\Facades\Auth;

class ReviewMovieController extends Controller
{
    // Todas las reseñas de películas
    public function index(Request $request)
    {
        $query = ReviewMovie::with(['user', 'movie'])->latest();

        // Filtrar por título de película
        if ($request->filled('movie_title')) {
            $query->whereHas('movie', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->movie_title . '%');
            });
        }

        // Filtrar por nombre de usuario
        if ($request->filled('user_name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user_name . '%');
            });
        }

        // Filtrar por rating
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        $reviews = $query->paginate(9)->withQueryString(); // 9 por página, ajusta si prefieres otro número

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

    public function destroy($id)
    {
        $review = ReviewMovie::findOrFail($id);

        // Opcional: verifica que el usuario sea el dueño de la reseña
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $review->delete();

        return back()->with('success', 'Reseña eliminada correctamente.');
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
