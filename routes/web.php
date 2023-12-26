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
Route::get('/artstore/signup',[UserController::class,'viewSignup'])->name('signup');
Route::post('/artstore/register',[UserController::class,'store'])->name('register');
Route::get('/artstore/upload',[UserController::class,'viewUpload'])->name('upload');
Route::get('/artstore/arts/order',[UserController::class,'viewOrderForm'])->name('orderform');
Route::get('/artstore/product/{id}',[UserController::class,'viewProduct'])->name('product');
Route::get('/artstore/user/orders',[UserController::class,'viewCustOrders'])->name('orders');
Route::get('/artstore/artist/orders',[UserController::class,'viewArtistOrders'])->name('artist.orders');
Route::get('/artstore/user/cart',[OrderController::class,'viewCart'])->name('cart');

Route::post('/artstore/verify-login',[UserController::class,'verifyLogin'])->name('verify');
Route::get('/artstore/user/logout',[UserController::class,'logout'])->name('logout');

Route::post('/artstore/check-upload',[UserController::class,'verifyUpload'])->name('check');
// Route::post('/artstore/upload',[UserController::class,'uploadArt'])->name('upload');

Route::get('artstore/image',[UserController::class,'viewImage'])->name('images.view');
Route::post('artstore/cart/add/{id}',[OrderController::class,'addToCart'])->name('add');
Route::post('artstore/cart/remove',[OrderController::class,'removeFromCart'])->name('remove');
Route::post('artstore/cart/next',[OrderController::class,'nextCart'])->name('next');
Route::post('artstore/place-order',[OrderController::class,'placeOrder'])->name('order');

Route::get('artstore/editprofile',[UserController::class,'editProfile'])->name('edit');
Route::get('artstore/users/all',[UserController::class,'viewAllUsers'])->name('allusers');
Route::get('artstore/orders/all',[OrderController::class,'viewAllOrders'])->name('allorders');

Route::get('/artstore/admin',[UserController::class,'adminLogin'])->name('admin');
Route::post('artstore/orders/update',[OrderController::class,'updateOrder'])->name('updateorder');
Route::get('/artstore/admin/stats',[UserController::class,'adminStats'])->name('stats');
