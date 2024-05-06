<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'type' => User::ADMIN,
            'name' => 'Super Admin',
            'email' => 'admin@manooka.com',
            'password' => Hash::make('Password123#')
        ]);
    }
}
