<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // we spacify what things can be inserted when a new instance is created
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price'
    ];
}
