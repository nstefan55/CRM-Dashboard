<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ActivityController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);

Route::resource('customers', CustomerController::class);

Route::resource('activities', ActivityController::class);
