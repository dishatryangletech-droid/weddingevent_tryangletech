<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageFaq extends Model
{
    use HasFactory;

    protected $fillable = [
        'tagline',
        'title',
    ];
}
