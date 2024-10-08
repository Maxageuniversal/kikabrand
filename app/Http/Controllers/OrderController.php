<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function placeOrder(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'shipping_address' => 'required|string',
        ]);

        // Create a new order
        $order = Order::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'shipping_address' => $request->input('shipping_address'),
            // Add other order details as needed
        ]);

        // Generate a tracking number
        $trackingNumber = $order->id; // You can use a more complex algorithm if desired

        // Send order confirmation email with tracking number
        // ... (Use Laravel's Mail facade or a dedicated email library)

        return redirect()->route('track.order', ['tracking_number' => $trackingNumber])->with('success', 'Order placed successfully!');
    }

    public function trackOrder(Request $request)
    {
        $trackingNumber = $request->input('tracking_number');

        $order = Order::where('id', $trackingNumber)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        return view('track-order', compact('order'));
    }
}
