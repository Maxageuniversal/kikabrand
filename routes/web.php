<?php
use Illuminate\Support\Facades\Route;

// Route for the root (index) page
Route::get('/', function () {
    return view('index');
});

// Authentication routes
// ... (define your custom authentication routes if needed)

// Route for the home page (same content as index)
Route::get('/home', function () {
    return view('index');
})->name('home');

// Routes for checkout and order tracking
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/place-order', 'CheckoutController@placeOrder')->name('place.order');
Route::get('/track-order', 'CheckoutController@trackOrder')->name('track.order');
