<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeServiceCard extends Model
{
    protected $fillable = ['title', 'description', 'image', 'sort_order'];
}
