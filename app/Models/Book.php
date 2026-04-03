<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'category_id',
    ];

    // One-to-One 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // One-to-Many 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}