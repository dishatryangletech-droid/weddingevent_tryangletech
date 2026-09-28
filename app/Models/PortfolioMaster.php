<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioMaster extends Model
{
    protected $fillable = ['title', 'description', 'image', 'link'];
}
