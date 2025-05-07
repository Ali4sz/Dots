<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Show The Login Form
Route::middleware('guest')->name('register')->group(function () {

    Route::get('/register/login', [UserController::class, 'create']);
    Route::get('/register/signup', [UserController::class, 'create']);
});

// Submit Data From The Login Form
Route::post('/register/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/register/signup', [UserController::class, 'store'])->middleware('guest')->name('signup');

// Show The Profile Page
Route::get('/myprofile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::post('/myprofile', [UserController::class, 'logout'])->name('logout');

// Show The Edit Form
Route::get('/edit', [UserController::class, 'edit'])->name('edit');

// Update The User Data
Route::post('/edit', [UserController::class, 'update'])->name('update');

// Show The User The Products Page
Route::get('/products', [ProductController::class, 'index'])->name('shop');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('product');

Route::name('prod')->group(function () {
    Route::post('/products/{product}', [CartController::class, 'addToCart']);
    Route::post('/products/{product}', [CommentController::class, 'store']);
});


// Submit The User Comment
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/categories', [TagController::class, 'index'])->name('categories');

Route::get('/categories/{slug}', [TagController::class, 'show'])->name('slug');

// Route::get('/prod', function () {
//     return view('products.show');
// })->name('prod');
