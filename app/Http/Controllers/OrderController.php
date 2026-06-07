<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        // Order Number
        if ($request->filled('order_number')) {

            $query->where(function ($q) use ($request) {

                $q->where('order_number', 'like', '%' . $request->order_number . '%')
                ->orWhere('razorpay_order_id', 'like', '%' . $request->order_number . '%')
                ->orWhere('razorpay_payment_id', 'like', '%' . $request->razorpay_payment_id . '%');

            });
        }
        // Payment Status
        if ($request->filled('payment_status')) {
            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        // Razorpay Payment ID
        if ($request->filled('payment_id')) {
            $query->where(
                'razorpay_payment_id',
                'like',
                '%' . $request->payment_id . '%'
            );
        }

        // Date From
        if ($request->filled('date_from')) {
            $query->whereDate(
                'created_at',
                '>=',
                $request->date_from
            );
        }

        // Date To
        if ($request->filled('date_to')) {
            $query->whereDate(
                'created_at',
                '<=',
                $request->date_to
            );
        }

        // Min Amount
        if ($request->filled('min_amount')) {
            $query->where(
                'amount',
                '>=',
                $request->min_amount
            );
        }

        // Max Amount
        if ($request->filled('max_amount')) {
            $query->where(
                'amount',
                '<=',
                $request->max_amount
            );
        }

        // Sorting

        $sort = $request->sort ?? 'latest';

        switch ($sort) {

            case 'oldest':
                $query->oldest();
                break;

            case 'amount_high':
                $query->orderBy('amount', 'DESC');
                break;

            case 'amount_low':
                $query->orderBy('amount', 'ASC');
                break;

            default:
                $query->latest();
                break;
        }

        $orders = $query
            ->get();

        $stats = [
            'total_orders' => Order::count(),

            'paid_orders' => Order::where(
                'payment_status',
                'paid'
            )->count(),

            'failed_orders' => Order::where(
                'payment_status',
                'failed'
            )->count(),

            'total_revenue' => Order::where(
                'payment_status',
                'paid'
            )->sum('amount'),
        ];

        return view(
            'orders.index',
            compact(
                'orders',
                'stats'
            )
        );
    }
}