<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/register', [UserController::class, 'registerdisplay'])->name('register.view');

Route::post('/register', [UserController::class, 'register'])->name('register.submit');

Route::get('/login', [UserController::class, 'logindisplay'])->name('login.view');

Route::post('/login', [UserController::class, 'login'])->name('login.submit');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/payment', [PaymentController::class, 'showForm'])->name('payment.form');

    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');

    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
});

