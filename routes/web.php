<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\AdminAuthController;

// Consolidate the checkout routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');
Route::get('/track-order', [CheckoutController::class, 'trackOrder'])->name('track.order');

// Admin routes with name prefix
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('shipments', ShipmentController::class);
    Route::resource('orders', OrderController::class)->only(['index']);

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
});

// Route for the root (index) page
Route::get('/', function () {
    return view('index');
});

// Additional routes
Route::get('/home', function () {
    return view('index');
})->name('home');

// Recommendations route
Route::get('/recommendations', [RecommendationController::class, 'getRecommendations']);

// Authentication routes
Route::post('/admin/login', [AdminAuthController::class, 'login']);
