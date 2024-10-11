<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::find($id);
        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }

    public function updateShipment(Request $request, $id)
{
    $request->validate([
        'tracking_number' => 'required|string|max:255',
        'carrier' => 'required|string|max:255',
    ]);

    $order = Order::find($id);
    $order->update([
        'tracking_number' => $request->tracking_number,
        'carrier' => $request->carrier,
    ]);

    return redirect()->route('orders.index')->with('success', 'Shipment information updated successfully.');
}
public function track(Request $request)
{
    $request->validate([
        'tracking_number' => 'required|string|max:255',
    ]);

    $order = Order::where('tracking_number', $request->tracking_number)->first();

    if (!$order) {
        return redirect()->back()->withErrors(['tracking_number' => 'Tracking number not found.']);
    }

    return redirect()->route('orders.track')->with('order', $order);
}

}
