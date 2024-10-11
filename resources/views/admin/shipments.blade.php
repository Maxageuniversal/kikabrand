<!-- resources/views/admin/shipments.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Shipments</h1>
    <a href="{{ route('admin.shipments.create') }}" class="btn btn-primary">Add Shipment</a>
    <a href="{{ route('admin.shipments.create') }}">Create New Shipment</a>


    <table class="table mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Tracking Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->order_id }}</td>
                    <td>{{ $shipment->tracking_number }}</td>
                    <td>{{ $shipment->status }}</td>
                    <td>
                        <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('shipments.destroy', $shipment->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
