<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ShopController;
use App\Http\Controllers\Front\CartController;
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
});
