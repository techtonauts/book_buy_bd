<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BookPrice;
use App\Models\BookImage;
use App\Models\Category;

class Book extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'slug',
        'description',
        'author',
        'edition',
        'stock',
        'category_id',
    ];

    public function prices()
    {
        return $this->hasMany(BookPrice::class);
    }

    public function images()
    {
        return $this->hasMany(BookImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
