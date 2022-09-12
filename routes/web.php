<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\CounponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\ProductController as ClientProductController;

Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/product/{product_id}', [ClientProductController::class, 'index'])->name('client.products.index');
Route::get('/product-detail/{id}', [ClientProductController::class, 'show'])->name('client.products.show');

Route::middleware('auth')->group(function(){
    Route::post('add_to_cart',[CartController::class, 'store']) -> name('client.carts.add');
    Route::get('carts',[CartController::class, 'index']) -> name('client.carts.index');
    Route::post('update-quantity-product-in-cart/{cart_product_id}',[CartController::class, 'updateQuantityProduct']) -> name('client.carts.update_product_quantity');
    Route::post('remove-product-in-cart/{cart_product_id}', [CartController::class, 'removeProductInCart'])->name('client.carts.remove_product');

    Route::post('apply-coupon', [CartController::class, 'applyCoupon'])->name('client.carts.apply_coupon');
    
    Route::get('checkout', [CartController::class, 'checkout'])->name('client.checkout.index');
    Route::post('process-checkout', [CartController::class, 'processCheckout'])->name('client.checkout.proccess');

});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('coupons', CounponController::class);

});