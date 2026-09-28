<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCorePromise extends Model
{
    protected $fillable = [
        'tagline',
        'title',
        'button_text',
        'button_link',
        'image',
        'item_1_title', 'item_1_desc',
        'item_2_title', 'item_2_desc',
        'item_3_title', 'item_3_desc',
        'video_mp4', 'video_webm',
    ];
}
