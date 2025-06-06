<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\ReviewSerie;
use Illuminate\Support\Facades\Auth;

class ReviewSerieController extends Controller
{
    public function index()
    {
        $reviews = ReviewSerie::with(['user', 'serie'])->latest()->get();
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
