@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Order #{{ $order->id }} Details</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">Customer Information</div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ optional($order->customer)->name ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ optional($order->customer)->email ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $order->badge_class }}">{{ ucfirst($order->status) }}</span></p>
                    <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Order Items</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th class="text-end">Quantity</th>
                            <th class="text-end">Price</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($item->product)->name ?? 'Deleted Product' }}</td>
                                <td class="text-end">{{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->price, 2) }}</td>
                                <td class="text-end">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
