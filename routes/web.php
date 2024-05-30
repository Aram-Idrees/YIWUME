<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Add the AuthController import
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;

// Routes for Guests (public access)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

// Signup routes
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);

// Login routes
Route::post('/', [AuthController::class, 'login']);

// Routes for Users (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UsersController::class, 'profile']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store']);
});

// Routes for Admins (require admin role)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/categories', CategoryController::class);
});
