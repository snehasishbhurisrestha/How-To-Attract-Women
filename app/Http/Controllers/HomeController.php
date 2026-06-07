<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Order;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function createOrder()
    {
        $amount = 199;

        $orderNumber = 'ORD-' . now()->format('YmdHis') . '-' . rand(1000,9999);

        // Step 1: Create local order
        $localOrder = Order::create([
            'order_number' => $orderNumber,
            'amount' => $amount,
            'payment_status' => 'pending'
        ]);

        // Step 2: Create Razorpay order
        $api = new Api(
            env('RAZORPAY_KEY'),
            env('RAZORPAY_SECRET')
        );

        $razorpayOrder = $api->order->create([
            'receipt'  => $orderNumber,
            'amount'   => $amount * 100,
            'currency' => 'INR'
        ]);

        // Step 3: Save Razorpay order ID
        $localOrder->update([
            'razorpay_order_id' => $razorpayOrder['id']
        ]);

        return response()->json([
            'success' => true,
            'order_id' => $razorpayOrder['id'],
            'amount' => $amount * 100,
            'order_number' => $orderNumber
        ]);
    }

    public function paymentSuccess(Request $request)
    {
        $order = Order::where(
            'razorpay_order_id',
            $request->razorpay_order_id
        )->first();

        if (!$order) {
            return response()->json([
                'success' => false
            ]);
        }

        $order->update([
            'razorpay_payment_id' => $request->razorpay_payment_id,
            'razorpay_signature' => $request->razorpay_signature,
            'payment_status' => 'paid'
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function download(Request $request)
    {
        $order = Order::where(
            'razorpay_order_id',
            $request->order_id
        )->where(
            'payment_status',
            'paid'
        )->first();

        if (!$order) {
            abort(403, 'Payment Required');
        }

        return view('pages.download');
    }
}
