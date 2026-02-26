<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand name',
        'description',
        'price',
        'category',
        'color',
        'stock'
    ];
}
