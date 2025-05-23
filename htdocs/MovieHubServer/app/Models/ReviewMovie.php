<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewMovie extends Model
{
    protected $table = 'reviewsmovies';

    protected $fillable = ['movie_id', 'user_id', 'rating', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
