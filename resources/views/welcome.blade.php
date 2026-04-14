<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-vh-100 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">Laravel CRUD App</a>
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
            </div>
        </nav>

        <main class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow-sm">
                        <div class="card-body text-center p-5">
                            <h1 class="display-5 fw-bold mb-4">Welcome to Laravel CRUD Application</h1>
                            <p class="lead mb-5">A complete book management system with role-based access control.</p>

                            <div class="row g-4 mb-5">
                                <div class="col-sm-4">
                                    <div class="card border-primary h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">📚 Books</h5>
                                            <p class="card-text">Create, read, update, and delete books with ownership control.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card border-success h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">🏷️ Categories</h5>
                                            <p class="card-text">Organize books into categories (Admin only).</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card border-secondary h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">👥 Users</h5>
                                            <p class="card-text">Manage user accounts and roles (Admin only).</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('register') }}" class="btn btn-lg btn-primary px-5">Get Started</a>
                                <a href="{{ route('login') }}" class="btn btn-lg btn-outline-secondary px-5">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>