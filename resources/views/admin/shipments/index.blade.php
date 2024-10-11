<!-- resources/views/admin/shipments/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Manage Shipments</h1>
    <a href="{{ route('admin.shipments.create') }}">Add New Shipment</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Tracking Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->id }}</td>
                    <td>{{ $shipment->order_id }}</td>
                    <td>{{ $shipment->tracking_number }}</td>
                    <td>{{ $shipment->status }}</td>
                    <td>
                        <a href="{{ route('admin.shipments.edit', $shipment->id) }}">Edit</a>
                        <form action="{{ route('admin.shipments.destroy', $shipment->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this shipment?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
