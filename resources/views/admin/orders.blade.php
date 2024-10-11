<!-- resources/views/admin/orders.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@foreach ($orders as $order)
    <div>
        <p>Order #{{ $order->id }} - {{ $order->status }}</p>
        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    </div>

    <form action="{{ route('orders.updateShipment', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="tracking_number">Tracking Number:</label>
            <input type="text" name="tracking_number" value="{{ $order->tracking_number }}">
        </div>
        <div>
            <label for="carrier">Carrier:</label>
            <input type="text" name="carrier" value="{{ $order->carrier }}">
        </div>
        <button type="submit">Update Shipment</button>
    </form>
@endforeach
