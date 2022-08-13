<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillPostRequest;
use App\Http\Requests\OrderPostRequest;
use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(OrderPostRequest $request)
    {
        //SL + 000 + project_id + 0 + category_id
        //contoh apabila id = 123 dan category_id = 9 => SL012309;

        $project = Project::findOrFail($request->project_id);
        $user = User::findOrFail($request->user_id);

        $order = new Order();

        $order->project_id = $request->project_id;
        $order->user_id = $request->user_id;
        $order->order_time = date('Y-m-d h:i:s');
        $order->email =  $user->email;
        $order->number = $this->make_order_number($request->project_id, $request->category_id);
        $order->payment_amount = $request->payment_amount;
        $order->maintenance_fee = $request->maintenance_fee;
        $order->payment_fee = $request->payment_fee;
        $order->behalf = $request->behalf;
        $order->merchant_user_info = $user->full_name;
        $order->merchant_user_name =$user->full_name;

    }


    private function make_order_number($project_id, $category_id)
    {
        return 'SL' . str_pad($category_id, 2, "0", STR_PAD_LEFT) . str_pad($project_id, 4, "0", STR_PAD_LEFT);
    }
}
