<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $series = Serie::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->paginate(4);

        return view('admin.series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'genre' => 'required|string|max:255',
            'year' => 'required|integer|min:1880|max:2100',
        ]);

        // Guardar el archivo del póster
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = null;
        }

        Serie::create([
            'title' => $request->title,
            'description' => $request->description,
            'poster' => $posterPath,
            'genre' => $request->genre,
            'year' => $request->year,
            'rating' => 0,
        ]);

        return redirect()->route('admin.series')->with('success', 'Serie añadida correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $serie)
    {
        return view('admin.series.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $serie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer|min:1880|max:2100',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $serie->title = $request->title;
        $serie->description = $request->description;
        $serie->genre = $request->genre;
        $serie->year = $request->year;

        if ($request->hasFile('poster')) {
            // Borra el archivo anterior si existe
            if ($serie->poster && Storage::exists($serie->poster)) {
                Storage::delete($serie->poster);
            }

            // Guarda el nuevo póster
            $posterPath = $request->file('poster')->store('series_posters', 'public');
            $serie->poster = $posterPath;
        }

        $serie->save();

        return redirect()->route('admin.series')->with('success', 'Serie actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        if ($serie->poster) {
            Storage::disk('public')->delete($serie->poster);
        }

        $serie->delete();

        return redirect()->route('admin.series')->with('success', 'Serie eliminada con éxito.');
    }
}
