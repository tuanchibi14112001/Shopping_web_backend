<?php

use App\Repositories\Product\ProductRepositoriesInterFace;
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

Route::get('/', function (ProductRepositoriesInterFace $productRepositories) {
    // return view('front/index');
    return $productRepositories->find(1);
});
