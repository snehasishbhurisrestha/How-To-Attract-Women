@extends('layouts.app')

@section('title','Orders Management')

@section('content')

<div class="container-fluid">


<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Orders Management
        </h4>

    </div>

    <div class="card-body">

        <!-- Filters -->

        <form method="GET"
              action="{{ route('admin.orders.index') }}"
              class="row g-3 mb-4">

            <div class="col-md-3">
                <label class="form-label">
                    Order Number
                </label>

                <input type="text"
                       name="order_number"
                       value="{{ request('order_number') }}"
                       class="form-control">
            </div>

            <div class="col-md-2">
                <label class="form-label">
                    Status
                </label>

                <select name="payment_status"
                        class="form-select">

                    <option value="">
                        All
                    </option>

                    <option value="paid"
                        {{ request('payment_status')=='paid' ? 'selected' : '' }}>
                        Paid
                    </option>

                    <option value="pending"
                        {{ request('payment_status')=='pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="failed"
                        {{ request('payment_status')=='failed' ? 'selected' : '' }}>
                        Failed
                    </option>

                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">
                    Date From
                </label>

                <input type="date"
                       name="date_from"
                       value="{{ request('date_from') }}"
                       class="form-control">
            </div>

            <div class="col-md-2">
                <label class="form-label">
                    Date To
                </label>

                <input type="date"
                       name="date_to"
                       value="{{ request('date_to') }}"
                       class="form-control">
            </div>

            <div class="col-md-3">

                <label class="form-label">
                    Search
                </label>

                <div class="d-flex gap-2">

                    <button class="btn btn-primary">
                        Filter
                    </button>

                    <a href="{{ route('admin.orders.index') }}"
                       class="btn btn-secondary">
                        Reset
                    </a>

                </div>

            </div>

        </form>

        <!-- Orders Table -->

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Order Number</th>

                    <th>Razorpay Order ID</th>

                    <th>Amount</th>

                    <th>Status</th>

                    <th>Payment ID</th>

                    <th>Created At</th>

                </tr>

                </thead>

                <tbody>

                @forelse($orders as $key => $order)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $order->order_number }}
                        </td>

                        <td>
                            {{ $order->razorpay_order_id }}
                        </td>

                        <td>
                            ₹{{ number_format($order->amount,2) }}
                        </td>

                        <td>

                            @if($order->payment_status=='paid')

                                <span class="badge bg-success">
                                    Paid
                                </span>

                            @elseif($order->payment_status=='pending')

                                <span class="badge bg-warning">
                                    Pending
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Failed
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $order->razorpay_payment_id ?? '-' }}
                        </td>

                        <td>
                            {{ $order->created_at->format('d M Y h:i A') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            No Orders Found

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</div>

@endsection
