<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Constructor to apply middleware
     */
    public function __construct()
    {
        // Apply auth middleware to all methods
        $this->middleware('auth');
        
        // Apply book.owner middleware only to edit, update, and destroy methods
        $this->middleware('book.owner')->only(['edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the user relationship
        $books = Book::with('user', 'category')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Load categories for the dropdown
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'required|unique:books,isbn',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:2100',
            'pages' => 'required|integer|min:1',
            'genre' => 'required|in:Fiction,Non-Fiction,Science,History,Biography,Fantasy,Romance,Mystery,Thriller',
        ]);

        // Create book with current user as owner
        Book::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_year' => $request->published_year,
            'pages' => $request->pages,
            'genre' => $request->genre,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Eager load relationships
        $book->load('user', 'category');
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        // Eager load relationships and load categories
        $book->load('user', 'category');
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1000|max:2100',
            'pages' => 'required|integer|min:1',
            'genre' => 'required|in:Fiction,Non-Fiction,Science,History,Biography,Fantasy,Romance,Mystery,Thriller',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
