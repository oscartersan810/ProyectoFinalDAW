<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'movie_id', 'serie_id', 'content', 'rating'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
