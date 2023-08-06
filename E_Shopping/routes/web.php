<?php

use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Middleware\CheckMemberLogin;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [HomeController::class, 'index']);

Route::prefix('shop')->group(function () {
    Route::get('', [ShopController::class, 'index']);

    Route::get('product/{id}', [ShopController::class, 'show']);

    Route::post('product/{id}', [ShopController::class, 'postComment']);

    Route::get('category/{category_name}', [ShopController::class, 'category']);
});

Route::prefix('cart')->group(function () {
    Route::get('', [CartController::class, 'index']);
    Route::get('add', [CartController::class, 'add']);
    Route::get('delete', [CartController::class, 'delete']);
    Route::get('destroy', [CartController::class, 'destroy']);
    Route::get('update', [CartController::class, 'update']);
});

Route::prefix('checkout')->group(function () {
    Route::get('', [CheckOutController::class, 'index']);
    Route::post('/', [CheckOutController::class, 'addOrder']);
    Route::get('/result', [CheckOutController::class, 'result']);
    Route::get('/vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function () {
    Route::get('login', [AccountController::class, 'login']);
    Route::post('login', [AccountController::class, 'checkLogin']);
    Route::get('logout', [AccountController::class, 'logout']);
    Route::get('register', [AccountController::class, 'register']);
    Route::post('register', [AccountController::class, 'postResgister']);

    Route::prefix('my-order')->middleware(CheckMemberLogin::class)->group(function () {
        Route::get('', [AccountController::class, 'myOrderIndex']);
        Route::get('/{id}', [AccountController::class, 'myOrderDetail']);
    });
});
