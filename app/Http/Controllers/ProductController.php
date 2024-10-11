<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    // Get all products
    public function index() {
        return response()->json(Product::all());
    }

    // Create a product
    public function store(Request $request) {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Get a single product by ID
    public function show($id) {
        return response()->json(Product::findOrFail($id));
    }

    // Update a product
    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product, 200);
    }

    // Delete a product
    public function destroy($id) {
        Product::destroy($id);
        return response()->json(null, 204);
    }
}
