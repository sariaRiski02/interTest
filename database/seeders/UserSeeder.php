<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'username' => 'admin',
            'name' => 'Admin',
            'phone' => '081234567890',
            'token' => Str::random(10),
            'email' => 'admin@example.com',
            'password' => bcrypt('pastibisa'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
