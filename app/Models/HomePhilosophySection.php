<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePhilosophySection extends Model
{
    protected $fillable = [
        'tagline', 'title', 'image', 'review_stars', 'review_text', 'review_author', 'review_author_subtitle', 'review_author_image'
    ];
}
