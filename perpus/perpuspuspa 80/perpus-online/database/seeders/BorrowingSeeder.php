<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrowing;
use Carbon\Carbon;

class BorrowingSeeder extends Seeder
{
    public function run(): void
    {
        $borrowings = [
            [
                'book_id' => 1,
                'member_id' => 1,
                'borrow_date' => Carbon::now()->subDays(10),
                'due_date' => Carbon::now()->addDays(4),
                'status' => 'dipinjam'
            ],
            [
                'book_id' => 2,
                'member_id' => 2,
                'borrow_date' => Carbon::now()->subDays(20),
                'due_date' => Carbon::now()->subDays(6),
                'status' => 'terlambat'
            ],
            [
                'book_id' => 3,
                'member_id' => 3,
                'borrow_date' => Carbon::now()->subDays(25),
                'due_date' => Carbon::now()->subDays(11),
                'return_date' => Carbon::now()->subDays(12),
                'status' => 'dikembalikan',
                'condition' => 'baik'
            ]
        ];

        foreach ($borrowings as $borrowing) {
            Borrowing::create($borrowing);
        }
    }
}