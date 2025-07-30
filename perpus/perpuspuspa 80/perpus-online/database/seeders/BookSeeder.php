<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'publisher' => 'J. B. Lippincott & Co.',
                'category_id' => 1, // Fiction
                'year' => 1960,
                'description' => 'A classic novel about racial injustice and childhood innocence.',
                'total_copies' => 10,
                'available_stock' => 7
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'publisher' => 'Secker & Warburg',
                'category_id' => 3, // Science Fiction
                'year' => 1949,
                'description' => 'A dystopian social science fiction novel.',
                'total_copies' => 15,
                'available_stock' => 12
            ],
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'publisher' => 'Charles Scribner\'s Sons',
                'category_id' => 1, // Fiction
                'year' => 1925,
                'description' => 'A story of decadence and excess in the Jazz Age.',
                'total_copies' => 8,
                'available_stock' => 3
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'publisher' => 'T. Egerton',
                'category_id' => 5, // Romance
                'year' => 1813,
                'description' => 'A romantic novel of manners.',
                'total_copies' => 12,
                'available_stock' => 9
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'publisher' => 'George Allen & Unwin',
                'category_id' => 4, // Fantasy
                'year' => 1937,
                'description' => 'A fantasy adventure novel.',
                'total_copies' => 20,
                'available_stock' => 15
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}