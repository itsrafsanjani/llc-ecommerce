<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'showHomePage'])->name('frontend.home');

// google sign in
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::group(['middleware' => 'auth'], function (){
    Route::get('/products/{slug}', [ProductController::class, 'showDetails'])->name('frontend.product.details');
    Route::get('/carts', [CartController::class, 'showCart'])->name('frontend.cart.show');
    Route::post('/carts', [CartController::class, 'addToCart'])->name('frontend.cart.add');
    Route::post('/carts/{id}', [CartController::class, 'updateCart'])->name('frontend.cart.update');
    Route::delete('/carts', [CartController::class, 'destroyCart'])->name('frontend.cart.destroy');
});
