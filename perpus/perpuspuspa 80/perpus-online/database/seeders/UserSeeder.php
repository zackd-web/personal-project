<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@perpuspa909.com',
            'password' => Hash::make('perpuspancur9090'),
            'role' => 'admin'
        ]);
    }
}