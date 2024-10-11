<!-- resources/views/admin/create_shipment.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Add Shipment</h1>

    <form action="{{ route('shipments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_id">Order ID</label>
            <select class="form-control" id="order_id" name="order_id" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tracking_number">Tracking Number</label>
            <input type="text" class="form-control" id="tracking_number" name="tracking_number" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending">Pending</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
