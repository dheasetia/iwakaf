<?php

namespace Database\Seeders;

use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1 ; $i <= 10 ; $i++) {
            DB::table('articles')->insert([
                'user_id' => fake()->randomDigitNotNull(),
                'title' => fake()->sentence(),
                'location' => fake()->city(),
                'content' => fake()->paragraph(),
                'article_category_id' => 1,
                'editor_id' => fake()->randomDigitNotNull(),
                'picture_url'   => 'masjid.jpeg',
                'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d h:i:s')
            ]);
        }
    }
}
