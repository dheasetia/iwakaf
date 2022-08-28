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
                'payment_method_type_id' => 1,
                'code'  => 'VC',
                'display_text' => '(Visa / Master Card / JCB)',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'BC',
                'display_text' => 'BCA Virtual Account',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/BCA.SVG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'M2',
                'display_text' => 'Mandiri Virtual Account',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/MV.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'VA',
                'display_text' => 'Maybank Virtual Account',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/VA.PNG',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'I1',
                'display_text' => 'BNI Virtual Account',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/I1.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'B1',
                'display_text' => 'CIMB Niaga Virtual Account',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/B1.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'BT',
                'display_text' => 'Permata Bank Virtual Account',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/PERMATA.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'A1',
                'display_text' => 'ATM Bersama',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/A1.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'AG',
                'display_text' => 'Bank Artha Graha',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'NC',
                'display_text' => 'Bank Neo Commerce/BNC',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'BR',
                'display_text' => 'BRIVA',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/BR.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 2,
                'code'  => 'S1',
                'display_text' => 'Bank Sahabat Sampoerna',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 3,
                'code'  => 'FT',
                'display_text' => 'Pegadaian/ALFA/Pos',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/retail.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 3,
                'code'  => 'A2',
                'display_text' => 'POS Indonesia',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 3,
                'code'  => 'IR',
                'display_text' => 'Indomaret',
                'icon_url'  => 'https://images.duitku.com/hotlink-ok/IR.PNG',
                'is_shown'  => 1
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'OV',
                'display_text' => 'OVO',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'SA',
                'display_text' => 'Shopee Pay Apps',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'LF',
                'display_text' => 'LinkAja Apps (Fixed Fee)',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'LA',
                'display_text' => 'LinkAja Apps (Percentage Fee)',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'DA',
                'display_text' => 'DANA',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'SL',
                'display_text' => 'Shopee Pay Account Link',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 4,
                'code'  => 'OL',
                'display_text' => 'OVO Account Link',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 5,
                'code'  => 'SP',
                'display_text' => 'Shopee Pay',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 5,
                'code'  => 'LQ',
                'display_text' => 'LinkAja',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 5,
                'code'  => 'NQ',
                'display_text' => 'Nobu',
                'icon_url'  => '',
                'is_shown'  => 0
            ],
            [
                'payment_method_type_id' => 6,
                'code'  => 'DN',
                'display_text' => 'Indodana Paylater',
                'icon_url'  => '',
                'is_shown'  => 0
            ]
        ];

        DB::table('payment_methods')->insert($payment_methods);
    }
}
