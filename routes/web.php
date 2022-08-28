<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('layout.app');
//});
Route::get('checkarray', function () {
   $method = array(
       [
           "paymentMethod" => "SP",
            "paymentName" => "SHOPEEPAY QRIS",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/SHOPEEPAY.PNG",
            "totalFee" => "0"
       ],
        [
            "paymentMethod" => "SA",
            "paymentName" => "SHOPEEPAY APP",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/SHOPEEPAY.PNG",
            "totalFee" => "0"
        ],
        [
            "paymentMethod" => "LQ",
            "paymentName" => "LINKAJA QRIS",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/LINKAJA.PNG",
            "totalFee" => "0"
        ],
        [
            "paymentMethod" => "BC",
            "paymentName" => "BCA VA",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/BCA.SVG",
            "totalFee" => "5000"
        ],
        [
            "paymentMethod" => "IR",
            "paymentName" => "INDOMARET",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/IR.PNG",
            "totalFee" => "7500"
        ],
        [
            "paymentMethod" => "SL",
            "paymentName" => "SHOPEEPAY LINK",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/SHOPEEPAY.PNG",
            "totalFee" => "0"
        ],
        [
            "paymentMethod" => "BR",
            "paymentName" => "BRI VA",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/BR.PNG",
            "totalFee" => "4000"
        ],
        [
            "paymentMethod" => "NQ",
            "paymentName" => "NOBU QRIS",
            "paymentImage" => "https://images.duitku.com/hotlink-ok/NQ.PNG",
            "totalFee" => "0"
        ]
   );

   $second_arr = array(
       [
           'payment_method_id' => 1,
           'code'  => 'VC',
           'display_text' => '(Visa / Master Card / JCB)',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'BC',
           'display_text' => 'BCA Virtual Account',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/BCA.SVG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'M2',
           'display_text' => 'Mandiri Virtual Account',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/MV.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'VA',
           'display_text' => 'Maybank Virtual Account',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/VA.PNG',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'I1',
           'display_text' => 'BNI Virtual Account',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/I1.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'B1',
           'display_text' => 'CIMB Niaga Virtual Account',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/B1.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'BT',
           'display_text' => 'Permata Bank Virtual Account',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/PERMATA.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'A1',
           'display_text' => 'ATM Bersama',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/A1.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'AG',
           'display_text' => 'Bank Artha Graha',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'NC',
           'display_text' => 'Bank Neo Commerce/BNC',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'BR',
           'display_text' => 'BRIVA',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/BR.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 2,
           'code'  => 'S1',
           'display_text' => 'Bank Sahabat Sampoerna',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 3,
           'code'  => 'FT',
           'display_text' => 'Pegadaian/ALFA/Pos',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/retail.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 3,
           'code'  => 'A2',
           'display_text' => 'POS Indonesia',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 3,
           'code'  => 'IR',
           'display_text' => 'Indomaret',
           'icon_url'  => 'https://images.duitku.com/hotlink-ok/IR.PNG',
           'is_shown'  => 1
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'OV',
           'display_text' => 'OVO',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'SA',
           'display_text' => 'Shopee Pay Apps',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'LF',
           'display_text' => 'LinkAja Apps (Fixed Fee)',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'LA',
           'display_text' => 'LinkAja Apps (Percentage Fee)',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'DA',
           'display_text' => 'DANA',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'SL',
           'display_text' => 'Shopee Pay Account Link',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 4,
           'code'  => 'OL',
           'display_text' => 'OVO Account Link',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 5,
           'code'  => 'SP',
           'display_text' => 'Shopee Pay',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 5,
           'code'  => 'LQ',
           'display_text' => 'LinkAja',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 5,
           'code'  => 'NQ',
           'display_text' => 'Nobu',
           'icon_url'  => '',
           'is_shown'  => 0
       ],
       [
           'payment_method_id' => 6,
           'code'  => 'DN',
           'display_text' => 'Indodana Paylater',
           'icon_url'  => '',
           'is_shown'  => 0
       ]
   );

   return in_array($second_arr['code'], $method['paymentMethod']);
});
Route::get('/', [\App\Http\Controllers\BladePageController::class, 'home']);
Route::get('/home', [\App\Http\Controllers\BladePageController::class, 'home']);
Route::get('/projects', [\App\Http\Controllers\BladeProjectController::class, 'index']);
Route::get('/projects/{id}/donate_now', [\App\Http\Controllers\BladeProjectController::class, 'donate_now']);
Route::post('/projects/{id}/comments', [\App\Http\Controllers\BladeProjectController::class, 'store_comment']);
Route::get('/projects/{id}', [\App\Http\Controllers\BladeProjectController::class, 'show']);
