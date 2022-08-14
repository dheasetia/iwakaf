<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(10)->create();
         $this->call([
             UserDefaultSeeder::class,
             BioSeeder::class,
             PaymentMethodTypeSeeder::class,
             PaymentMethodSeeder::class,
             CategorySeeder::class,
             ArticleCategorySeeder::class,
             ProjectSeeder::class,
             ArticleSeeder::class,
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
