<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'John Smith',
                'email' => 'john@example.com',
                'phone' => '(555) 123-4567',
                'address' => '123 Main St, City, State',
                'join_date' => '2023-01-15'
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@example.com',
                'phone' => '(555) 234-5678',
                'address' => '456 Oak Ave, City, State',
                'join_date' => '2023-02-20'
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael@example.com',
                'phone' => '(555) 345-6789',
                'address' => '789 Pine St, City, State',
                'join_date' => '2023-03-10'
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily@example.com',
                'phone' => '(555) 456-7890',
                'address' => '321 Elm St, City, State',
                'join_date' => '2023-04-05'
            ],
            [
                'name' => 'David Wilson',
                'email' => 'david@example.com',
                'phone' => '(555) 567-8901',
                'address' => '654 Maple Ave, City, State',
                'join_date' => '2023-05-12'
            ]
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}