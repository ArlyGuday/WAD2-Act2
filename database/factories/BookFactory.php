<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => $this->faker->unique()->isbn10(),
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'published_year' => $this->faker->numberBetween(1950, 2026),
            'pages' => $this->faker->numberBetween(100, 800),
            'genre' => $this->faker->randomElement(['Fiction', 'Non-Fiction', 'Science', 'History', 'Biography', 'Fantasy', 'Romance', 'Mystery', 'Thriller']),
        ];
    }
}
