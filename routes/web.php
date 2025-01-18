<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;

// Route untuk halaman depan
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

Route::middleware('guest')->group(function () {
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contacts.store');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('articles', ArticleController::class)->except(['index']);
});
Route::resource('articles', ArticleController::class)->only(['index']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
// Route::resource('abouts', AboutController::class);


Route::middleware('guest')->get('/abouts', [AboutUsController::class, 'index'])->name('abouts.index');
// Route::get('/home', [AboutUsController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::resource('/abouts', AboutUsController::class);

require __DIR__.'/auth.php';
