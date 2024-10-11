{{-- resources/views/admin/shipments/edit.blade.php --}}

@extends('layouts.admin') {{-- Extend your main layout --}}

@section('content')
    <div class="container">
        <h1>Edit Shipment</h1>

        {{-- Display success or error messages --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.shipments.update', $shipment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="order_id" class="form-label">Order ID</label>
                <select name="order_id" id="order_id" class="form-select" required>
                    <option value="">Select an order</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->id }}" {{ $shipment->order_id == $order->id ? 'selected' : '' }}>
                            {{ $order->id }} - {{ $order->customer_name }} {{-- Adjust to show relevant order info --}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tracking_number" class="form-label">Tracking Number</label>
                <input type="text" name="tracking_number" id="tracking_number" class="form-control"
                    value="{{ old('tracking_number', $shipment->tracking_number) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="pending" {{ $shipment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="shipped" {{ $shipment->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="delivered" {{ $shipment->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="canceled" {{ $shipment->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Shipment</button>
            <a href="{{ route('admin.shipments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
