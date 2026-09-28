<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    protected $fillable = [
        'tagline',
        'title',
        'description',
        'image_left',
        'image_right',
        'service_1',
        'service_2',
        'service_3',
        'stat_number',
        'stat_symbol',
        'stat_text',
    ];
}
