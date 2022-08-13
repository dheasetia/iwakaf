<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category' => 'Pendidikan',
                'icon'  => 'pendidikan.png'
            ],
            [
                'category' => 'Sosial',
                'icon'  => 'charity.png'
            ],
            [
                'category' => 'Dakwah',
                'icon'  => 'dakwah.png'
            ],
            [
                'category' => 'Kesehatan',
                'icon'  => 'kesehatan.png'
            ],
            [
                'category' => 'Umum',
                'icon'  => 'umum.png'
            ],
        ]);
    }
}
