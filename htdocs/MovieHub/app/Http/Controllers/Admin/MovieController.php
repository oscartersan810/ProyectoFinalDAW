<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Mostrar la lista de películas.
     */ public function index(Request $request)
    {
        $search = $request->input('search');
        $movies = Movie::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->paginate(6);

        return view('admin.movies.index', compact('movies'));
    }
    /**
     * Mostrar el formulario de creación.
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Guardar una nueva película.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer|digits:4',
        ]);

        // Guardar el archivo del póster
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = null;
        }

        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'poster' => $posterPath,
            'genre' => $request->genre,
            'year' => $request->year,
        ]);
        return redirect()->route('admin.movies')->with('success', 'Película creada correctamente.');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }
    /**
     * Mostrar el formulario para editar una película.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Actualizar una película.
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer|min:1880|max:2100',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->genre = $request->genre;
        $movie->year = $request->year;

        if ($request->hasFile('poster')) {
            // Borra el archivo anterior si existe
            if ($movie->poster && Storage::exists($movie->poster)) {
                Storage::delete($movie->poster);
            }

            // Guarda el nuevo póster
            $posterPath = $request->file('poster')->store('posters', 'public');
            $movie->poster = $posterPath;
        }

        $movie->save();

        return redirect()->route('admin.movies')->with('success', 'Película actualizada correctamente.');
    }

    /**
     * Eliminar una película.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movies')->with('success', 'Película eliminada correctamente.');
    }
}
