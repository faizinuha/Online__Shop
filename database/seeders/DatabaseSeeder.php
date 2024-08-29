<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'rozakadm@gmail.com'], // Kondisi pencocokan
            [
                'name' => 'Zaki',
                'password' => Hash::make('as'),
                // 'email_verified_at' => now(), // Menandai email sebagai verified
            ]
        );
    }
}
