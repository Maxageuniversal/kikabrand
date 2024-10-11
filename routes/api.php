<?php

use Illuminate\Support\Facades\Route;  // Import the Route facade
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ShipmentController; // Update the namespace here

// Define the API routes for shipments
Route::get('shipments/{tracking_number}', [ShipmentController::class, 'trackShipment']);
Route::put('shipments/{tracking_number}', [ShipmentController::class, 'updateShipment']);

// Define the API routes for products
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::post('products', [ProductController::class, 'store']);
Route::put('products/{id}', [ProductController::class, 'update']);
Route::delete('products/{id}', [ProductController::class, 'destroy']); // Ensure 'destroy' is correct
