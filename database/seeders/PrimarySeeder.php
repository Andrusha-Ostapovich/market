<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class PrimarySeeder extends Seeder
{
    /**
     * Створення Адміна
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@app.com',
            'password' => 'password',
            'role' => 'admin',
        ]);
    }
}
