<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


// Route::get('/checkout', function () {
//     return view('checkout');
// })->name('checkout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::resource('categories.products', ProductController::class)->shallow();


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
Route::get('/refresh-cart-counter', [CartController::class, 'refreshCartCounter'])->name('cart.refresh-cart-counter');
Route::post('/edit-product-value', [CartController::class, 'editProductValue'])->name('cart.edit-product-value');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');
Route::get('/create-order', [OrderController::class, 'create'])->name('create-order');