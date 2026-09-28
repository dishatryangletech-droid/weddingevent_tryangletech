<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePortfolioSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'button_text',
        'button_link',
    ];
}
