<?php

namespace App\Http\Controllers\Explorer;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->input('type', 'movies'); // Por defecto 'movies'
        $title = $request->input('title');
        $genre = $request->input(key: 'genre');
        $year = $request->input('year');

        // Consulta dinámica según el tipo
        if ($type === 'series') {
            $query = Serie::query();
        } else {
            $query = Movie::query();
        }

        // Aplicar filtros
        if ($title) {
            $query->where('title', 'LIKE', "%$title%");
        }

        if ($genre) {
            $query->where('genre', $genre);
        }

        if ($year) {
            $query->where('year', $year);
        }

        $items = $query->paginate(12);

        // Obtener todos los géneros únicos de ambas tablas si lo deseas unificado
        $genres = collect([]);
        if ($type === 'series') {
            $genres = Serie::select('genre')->distinct()->pluck('genre');
        } else {
            $genres = Movie::select('genre')->distinct()->pluck('genre');
        }

        return view('pages.explore', compact('items', 'genres'));
    }
}
