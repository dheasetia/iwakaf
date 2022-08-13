<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Muhammad',
                'last_name' => 'Alwi',
                'email' => 'dheasetia@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d h:i:s')
            ],
            [
                'first_name' => 'Abdurrahman',
                'last_name' => 'Fawwaz',
                'email' => 'inifawaz@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d h:i:s')
            ],
            [
                'first_name' => 'Eko',
                'last_name' => 'Prasetio',
                'email' => 'abuusamahabdurrahman@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d h:i:s')
            ]
        ]);

    }
}
