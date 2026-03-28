<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBookController;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/books', [AdminBookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [AdminBookController::class, 'create'])->name('admin.books.create');
    Route::post('/books', [AdminBookController::class, 'store'])->name('admin.books.store');
    Route::get('/books/{id}/edit', [AdminBookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/books/{id}', [AdminBookController::class, 'update'])->name('admin.books.update');
    Route::delete('/books/{id}', [AdminBookController::class, 'destroy'])->name('admin.books.destroy');
});
require __DIR__ . '/auth.php';

Route::get('/test-upload', function () {
    return ini_get('upload_max_filesize');
});