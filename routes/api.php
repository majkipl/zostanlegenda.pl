<?php

use App\Http\Controllers\Api\ContestController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/contest/verified', [ContestController::class, 'verified'])->name('api.contests.veryfied');
Route::get('/product', [ProductController::class, 'index'])->name('api.products');
Route::get('/product/category/{category}', [ProductController::class, 'category'])->name('api.products.category');
