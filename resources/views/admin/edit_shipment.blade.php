<!-- resources/views/admin/edit_shipment.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Edit Shipment</h1>

    <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tracking_number">Tracking Number</label>
            <input type="text" class="form-control" id="tracking_number" name="tracking_number"
                value="{{ $shipment->tracking_number }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending" {{ $shipment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="shipped" {{ $shipment->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $shipment->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
