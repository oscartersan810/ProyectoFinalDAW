<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\ReviewSerie;
use Illuminate\Support\Facades\Auth;

class ReviewSerieController extends Controller
{
    public function index(Request $request)
    {
        $query = ReviewSerie::with(['user', 'serie'])->latest();

        // Filtrar por título de serie
        if ($request->filled('serie_title')) {
            $query->whereHas('serie', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->serie_title . '%');
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

        $reviews = $query->paginate(9)->withQueryString(); // 9 por página, ajusta si quieres

        return view('reviews.series', compact('reviews'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'serie_id' => 'required|exists:series,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        ReviewSerie::create([
            'serie_id' => $request->serie_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'content' => $request->content,
        ]);

        $average = ReviewSerie::where('serie_id', $request->serie_id)->avg('rating');

        $serie = Serie::find($request->serie_id);
        $serie->rating = round($average, 1);
        $serie->save();

        return redirect()->route('explore')->with('success', 'Reseña publicada');
    }
    
    public function destroy($id)
    {
        $review = ReviewSerie::findOrFail($id);

        // Verifica que el usuario sea el dueño de la reseña
        if ($review->user_id !== Auth::id()) {
            abort(403);
        }

        $review->delete();

        return back()->with('success', 'Reseña eliminada correctamente.');
    }

    // public function show($serieId)
    // {
    //     $serie = Serie::findOrFail($serieId);
    //     $reviews = ReviewSerie::with('user')->where('serie_id', $serieId)->latest()->get();
    //     return view('reviews.series', compact('serie', 'reviews'));
    // }

    // public function store(Request $request, $serieId)
    // {
    //     $request->validate([
    //         'content' => 'required|string',
    //         'rating' => 'required|integer|min:1|max:5',
    //     ]);

    //     $data = [
    //         'user_id' => 1, // ✅ Mejor usar el ID del usuario autenticado
    //         'serie_id' => $serieId,
    //         'content' => $request->content,
    //         'rating' => $request->rating,
    //     ];

    //     ReviewSerie::create($data);

    //     return back()->with('success', '¡Reseña enviada con éxito!');
    // }
}
