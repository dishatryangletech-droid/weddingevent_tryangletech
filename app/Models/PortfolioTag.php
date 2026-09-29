<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioTag extends Model
{
    use HasFactory;

    protected $table = 'portfolio_tags';

    protected $fillable = ['name', 'status', 'sort_order'];
}
