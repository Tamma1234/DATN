<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'price',
        'sale_percent',
        'stocks',
        'is_active'
    ];
}
