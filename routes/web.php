<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/login');
});

Auth::routes();
// Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
// Route::get('/payment/{id}', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/checkout/{id}', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::post('/payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment');
