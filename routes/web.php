<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/home', fn() => view('home'))->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Halaman daftar customer
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// Halaman form create customer
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// Proses penyimpanan customer baru
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Halaman form edit customer
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// Proses update customer
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

// Proses delete customer
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');



require __DIR__.'/auth.php';
