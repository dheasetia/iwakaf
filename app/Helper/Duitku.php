<?php

namespace App\Helper;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class Duitku
{
    protected $api_key;
    protected $merchant_code;

    public function __construct()
    {
        $this->api_key = config('app.duitku_api_key');
        $this->merchant_code = config('app.duitku_merchant_code');
    }

    /**
     * Get payment method
     * @return string json {paymentFee:array, responseCode:string, responseCode:string}
     */
    public function get_payment_method()
    {
        $datetime = date('Y-m-d H:i:s');
        $payment_amount = 10000;
        $signature = hash('sha256',$this->merchant_code . $payment_amount . $datetime . $this->api_key);

        $params = array(
            'merchantcode' => $this->merchant_code,
            'amount' => $payment_amount,
            'datetime' => $datetime,
            'signature' => $signature
        );

        $params_string = json_encode($params);

        $url = 'https://sandbox.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod';

        return Http::withHeaders([
            'Content-Type' => 'application/json',
            'Content-Length: ' . strlen($params_string)
        ])->post($url, $params);

    }

    public function create_invoice($order_id)
    {
        $url = env('APP_ENV') === 'local' ? 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry' : 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry';
        $bill = Order::findOrFail($order_id);

        $paymentAmount = 40000;
        $paymentMethod = 'VC'; // VC = Credit Card
        $merchantOrderId = time() . ''; // dari merchant, unik
        $productDetails = 'Tes pembayaran menggunakan Duitku';
        $email = 'test@test.com'; // email pelanggan anda
        $phoneNumber = '08123456789'; // nomor telepon pelanggan anda (opsional)
        $additionalParam = ''; // opsional
        $merchantUserInfo = ''; // opsional
        $customerVaName = 'John Doe'; // tampilan nama pada tampilan konfirmasi bank
        $callbackUrl = 'http://example.com/callback'; // url untuk callback
        $returnUrl = 'http://example.com/return'; // url untuk redirect
        $expiryPeriod = 10; // atur waktu kadaluarsa dalam hitungan menit
        $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);

        // Customer Detail
        $firstName = "John";
        $lastName = "Doe";

        // Address
        $alamat = "Jl. Kembangan Raya";
        $city = "Jakarta";
        $postalCode = "11530";
        $countryCode = "ID";
    }
}
