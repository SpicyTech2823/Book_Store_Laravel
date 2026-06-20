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
        'category_id',
        'star_rating',
    ];

    // public function getCoverImageAttribute()
    // {
    //     return $this->attributes['cover_image'] ?? null;
    // }

    // public function setCoverImageAttribute($value)
    // {
    //     $this->attributes['cover_image'] = $value;
    // }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
