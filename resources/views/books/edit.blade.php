<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Book</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror" 
                                       id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
                                @error('isbn')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $book->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" 
                                       id="author" name="author" value="{{ old('author', $book->author) }}" required>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="publisher" class="form-label">Publisher</label>
                                <input type="text" class="form-control @error('publisher') is-invalid @enderror" 
                                       id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required>
                                @error('publisher')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="published_year" class="form-label">Published Year</label>
                                <input type="number" class="form-control @error('published_year') is-invalid @enderror" 
                                       id="published_year" name="published_year" value="{{ old('published_year', $book->published_year) }}" min="1000" max="2100" required>
                                @error('published_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Pages</label>
                                <input type="number" class="form-control @error('pages') is-invalid @enderror" 
                                       id="pages" name="pages" value="{{ old('pages', $book->pages) }}" min="1" required>
                                @error('pages')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre</label>
                                <select class="form-select @error('genre') is-invalid @enderror" 
                                        id="genre" name="genre" required>
                                    <option value="">Select Genre</option>
                                    <option value="Fiction" {{ old('genre', $book->genre) == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                                    <option value="Non-Fiction" {{ old('genre', $book->genre) == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                    <option value="Science" {{ old('genre', $book->genre) == 'Science' ? 'selected' : '' }}>Science</option>
                                    <option value="History" {{ old('genre', $book->genre) == 'History' ? 'selected' : '' }}>History</option>
                                    <option value="Biography" {{ old('genre', $book->genre) == 'Biography' ? 'selected' : '' }}>Biography</option>
                                    <option value="Fantasy" {{ old('genre', $book->genre) == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                                    <option value="Romance" {{ old('genre', $book->genre) == 'Romance' ? 'selected' : '' }}>Romance</option>
                                    <option value="Mystery" {{ old('genre', $book->genre) == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                                    <option value="Thriller" {{ old('genre', $book->genre) == 'Thriller' ? 'selected' : '' }}>Thriller</option>
                                </select>
                                @error('genre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
