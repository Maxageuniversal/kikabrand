<!-- resources/views/admin/shipments/create.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Create New Shipment</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.shipments.store') }}" method="POST">
        @csrf
        <div>
            <label for="order_id">Order:</label>
            <select name="order_id" id="order_id" required>
                <option value="">Select Order</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tracking_number">Tracking Number:</label>
            <input type="text" name="tracking_number" id="tracking_number" value="{{ old('tracking_number') }}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{ old('status') }}" required>
        </div>
        <button type="submit">Create Shipment</button>
    </form>
@endsection
