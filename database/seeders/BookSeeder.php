<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get users and categories
        $users = User::where('role', 'user')->get();
        $categories = Category::all();

        // Seed books
        $books = [
            ['title' => 'Laravel Basics', 'author' => 'John Doe', 'publisher' => 'Tech Press', 'published_year' => 2024, 'isbn' => '1111111111', 'pages' => 200, 'genre' => 'Non-Fiction'],
            ['title' => 'PHP Advanced', 'author' => 'Jane Smith', 'publisher' => 'Code House', 'published_year' => 2023, 'isbn' => '2222222222', 'pages' => 300, 'genre' => 'Non-Fiction'],
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'publisher' => 'Classics', 'published_year' => 1925, 'isbn' => '3333333333', 'pages' => 180, 'genre' => 'Fiction'],
            ['title' => 'A Brief History of Time', 'author' => 'Stephen Hawking', 'publisher' => 'Science Books', 'published_year' => 1988, 'isbn' => '4444444444', 'pages' => 256, 'genre' => 'Science'],
            ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'publisher' => 'Fantasy Press', 'published_year' => 1937, 'isbn' => '5555555555', 'pages' => 310, 'genre' => 'Fantasy'],
        ];

        foreach ($books as $index => $bookData) {
            Book::create(array_merge(
                $bookData,
                [
                    'user_id' => $users->isNotEmpty() ? $users[$index % $users->count()]->id : 2,
                    'category_id' => $categories->isNotEmpty() ? $categories[$index % $categories->count()]->id : 1,
                ]
            ));
        }
    }
}

