<?php

use App\Http\Controllers\{ProfileController, CategoryController};
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', function () {
    return view('admin');
})->name('admin.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->middleware(IsAdmin::class)->name('dashboard');

Route::controller(CategoryController::class)->group(function () {
    Route::post('/category', 'upload')->name('category.upload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
