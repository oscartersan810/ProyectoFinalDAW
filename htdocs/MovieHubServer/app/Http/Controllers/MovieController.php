<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Container\Attributes\Auth;


use Illuminate\Http\Request;
class MovieController extends Controller
{
    public function create()
    {
        
        $user = request()->user(); // O también $request->user();

        if ($user->role !== 'admin') {
            abort(403, 'No tienes permiso');
        }
        

        return view('peliculas.create');
    }

    public function store(Request $request)
    {
        $user = request()->user(); // O también $request->user();

        if ($user->role !== 'admin') {
            abort(403, 'No tienes permiso');
        }
        

        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required',
            'poster' => 'nullable|image',
        ]);

        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        Movie::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'poster' => $posterPath,
        ]);

        return redirect()->route('peliculas.create')->with('success', 'Película añadida');
    }
}
