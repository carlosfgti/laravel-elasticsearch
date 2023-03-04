<?php

use App\Http\Controllers\Product2Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products2', [Product2Controller::class, 'index'])->name('products2.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/', function () {
    return view('welcome');
});
