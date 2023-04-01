<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $joke = app('joke');
    return view('welcome', ['joke' => $joke]);
});

Route::get('/get-mysql-products', function () {
    $products = DB::table("products")->get();
      
    dd($products);
});

Route::get('/user',function(){
    return 'this is user page';
});

Route::get('/joke', function () {
    $joke = app('joke');
    return $joke;
});

Route::match(['get','post'],'/login', [AuthController::class, 'login'])->name('login');
Route::match(['get','post'],'/register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::resource('/products', ProductController::class);
});