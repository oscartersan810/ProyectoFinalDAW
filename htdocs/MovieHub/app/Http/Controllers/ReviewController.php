<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Serie;
use App\Models\ReviewMovie;
use App\Models\ReviewSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $type = $request->query('type');
        $id = $request->query('id');

        $movie = null;
        $serie = null;

        if ($type === 'movies') {
            $movie = Movie::findOrFail($id);
        } elseif ($type === 'series') {
            $serie = Serie::findOrFail($id);
        } else {
            abort(404);
        }

        return view('resenas.create', compact('movie', 'serie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        $userId = Auth::id();

        if ($request->has('movie_id')) {
            ReviewMovie::create([
                'movie_id' => $request->movie_id,
                'content' => $request->content,
                'rating' => $request->rating,
                'user_id' => $userId,
            ]);
        } elseif ($request->has('serie_id')) {
            ReviewSerie::create([
                'serie_id' => $request->serie_id,
                'content' => $request->content,
                'rating' => $request->rating,
                'user_id' => $userId,
            ]);
        } else {
            return redirect()->back()->withErrors(['message' => 'Falta información de la película o serie.']);
        }

        return redirect()->route('explore')->with('success', '¡Reseña publicada con éxito!');
    }
}

