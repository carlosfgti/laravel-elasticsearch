<?php

use App\Http\Controllers\Product2Controller;
use Illuminate\Support\Facades\Route;

Route::get('/products', [Product2Controller::class, 'index'])->name('products.index');

Route::get('/', function () {
    return view('welcome');
});
