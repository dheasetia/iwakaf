<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 10 ; $i++) {
            DB::table('bios')->insert(
                [
                    'name' => fake()->name(),
                    'user_id' => $i,
                    'phone' => '08' . fake()->randomNumber(9, false),
                    'address' => fake()->streetAddress(),
                    'village' => ucfirst(fake()->word(1)),
                    'district' => ucfirst(fake()->word(1)),
                    'city' => fake()->city(),
                    'province' => fake()->state(),
                    'zip_code' => fake()->postcode(),
                    'avatar_url' => 'https://placekitten.com/300/300',
                    'level' => 'wakif'
                ]
            );
        }
    }
}