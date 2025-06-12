<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'poster',
        'genre',
        'year',
    ];

    public function reviews()
    {
        return $this->hasMany(ReviewMovie::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function favorites()
{
    return $this->morphMany(Favorite::class, 'favoritable');
}


    
}
