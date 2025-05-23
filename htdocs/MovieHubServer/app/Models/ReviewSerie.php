<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSerie extends Model
{
     protected $table = 'reviewsseries'; // o 'review_series' si es con guión bajo

     protected $fillable = ['serie_id', 'user_id', 'content', 'rating'];

     public function serie()
     {
          return $this->belongsTo(Serie::class);
     }

     public function user()
     {
          return $this->belongsTo(User::class);
     }
}
