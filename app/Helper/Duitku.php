<?php

namespace App\Helper;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Project;
use App\Models\TransactionInquiry;
use App\Models\User;
use Carbon\Carbon;
use Duitku\Request;
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
    public function get_payment_method($payment_amount)
    {
        $datetime = date('Y-m-d H:i:s');
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
        $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry';

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

//        $params_string = json_encode($params);
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
//            'Content-Length: ' . strlen($params)
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

    public function get_project_amount_collected($project_id)
    {
        $payments = Payment::where('project_id', '=', $project_id)->get();
        if ($payments != null) {
            return $payments->sum('amount');
        }
        return 0;
    }

    public function get_project_remaining_days($project_id)
    {
        $project = Project::find($project_id);
        if ($project == null) {
            return 0;
        }
        $now = Carbon::now('Asia/Jakarta');
        $end = Carbon::createFromFormat('Y-m-d', $project->date_end->format('Y-m-d'), 'Asia/Jakarta');
        if ($now->greaterThan($end)) {
            return 0;
        }
        return $now->diffInDays($end);
    }

    public function get_project_backers($project_id)
    {
        $payments_project = Payment::where('project_id', '=', $project_id)->get();
        $backers = array();

        foreach ($payments_project as $payment) {
            $user = User::find($payment->user_id);
            $backers[] = [$user];
        }

        return $backers;

    }

    public function check_transaction_status($merchant_order_id)
    {
        $merchantCode = $this->merchant_code;
        $apiKey = $this->api_key;
        $merchantOrderId = $merchant_order_id;

        $signature = md5($merchantCode . $merchantOrderId . $apiKey);

        $params = array(
            'merchantCode' => $merchantCode,
            'merchantOrderId' => $merchantOrderId,
            'signature' => $signature
        );

        $params_string = json_encode($params);
        $url = 'https://sandbox.duitku.com/webapi/api/merchant/transactionStatus';

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



    /*
    public function pretend_payment($reference)
    {
        $transaction = TransactionInquiry::where('reference', '=', $reference)->first();

        $merchantCode = $transaction->merchant_code;
        $amount = $transaction->amount;
        $merchantOrderId = $transaction->merchant_order_id;
        $productDetail = $transaction->product_details;
        $additionalParam = $transaction->additional_param;
        $paymentMethod = $transaction->payment_method;
        $resultCode = "00";
        $merchantUserId = $transaction->merchant_user_info;
        $reference = $transaction->response_reference;
        $signature = $transaction->bd92d004ce0ed37599aff628f5bd3762;

        return response([
            'merchant'

        ]);
    }

    */
}
