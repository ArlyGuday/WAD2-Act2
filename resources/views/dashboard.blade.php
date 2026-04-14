<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-4">
                        <p class="text-sm text-gray-600">Welcome to your Laravel CRUD application with middleware access control.</p>

                        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-blue-800">Books</h3>
                                <p class="text-blue-600 text-sm">Manage your books with full CRUD operations</p>
                                <a href="{{ route('books.index') }}" class="mt-2 inline-block text-blue-600 hover:text-blue-800">View Books →</a>
                            </div>

                            @auth
                                @if(Auth::user()->isAdmin())
                                    <div class="bg-green-50 p-4 rounded-lg">
                                        <h3 class="font-semibold text-green-800">Categories</h3>
                                        <p class="text-green-600 text-sm">Admin: Manage book categories</p>
                                        <a href="{{ route('categories.index') }}" class="mt-2 inline-block text-green-600 hover:text-green-800">Manage Categories →</a>
                                    </div>

                                    <div class="bg-purple-50 p-4 rounded-lg">
                                        <h3 class="font-semibold text-purple-800">Users</h3>
                                        <p class="text-purple-600 text-sm">Admin: Manage user accounts</p>
                                        <a href="{{ route('users.index') }}" class="mt-2 inline-block text-purple-600 hover:text-purple-800">Manage Users →</a>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
