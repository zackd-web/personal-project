<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'slug' => 'fiction'],
            ['name' => 'Non-Fiksi', 'slug' => 'non-fiction'],
            ['name' => 'Edukasi', 'slug' => 'science-fiction'],
            ['name' => 'Novel', 'slug' => 'fantasy'],
            ['name' => 'Sejarah', 'slug' => 'romance'],
            ['name' => 'Biografi', 'slug' => 'mystery'],
            ['name' => 'Pengembangan', 'slug' => 'biography'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}