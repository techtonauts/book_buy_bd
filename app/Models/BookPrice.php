<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookPrice extends Model
{
    protected $fillable = [
        'book_id',
        'print_type',
        'price',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
