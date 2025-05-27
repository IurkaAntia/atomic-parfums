<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductsController;

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');


Route::middleware('auth')->group(function () {

    Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
    Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.add');
    Route::get('/layout', [\App\Http\Controllers\HomeController::class, 'app_layout'])->name('layout');
    Route::delete('/cart/{cart}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.remove');
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.remove');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
