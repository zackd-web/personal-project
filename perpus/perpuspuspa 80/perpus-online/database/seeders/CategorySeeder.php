<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiction', 'slug' => 'fiction'],
            ['name' => 'Non-Fiction', 'slug' => 'non-fiction'],
            ['name' => 'Science Fiction', 'slug' => 'science-fiction'],
            ['name' => 'Fantasy', 'slug' => 'fantasy'],
            ['name' => 'Romance', 'slug' => 'romance'],
            ['name' => 'Mystery', 'slug' => 'mystery'],
            ['name' => 'Biography', 'slug' => 'biography'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}