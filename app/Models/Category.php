<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\User;

class Category extends Model
{
  protected $fillable = [
        'name',
    ];

    // One-to-Many
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Many-to-Many
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
