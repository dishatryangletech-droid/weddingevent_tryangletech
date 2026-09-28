<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'background_image',
    ];
}
