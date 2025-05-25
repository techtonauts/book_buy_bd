<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProducImageController;

// Frontend Routes
// Auth Routes
// Get routes for login and register
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
// Post routes for login and register
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Other Frontend Routes
Route::get('/', function () {
    return view('home.index');
})->name('show.home');

Route::get('/product', function () {
    return view('product.detail');
})->name('show.product.detail');


// Admin Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.show.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('show.index');

    // Category Routes
    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/main', 'showMainCategories')->name('show.main.categories');
        Route::get('/sub', 'showSubCategories')->name('show.sub.categories');
        Route::get('/create', 'showCreate')->name('show.create.category');
        Route::post('/create', 'store')->name('store.category');
        Route::post('/update/{id}', 'update')->name('update.category');
    });
});
