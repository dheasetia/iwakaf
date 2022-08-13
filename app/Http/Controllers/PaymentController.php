<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helper\OnaizaDuitku;

class PaymentController extends Controller
{
    public function get_payment_method()
    {
        $payment_methods = OnaizaDuitku::get_payment_method(100000);
        return response([
            'payment_method' => $payment_methods['paymentFee']
        ]);
    }
}
