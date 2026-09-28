<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageMission extends Model
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
        'feature_1_title',
        'feature_1_image',
        'feature_2_title',
        'feature_2_image',
        'feature_3_title',
        'feature_3_image',
        'feature_4_title',
        'feature_4_image',
    ];
}
