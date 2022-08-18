<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            [
                'category_id' => 1,
                'name'  => 'Wakaf Mushaf',
                'title' => 'Wakaf Mushaf Al Quran',
                'location' => 'Surakarta',
                'target_amount' => 200000000,
                'days_target' => 60,
                'date_start' => '2022-08-01',
                'date_end' => '2022-09-30',
                'is_shown' => 1,
                'facebook_link' => '',
                'picture_url' => 'wakaf-mushaf.jpeg',
                'featured_picture_url' => 'wakaf-mushaf.jpeg',
                'caption' => "Divisi Sosial I-Salam memberi kesempatan untuk meraih kebaikan tanpa henti melalui wakaf Mushaf Al-Qur'an untuk masjid, pesantren, tahfizh, TPA, dan selainnya. Lipatgandakan wakaf anda dengan terus menerus menambah donasi anda di iSalam.",
                'first_choice_amount'   => 100000,
                'second_choice_amount'  => 200000,
                'third_choice_amount'   => 500000,
                'fourth_choice_amount'  => 1000000,
                'maintenance_fee'   => 5000,
                'is_favourite'  => 1,
                'created_at'    => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d h:i:s')
            ]
        ]);
    }
}
