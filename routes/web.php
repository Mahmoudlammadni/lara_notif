<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);
//Route::get('/dashboard', fn() => 'Welcome to dashboard')->middleware('auth');

use App\Models\Product;
Route::get('/products', function () {
    $products = Product::all();
    return view('products', compact('products'));
});

Route::post('/buy', [ProductController::class, 'buy'])->middleware('auth');



