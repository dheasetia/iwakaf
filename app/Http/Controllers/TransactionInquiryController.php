<?php

namespace App\Http\Controllers;

use App\Helper\OnaizaDuitku;
use App\Http\Requests\TransactionInquiryPostRequest;
use App\Models\Address;
use App\Models\CustomerDetail;
use App\Models\Item;
use App\Models\ItemDetail;
use App\Models\Order;
use App\Models\Project;
use App\Models\TransactionInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionInquiryController extends Controller
{
    public function create_inquiry(TransactionInquiryPostRequest $request)
    {
        /*
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
         */
        $project = Project::find($request->project_id);
        $merchantOrderId = OnaizaDuitku::generate_order_id($project->id);
        if ($project == null) {
            return response([
                'message'   => 'Project wakaf tidak ditemukan'
            ], 404);
        }

        $user = Auth::user();
        $bio = $user->bio;

        $paymentAmount = $request->payment_amount;
        $paymentMethod = $request->payment_method;
        $productDetails = $project->title;
        $email = $user->email;
        $phoneNumber = $bio->phone_number;
        $additionalParam = "";
        $merchantUserInfo = $user->full_name . " <" . $user->email . ">";
        $customerVaName = $user->full_name;

        $address = array(
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'address' => $bio->address,
            'city' => $bio->city,
            'postalCode' => $bio->zip_code,
            'phone' => $bio->phone_number,
            'countryCode' => "ID"
        );

        $customerDetail = array(
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' => $user->email,
            'phoneNumber' => $bio->phoneNumber,
            'billingAddress' => $address,
            'shippingAddress' => $address
        );

        $item = array(
            'name' => $project->title,
            'price' => $request->payment_amount,
            'quantity' => 1
        );


        $itemDetails = array(
            $item
        );



        // =====



        //====

        try {
            $response = OnaizaDuitku::create_inquiry(
                $paymentAmount,
                $paymentMethod,
                $merchantOrderId,
                $productDetails,
                $email,
                $phoneNumber,
                $additionalParam,
                $merchantUserInfo,
                $customerVaName,
                $customerDetail,
                $itemDetails,
                null,
            );
            if($response['statusCode'] == "00" && $response['statusMessage'] === "SUCCESS") {
                $item = Item::create($item);
                $address = Address::create([
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'address' => $bio->address,
                    'city' => $bio->city,
                    'zip_code' => $bio->zip_code,
                    'phone' => $bio->phone_number,
                    'country_code' => "ID"
                ]);
                $customer_detail = CustomerDetail::create([
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone_number' => $bio->phone_number,
                    'billing_address_id' => $address->id,
                    'shipping_address_id' => $address->id
                ]);

                $transaction_inquiry = new TransactionInquiry();
                $transaction_inquiry->project_id = $project->id;
                $transaction_inquiry->user_id = Auth::user()->id;
                $transaction_inquiry->merchant_code = OnaizaDuitku::get_merchant_code();
                $transaction_inquiry->payment_amount = $paymentAmount;
                $transaction_inquiry->merchant_order_id = $merchantOrderId;
                $transaction_inquiry->product_details = $productDetails;
                $transaction_inquiry->email = $email;
                $transaction_inquiry->payment_method = $paymentMethod;
                $transaction_inquiry->merchant_user_info = $merchantUserInfo;
                $transaction_inquiry->customer_va_name = $customerVaName;
                $transaction_inquiry->phone_number = $phoneNumber;
                $transaction_inquiry->item_id = $item->id;
                $transaction_inquiry->customer_detail_id = $customer_detail->id;
                $transaction_inquiry->return_url = OnaizaDuitku::get_return_url();
                $transaction_inquiry->callback_url = OnaizaDuitku::get_callback_url();
                $transaction_inquiry->signature = md5(OnaizaDuitku::get_merchant_code() . $merchantOrderId . $paymentAmount . OnaizaDuitku::get_api_key());
                $transaction_inquiry->expiry_period = OnaizaDuitku::get_expiry_period();
                $transaction_inquiry->save();
            } else {
                return response([
                    'status'    => 'failed',
                    'message'   => 'Cannot make transaction'
                ], 500);
            }
        } catch (Exception $e) {
            return response([
                'status'    => 'failed',
                'message'   => $e.getMessage()
            ]);
        }

        return response($response);
    }


}
