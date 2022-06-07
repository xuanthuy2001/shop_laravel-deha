<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/1', function () {
    return view('admin.dashboard.index');
});
Route::get('/2', function () {
    return view('client.    ');
});
Auth::routes();