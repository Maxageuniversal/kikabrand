<?php
// app/Http/Controllers/Admin/ShipmentController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\Order;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::with('order')->get(); // Eager load orders
        return view('admin.shipments.index', compact('shipments'));
    }

    public function create()
    {
        $orders = Order::all(); // Fetch all orders for shipment creation
        return view('admin.shipments.create', compact('orders')); // Create a view for adding a shipment
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'tracking_number' => 'required|string|unique:shipments',
            'status' => 'required|string',
        ], [
            'order_id.required' => 'Please select an order.',
            'tracking_number.required' => 'Tracking number is required.',
            'tracking_number.unique' => 'This tracking number has already been used.',
            'status.required' => 'Status is required.',
        ]);

        Shipment::create($request->all());
        return redirect()->route('admin.shipments.index')->with('success', 'Shipment created successfully.');
    }

    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        $orders = Order::all(); // Retrieve all orders from the database

        return view('admin.shipments.edit', compact('shipment', 'orders'));
    }

    public function update(Request $request, Shipment $shipment)
    {
        $request->validate([
            'tracking_number' => 'required|string|unique:shipments,tracking_number,' . $shipment->id,
            'status' => 'required|string',
        ], [
            'tracking_number.required' => 'Tracking number is required.',
            'tracking_number.unique' => 'This tracking number has already been used.',
            'status.required' => 'Status is required.',
        ]);

        $shipment->update($request->all());
        return redirect()->route('admin.shipments.index')->with('success', 'Shipment updated successfully.');
    }

    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect()->route('admin.shipments.index')->with('success', 'Shipment deleted successfully.');
    }

    // Additional API methods if needed
    public function trackShipment($tracking_number)
    {
        // API method to track shipment
    }

    public function updateShipment(Request $request, $tracking_number)
    {
        // API method to update shipment
    }
}
