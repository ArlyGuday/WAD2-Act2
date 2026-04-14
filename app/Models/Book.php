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
        'isbn',
        'author',
        'publisher',
        'published_year',
        'pages',
        'genre',
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

    // Check if user owns this book
    public function isOwnedBy(User $user): bool
    {
        return $this->user_id === $user->id || $user->isAdmin();
    }
}