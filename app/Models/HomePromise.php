<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePromise extends Model
{
    protected $fillable = [
        'tagline',
        'title',
        'card_1_tagline', 'card_1_title', 'card_1_desc', 'card_1_image',
        'card_2_tagline', 'card_2_title', 'card_2_desc', 'card_2_image',
        'card_3_tagline', 'card_3_title', 'card_3_desc', 'card_3_image',
    ];
}
