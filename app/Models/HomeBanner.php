<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'button_text',
        'button_link',
        'background_image',
        'video_poster',
        'video_mp4',
        'video_webm',
        'video_text',
        'feature_1_title', 'feature_1_desc', 'feature_1_icon',
        'feature_2_title', 'feature_2_desc', 'feature_2_icon',
        'feature_3_title', 'feature_3_desc', 'feature_3_icon',
        'feature_4_title', 'feature_4_desc', 'feature_4_icon',
    ];
}
