<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageExpertise extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
        'left_image',
    ];
}
