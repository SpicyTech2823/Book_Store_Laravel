<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');


Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
    Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.process');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Books
    Route::get('/books', [AdminController::class, 'books'])->name('books');
    Route::get('/books/create', [AdminController::class, 'createBook'])->name('books.create');
    Route::post('/books', [AdminController::class, 'storeBook'])->name('books.store');
    Route::get('/books/{book}/edit', [AdminController::class, 'editBook'])->name('books.edit');
    Route::put('/books/{book}', [AdminController::class, 'updateBook'])->name('books.update');
    Route::delete('/books/{book}', [AdminController::class, 'deleteBook'])->name('books.delete');

    // Categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
    Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('categories.edit');
    Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminController::class, 'deleteCategory'])->name('categories.delete');

    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');

    // Team Members
    Route::get('/team-members', [AdminController::class, 'teamMembers'])->name('team-members');
    Route::get('/team-members/create', [AdminController::class, 'createTeamMember'])->name('team-members.create');
    Route::post('/team-members', [AdminController::class, 'storeTeamMember'])->name('team-members.store');
    Route::get('/team-members/{member}/edit', [AdminController::class, 'editTeamMember'])->name('team-members.edit');
    Route::put('/team-members/{member}', [AdminController::class, 'updateTeamMember'])->name('team-members.update');
    Route::delete('/team-members/{member}', [AdminController::class, 'deleteTeamMember'])->name('team-members.delete');

    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
    Route::get('/testimonials/create', [AdminController::class, 'createTestimonial'])->name('testimonials.create');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [AdminController::class, 'editTestimonial'])->name('testimonials.edit');
    Route::put('/testimonials/{testimonial}', [AdminController::class, 'updateTestimonial'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [AdminController::class, 'deleteTestimonial'])->name('testimonials.delete');

    // FAQs
    Route::get('/faqs', [AdminController::class, 'faqs'])->name('faqs');
    Route::get('/faqs/create', [AdminController::class, 'createFAQ'])->name('faqs.create');
    Route::post('/faqs', [AdminController::class, 'storeFAQ'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit', [AdminController::class, 'editFAQ'])->name('faqs.edit');
    Route::put('/faqs/{faq}', [AdminController::class, 'updateFAQ'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [AdminController::class, 'deleteFAQ'])->name('faqs.delete');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/orders/{order}', [AdminController::class, 'showOrder'])->name('orders.show');
    Route::get('/orders/{order}/edit', [AdminController::class, 'editOrder'])->name('orders.edit');
    Route::put('/orders/{order}', [AdminController::class, 'updateOrder'])->name('orders.update');
    Route::delete('/orders/{order}', [AdminController::class, 'deleteOrder'])->name('orders.delete');

    // Timeline Events
    Route::get('/timeline-events', [AdminController::class, 'timelineEvents'])->name('timeline-events');
    Route::get('/timeline-events/create', [AdminController::class, 'createTimelineEvent'])->name('timeline-events.create');
    Route::post('/timeline-events', [AdminController::class, 'storeTimelineEvent'])->name('timeline-events.store');
    Route::get('/timeline-events/{event}/edit', [AdminController::class, 'editTimelineEvent'])->name('timeline-events.edit');
    Route::put('/timeline-events/{event}', [AdminController::class, 'updateTimelineEvent'])->name('timeline-events.update');
    Route::delete('/timeline-events/{event}', [AdminController::class, 'deleteTimelineEvent'])->name('timeline-events.delete');
});




