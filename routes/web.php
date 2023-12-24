<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/artstore',[UserController::class,'index'])->name('home');
Route::get('/artstore/login',[UserController::class,'viewLogin'])->name('login');
Route::post('/artstore/login-verification',[UserController::class,'verifyLogin'])->name('verify');

Route::get('/artstore/signup',[UserController::class,'viewSignup'])->name('signup');
Route::get('/artstore/upload',[UserController::class,'viewUpload'])->name('upload');
Route::get('/artstore/arts/order',[UserController::class,'viewOrderForm'])->name('orderform');
Route::get('/artstore/product',[UserController::class,'viewProduct'])->name('product');
Route::get('/artstore/user/orders',[UserController::class,'viewCustOrders'])->name('orders');
Route::get('/artstore/artist/orders',[UserController::class,'viewArtistOrders'])->name('artist.orders');
Route::get('/artstore/user/cart',[OrderController::class,'viewCart'])->name('cart');