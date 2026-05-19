<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'price',
        'description',
        'cover_image',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
