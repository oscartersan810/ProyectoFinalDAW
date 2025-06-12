<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewMovie;
use App\Models\ReviewSerie;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    // Mostrar todas las reseñas (películas y series)
    public function index(Request $request)
    {
        $type = $request->input('type', 'all');
        $title = $request->input('title');
        $user = $request->input('user');

        $movieReviews = collect();
        $serieReviews = collect();

        if ($type === 'all' || $type === 'movie') {
            $movieQuery = ReviewMovie::with(['movie', 'user']);

            if ($title) {
                $movieQuery->whereHas('movie', function ($q) use ($title) {
                    $q->where('title', 'like', "%{$title}%");
                });
            }
            if ($user) {
                $movieQuery->whereHas('user', function ($q) use ($user) {
                    $q->where('name', 'like', "%{$user}%");
                });
            }

            $movieReviews = $movieQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'type' => 'Película',
                    'title' => $item->movie->title ?? 'Sin título',
                    'user' => $item->user->name ?? 'Sin usuario',
                    'rating' => $item->rating,
                    'content' => $item->content,
                    'created_at' => $item->created_at,
                ];
            });
        }

        if ($type === 'all' || $type === 'serie') {
            $serieQuery = ReviewSerie::with(['serie', 'user']);

            if ($title) {
                $serieQuery->whereHas('serie', function ($q) use ($title) {
                    $q->where('title', 'like', "%{$title}%");
                });
            }
            if ($user) {
                $serieQuery->whereHas('user', function ($q) use ($user) {
                    $q->where('name', 'like', "%{$user}%");
                });
            }

            $serieReviews = $serieQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'type' => 'Serie',
                    'title' => $item->serie->title ?? 'Sin título',
                    'user' => $item->user->name ?? 'Sin usuario',
                    'rating' => $item->rating,
                    'content' => $item->content,
                    'created_at' => $item->created_at,
                ];
            });
        }

        $reviews = $movieReviews->concat($serieReviews)->sortByDesc('created_at');

        return view('admin.reviews.index', [
            'reviews' => $reviews,
            'type' => $type,
            'title' => $title,
        ]);
    }

    // Editar una reseña (película o serie)
    public function edit($type, $id)
    {
        if ($type === 'movie') {
            $review = ReviewMovie::with(['movie', 'user'])->findOrFail($id);
            $isMovie = true;
        } else {
            $review = ReviewSerie::with(['serie', 'user'])->findOrFail($id);
            $isMovie = false;
        }

        return view('admin.reviews.edit', [
            'review' => $review,
            'isMovie' => $isMovie,
        ]);
    }

    // Actualizar una reseña (película o serie)
    public function update(Request $request, $type, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        if ($type === 'movie') {
            $review = ReviewMovie::findOrFail($id);
            $review->content = $request->input('content');
            $review->rating = $request->input('rating');
            $review->save();
            return redirect()->route('admin.reviews')->with('success', 'Reseña de película actualizada correctamente.');
        } else {
            $review = ReviewSerie::findOrFail($id);
            $review->content = $request->input('content');
            $review->rating = $request->input('rating');
            $review->save();
            return redirect()->route('admin.reviews')->with('success', 'Reseña de serie actualizada correctamente.');
        }
    }

    // Eliminar una reseña (película o serie)
    public function destroy($id)
    {
        // Buscar primero en películas
        $review = ReviewMovie::find($id);
        if ($review) {
            $review->delete();
            return back()->with('success', 'Reseña de película eliminada correctamente.');
        }

        // Si no es de película, buscar en series
        $review = ReviewSerie::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Reseña de serie eliminada correctamente.');
    }
}
