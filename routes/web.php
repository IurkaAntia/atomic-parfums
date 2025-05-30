<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductsController;

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.remove');


Route::middleware('auth')->group(function () {

    Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.add');
    Route::delete('/cart/{cart}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.remove');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
