<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
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
        return $this->hasMany(ReviewSerie::class);
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
