<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function resenas(Request $request)
    {
        $user = Auth::user();
        $type = $request->input('type', 'all'); // 'all', 'movie', 'serie'
        $title = $request->input('title'); // Para buscar por título

        $movieReviews = collect();
        $serieReviews = collect();

        if ($type === 'all' || $type === 'movie') {
            $movieQuery = \App\Models\ReviewMovie::with('movie')
                ->where('user_id', $user->id);

            if ($title) {
                $movieQuery->whereHas('movie', function ($q) use ($title) {
                    $q->where('title', 'like', "%{$title}%");
                });
            }

            $movieReviews = $movieQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id, 
                    'type' => 'Película',
                    'title' => $item->movie->title ?? 'Sin título',
                    'rating' => $item->rating,
                    'content' => $item->content,
                    'created_at' => $item->created_at,
                ];
            });
        }

        if ($type === 'all' || $type === 'serie') {
            $serieQuery = \App\Models\ReviewSerie::with('serie')
                ->where('user_id', $user->id);

            if ($title) {
                $serieQuery->whereHas('serie', function ($q) use ($title) {
                    $q->where('title', 'like', "%{$title}%");
                });
            }

            $serieReviews = $serieQuery->get()->map(function ($item) {
                return [
                    'id' => $item->id, 
                    'type' => 'Serie',
                    'title' => $item->serie->title ?? 'Sin título',
                    'rating' => $item->rating,
                    'content' => $item->content,
                    'created_at' => $item->created_at,
                ];
            });
        }

        // Unificamos y ordenamos
        $reviews = $movieReviews->concat($serieReviews)->sortByDesc('created_at');

        return view('user.resenas', [
            'reviews' => $reviews,
            'type' => $type,
            'title' => $title,
        ]);
    }

    public function puntuadas()
    {
        $user = Auth::user();
        $movieCount = \App\Models\ReviewMovie::where('user_id', $user->id)->count();
        $serieCount = \App\Models\ReviewSerie::where('user_id', $user->id)->count();
        return view('user.puntuadas', compact('movieCount', 'serieCount'));
    }
}
