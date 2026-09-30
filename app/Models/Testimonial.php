<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'headline', 'review', 'image', 'status', 'sort_order'
    ];
}
