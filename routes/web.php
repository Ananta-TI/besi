<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
=======
// Route::get('/', function () {
//     return view('halo');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/halo', function () {
//     return view('halo');
// })->middleware(['auth', 'verified'])->name('halo');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::resource('products', ProductController::class);
>>>>>>> 233b4874440df655a2803db24d5f106a6d39ca41



Route::resource('products', ProductController::class);


require __DIR__.'/auth.php';
