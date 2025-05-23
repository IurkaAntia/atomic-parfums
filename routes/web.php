<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/home');
})->name('home');

Route::get('home', function () {
   return Inertia::render('Home');
})->name('home');


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
