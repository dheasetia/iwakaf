<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_methods = [
            [
                'payment_method_id' => 1,
                'code'  => 'VC',
                'display_text' => '(Visa / Master Card / JCB)',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'BC',
                'display_text' => 'BCA Virtual Account',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'M2',
                'display_text' => 'Mandiri Virtual Account',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'VA',
                'display_text' => 'Maybank Virtual Account',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'I1',
                'display_text' => 'BNI Virtual Account',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'B1',
                'display_text' => 'CIMB Niaga Virtual Account',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'BT',
                'display_text' => 'Permata Bank Virtual Account',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'A1',
                'display_text' => 'ATM Bersama',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'AG',
                'display_text' => 'Bank Artha Graha',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'NC',
                'display_text' => 'Bank Neo Commerce/BNC',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'BR',
                'display_text' => 'BRIVA',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 2,
                'code'  => 'S1',
                'display_text' => 'Bank Sahabat Sampoerna',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 3,
                'code'  => 'FT',
                'display_text' => 'Pegadaian/ALFA/Pos',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 3,
                'code'  => 'A2',
                'display_text' => 'POS Indonesia',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 3,
                'code'  => 'IR',
                'display_text' => 'Indomaret',
                'is_shown'  => 1
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'OV',
                'display_text' => 'OVO',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'SA',
                'display_text' => 'Shopee Pay Apps',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'LF',
                'display_text' => 'LinkAja Apps (Fixed Fee)',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'LA',
                'display_text' => 'LinkAja Apps (Percentage Fee)',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'DA',
                'display_text' => 'DANA',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'SL',
                'display_text' => 'Shopee Pay Account Link',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 4,
                'code'  => 'OL',
                'display_text' => 'OVO Account Link',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 5,
                'code'  => 'SP',
                'display_text' => 'Shopee Pay',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 5,
                'code'  => 'LQ',
                'display_text' => 'LinkAja',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 5,
                'code'  => 'NQ',
                'display_text' => 'Nobu',
                'is_shown'  => 0
            ],
            [
                'payment_method_id' => 6,
                'code'  => 'DN',
                'display_text' => 'Indodana Paylater',
                'is_shown'  => 0
            ]
        ];

        DB::table('payment_methods')->insert($payment_methods);
    }
}
