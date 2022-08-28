<?php

namespace App\Http\Controllers;

use App\Models\Callback;
use App\Models\Payment;
use App\Models\TransactionInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Helper\OnaizaDuitku;
use PHPUnit\Util\Exception;

class PaymentController extends Controller
{

    public function get_payment_method(Request $request)
    {
        $payment_methods = OnaizaDuitku::get_payment_method($request->amount);
        return response([
            'payment_method' => $payment_methods['paymentFee']
        ]);
    }

    public function callback(Request $request)
    {
        $apiKey = OnaizaDuitku::get_api_key();
        $merchantCode = $request->merchantCode;
        $amount = $request->amount;
        $merchantOrderId = $request->merchantOrderId;
        $productDetail = $request->productDetail;
        $additionalParam = $request->additionalParam;
        $paymentMethod = $request->paymentCode;
        $resultCode = $request->resultCode;
        $merchantUserId = $request->merchantUserId;
        $reference = $request->reference;
        $signature = $request->signature;
        $spUserHash = $request->spUserHash;

        if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
        {
            $params = $merchantCode . $merchantOrderId . $amount . $apiKey;
            $calcSignature = md5($params);

            if($signature == $calcSignature)
            {
                //Callback tervalidasi
                //Silahkan rubah status transaksi anda disini
                // file_put_contents('callback.txt', "* Success *\r\n\r\n", FILE_APPEND | LOCK_EX);

                $callback = new Callback();
                $callback->merchant_code = $merchantCode;
                $callback->amount = $amount;
                $callback->merchant_order_id = $merchantOrderId;
                $callback->product_detail = $productDetail;
                $callback->additional_param = $additionalParam;
                $callback->payment_method = $paymentMethod;
                $callback->result_code = $resultCode;
                $callback->merchant_user_id = $merchantUserId;
                $callback->reference = $reference;
                $callback->signature = $signature;
                $callback->sp_user_hash = $spUserHash;
                $callback->save();



                $transaction = TransactionInquiry::where('response_reference', '=', $reference)->first();
                $transaction->payment_status = $request->resultCode;
                $transaction->save();

                $payment = new Payment();
                $payment->user_id = $transaction->user_id;
                $payment->project_id = $transaction->project_id;
                $payment->merchant_order_id = $transaction->merchant_order_id;
                $payment->paid_at = $callback->created_at;
                $payment->amount = $callback->amount;
                $payment->maintenance_fee = $transaction->maintenance_fee;
                $payment->transaction_fee = $transaction->transaction_fee;
                $payment->payment_method = $transaction->payment_method;
                $payment->status_code = $callback->result_code;
                $payment->user_info = $callback->merchant_user_id;
                $payment->reference = $callback->reference;
                $payment->signature = $callback->signature;
                $payment->save();


                return response([
                    'message'   => 'success'
                ], 200);
            }
            else
            {
                // file_put_contents('callback.txt', "* Bad Signature *\r\n\r\n", FILE_APPEND | LOCK_EX);
                throw new Exception('Bad Signature');
    }
        }
        else {
            // file_put_contents('callback.txt', "* Bad Parameter *\r\n\r\n", FILE_APPEND | LOCK_EX);
            throw new Exception('Bad Parameter');
        }

    }

    public function get_payment_fee(Request $request)
    {
        $payments = OnaizaDuitku::get_payment_method($request->get('amount'));
        $fee = 0;
        foreach ($payments['paymentFee'] as $payment) {
            if ($payment['paymentMethod'] === $request->get('method')) {
                $fee = $payment['totalFee'];
            }
        }
        return $fee;
    }
}
