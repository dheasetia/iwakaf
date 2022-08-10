<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_method_types')->insert([
            [
                'id' => 1,
                'type' => 'Credit Card'
            ],
            [
                'id' => 2,
                'type' => 'Virtual Account'
            ],
            [
                'id' => 3,
                'type' => 'Ritel'
            ],
            [
                'id' => 4,
                'type' => 'E-Wallet'
            ],
            [
                'id' => 5,
                'type' => 'QRIS'
            ],
            [
                'id' => 6,
                'type' => 'Kredit'
            ]
        ]);
    }
}
