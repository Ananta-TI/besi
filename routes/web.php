<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/halo', function () {
    return view('halo');
})->middleware(['auth', 'verified'])->name('halo');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/products', function () {
    return view('products.index');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/products', function () {
    return view('products.create');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/products', function () {
    return view('products.edit');
})->middleware(['auth', 'verified'])->name('products');


require __DIR__.'/auth.php';
