<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Http\Controllers\HomeController; // Ensure the HomeController is imported

// Route for the root (index) page
Route::get('/', function () {
    return view('index'); // Ensure this view file exists in resources/views
});

// Authentication routes
Auth::routes();

// Route for the home page (same content as index)
Route::get('/home', function () {
    return view('index'); // Same view as the root
})->name('home');
