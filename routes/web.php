<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;

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

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/', [HomeController::class, 'guestIndex'])->name('home.guest');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});


// Rute untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    // Menampilkan form kontak
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contacts.create');
    // Mengirim pesan kontak
    Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');
});




// Semua route untuk artikel, kecuali 'index', memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class)->except(['index']);
});


// Route untuk 'index' dapat diakses oleh siapa saja
Route::resource('articles', ArticleController::class)->only(['index']);
require __DIR__.'/auth.php';
