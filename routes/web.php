<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware('guest')->get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/home', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::resource('/products', ProductController::class);

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/', [HomeController::class, 'guestIndex'])->name('home.guest');
Route::get('/', [HomeController::class, 'index'])->name('home');


require __DIR__.'/auth.php';
