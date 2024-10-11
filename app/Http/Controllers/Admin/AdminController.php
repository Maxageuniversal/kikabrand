<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;  // Make sure to import the correct models
use App\Models\Order;
use App\Models\Shipment;

class AdminController extends Controller
{
    // Dashboard displaying counts for products, orders, and shipments
    public function index()
    {
        // Fetching the count of products, orders, and shipments
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $shipmentsCount = Shipment::count();

        // Passing the counts to the view
        return view('admin.dashboard', compact('productsCount', 'ordersCount', 'shipmentsCount'));
    }

    // Displaying the products page
    public function products()
    {
        // You can add logic here to fetch products if needed
        return view('admin.products'); // Ensure the view exists
    }

    // Displaying the orders page
    public function orders()
    {
        // You can add logic here to fetch orders if needed
        return view('admin.orders'); // Ensure the view exists
    }

    // Displaying the shipments page
    public function shipments()
    {
        // You can add logic here to fetch shipments if needed
        return view('admin.shipments'); // Ensure the view exists
    }
}
