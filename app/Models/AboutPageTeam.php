<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'description',
        'button_text',
        'button_link',
        'video_poster',
        'video_mp4',
        'video_webm',
    ];
}
