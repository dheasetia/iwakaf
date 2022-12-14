<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->insert([
            [
                'category' => 'Pendidikan',
            ],
            [
                'category' => 'Sosial',
            ],
            [
                'category' => 'Dakwah',
            ],
            [
                'category' => 'Kesehatan',
            ],
            [
                'category' => 'Umum',
            ]
        ]);
    }
}
