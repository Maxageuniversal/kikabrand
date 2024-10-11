<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\Product; // Ensure to import the Product model
use App\Models\Order;   // Ensure to import the Order model
use App\Models\Shipment; // Ensure to import the Shipment model

class AdminController extends Controller
{
    public function index()
    {
        // Fetch total counts
        $totalProducts = Product::count(); // Count of total products
        $totalOrders = Order::count();      // Count of total orders
        $totalShipments = Shipment::count(); // Count of total shipments

        // Pass the totals to the view
        return view('admin.dashboard', [
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'totalShipments' => $totalShipments,
        ]);
    }

    public function products()
    {
        // Logic for retrieving and displaying products
        return view('admin.products'); // Ensure this view exists
    }
}
