<?php

namespace App\Helper;

use App\Models\Order;
use App\Models\TransactionInquiry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class Duitku
{
    private $api_key;
    private $merchant_code;
    private $callback_url;
    private $return_url;
    private $expiry_period;


    public function __construct()
    {
        $this->api_key = config('app.duitku_api_key');
        $this->merchant_code = config('app.duitku_merchant_code');
        $this->callback_url = config('app.url') . 'callback';
        $this->return_url = config('app.url') . 'return';
        $this->expiry_period = 60 * 24;

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

    public function create_inquiry(
        int $paymentAmount,
        string $paymentMethod,
        string $merchantOrderId,
        string $productDetails,
        string $email,
        string $phoneNumber,
        string $additionalParam,
        string $merchantUserInfo,
        string $customerVaName,
        array $customerDetail,
        array $itemDetails,
        string $accountLink = null,
    )
    {
        $url = env('APP_ENV') === 'local' ? 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry' : 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry';

        $params = array(
            'merchantCode' => $this->merchant_code,
            'paymentAmount' => $paymentAmount,
            'paymentMethod' => $paymentMethod,
            'merchantOrderId' => $merchantOrderId,
            'productDetails' => $productDetails,
            'additionalParam' => $additionalParam,
            'merchantUserInfo' => $merchantUserInfo,
            'customerVaName' => $customerVaName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'accountLink' => $accountLink,
            'itemDetails' => $itemDetails,
            'customerDetail' => $customerDetail,
            'callbackUrl' => $this->callback_url,
            'returnUrl' => $this->return_url,
            'signature' => md5($this->merchant_code . $merchantOrderId . $paymentAmount . $this->api_key),
            'expiryPeriod' => $this->expiry_period
        );
        $params_string = json_encode($params);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Content-Length: ' . strlen($params_string)
        ])->post($url, $params);

        if ($response->successful()) {
            $result = json_decode($response, true);
        } else {
            $result = json_decode($response);
            return "Server Error: " . $result->Message;
        }
        return $result;
    }

    public function generate_order_id($project_id)
    {
        //project_id dalam 3 digit + tahun dalam dua digit (2022 = 01, 2023 = 02) + bulan dalam dua digit (Januari = 01) +tanggal dalam dua digit jam dalam dua digit + menit dalam dua digit + detik dalam dua digit;
        // contoh: 01010829204021
        $now = Carbon::now('Asia/Jakarta');
        $project_id_code = str_pad($project_id,3,"8",STR_PAD_LEFT);
        $year_code = $now->format('y');
        $month_code = $now->format('m');
        $day_code = $now->format('d');
        $hour_code = $now->format('h');
        $minute_code = $now->format('i');
        $second_code = $now->format('s');

        $order_id = $project_id_code.$second_code.$minute_code.$hour_code.$day_code.$month_code.$year_code;
        if ($this->check_order_id($order_id)) {
            $this->generate_order_id($project_id);
        }
        return $order_id;

    }

    private function check_order_id($order_id)
    {
        $check_payment = TransactionInquiry::where('merchant_order_id', '=', $order_id)->first();
        return $check_payment != null;
    }

    public function get_merchant_code()
    {
        return $this->merchant_code;
    }

    public function get_return_url()
    {
        return $this->return_url;
    }

    public function get_callback_url()
    {
        return $this->callback_url;
    }

    public function get_api_key()
    {
        return $this->api_key;
    }

    public function get_expiry_period()
    {
        return $this->expiry_period;
    }

}
