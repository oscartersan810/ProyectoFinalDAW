<?php
// app/Models/Favorite.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'serie_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

}
