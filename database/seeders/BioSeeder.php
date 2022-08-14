<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        for ($i = 1 ; $i <= 13 ; $i++) {
            $user = User::findOrFail($i);
            DB::table('bios')->insert(
                [
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'user_id' => $user->id,
                    'phone_number' => '08' . fake()->randomNumber(9, false),
                    'address' => fake()->streetAddress(),
                    'village' => ucfirst(fake()->word(1)),
                    'district' => ucfirst(fake()->word(1)),
                    'city' => fake()->city(),
                    'province' => fake()->state(),
                    'zip_code' => fake()->postcode(),
                    'avatar_url' => 'https://placekitten.com/300/300',
                    'level' => 'wakif',
                    'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                    'updated_at'    => Carbon::now()->format('Y-m-d h:i:s')
                ]
            );
        }
    }
}
