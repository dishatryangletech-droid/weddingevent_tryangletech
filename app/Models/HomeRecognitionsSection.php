<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeRecognitionsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'video_poster',
        'video_mp4',
        'video_webm',
    ];
}
