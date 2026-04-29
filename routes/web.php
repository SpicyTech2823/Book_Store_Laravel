<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Add cart
Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// Show Checkout form
Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');
// Handle Checkout
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.process');




