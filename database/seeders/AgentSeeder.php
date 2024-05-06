<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'type' => User::AGENT,
            'name' => 'Monooka Agent',
            'email' => 'agent@manooka.com',
            'password' => Hash::make('Password123#')
        ]);
    }
}
