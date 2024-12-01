<?php

use App\Http\Controllers\{ProfileController, CategoryController,
    AdminController, ProductController, BasketController, OrderController};
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/admin', [AdminController::class, 'index'])->middleware(IsAdmin::class)->name('admin.index');

Route::get('/dashboard', function () {
    return view('dashboard', [
        'orders' => Order::with('product.category')->where('user_id', Auth::id())->get()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CategoryController::class)->group(function () {
    Route::post('/category', 'upload')->name('category.upload');
});
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/product/{id}', 'show')->name('product.show');
    Route::post('/product', 'upload')->name('product.upload');
});

Route::post('/search', [ProductController::class, 'search'])->name('product.search');

Route::controller(BasketController::class)->group(function () {
    Route::get('/basket', 'index')->name('basket.index');
    Route::post('/basket/add', 'addToBasket')->name('basket.add');
    Route::post('/basket/update', 'updateQuantity')->name('basket.update');
    Route::delete('/basket/remove/{productId}', 'removeFromBasket')->name('basket.remove');
});

Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
