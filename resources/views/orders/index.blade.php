@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Customer Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create New Order</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form action="{{ route('orders.index') }}" method="GET" class="input-group mb-3">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search by ID, customer, status">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
        @if(request('q'))
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Clear</a>
        @endif
    </form>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ optional($order->customer)->name ?? 'N/A' }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $order->badge_class }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
