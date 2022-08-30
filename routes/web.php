<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CounponController;
use App\Http\Controllers\Client\ProductController as ClientProductController;

Route::get('/', [HomeController::class, 'index'])->name('client.home');

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');
Auth::routes();


Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('coupons', CounponController::class);
Route::get('/product/{product_id}', [ClientProductController::class, 'index'])->name('client.products.index');
Route::get('/product-detail/{id}', [ClientProductController::class, 'show'])->name('client.products.show');