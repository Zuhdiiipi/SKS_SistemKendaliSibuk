<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat satu akun khusus administrator
        User::create([
            'name' => 'Administrator SKS',
            'email' => 'admin@gmail.com', // Gunakan email ini untuk login nanti
            'password' => Hash::make('12345678'), // Sandi default
            'role_level' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}