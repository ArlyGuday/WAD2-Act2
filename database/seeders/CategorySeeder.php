<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Fiction']);
        Category::create(['name' => 'Non-fiction']);
        Category::create(['name' => 'Science']);
    }
}
