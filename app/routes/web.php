<?php

use App\Http\Controllers\{ProfileController, CategoryController, AdminController};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', [AdminController::class, 'index'])->middleware(IsAdmin::class)->name('admin.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CategoryController::class)->group(function () {
    Route::post('/category', 'upload')->name('category.upload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
