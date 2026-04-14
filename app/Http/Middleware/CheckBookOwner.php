<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Book;

class CheckBookOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the book from route parameters. It may already be a bound Book model.
        $book = $request->route('book');

        if (! $book instanceof Book) {
            $book = Book::findOrFail($book);
        }

        // Check if user owns the book or is admin
        if ($book->isOwnedBy(auth()->user())) {
            return $next($request);
        }

        // If not authorized, redirect with error message
        return redirect('/books')->with('error', 'Unauthorized: You can only edit/delete your own books.');
    }
}
