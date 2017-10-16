<?php

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

use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\ProductController;
use App\Http\Controllers\Panel\ShopController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ThxController;

Auth::routes();

// FRONTEND

Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/nagrody', [HomeController::class, 'index'])->name('front.home.nagrody');
Route::get('/wez-udzial', [HomeController::class, 'index'])->name('front.home.wez.udzial');
Route::get('/zgloszenia-tygodnia', [HomeController::class, 'index'])->name('front.home.zgloszenia.tygodnia');
Route::get('/zgloszenia', [HomeController::class, 'index'])->name('front.home.zgloszenia');
Route::get('/nasze-produkty', [HomeController::class, 'index'])->name('front.home.nasze.produkty');
Route::get('/kontakt', [HomeController::class, 'index'])->name('front.home.kontakt');

Route::get('/polityka-prywatnosci', [PolicyController::class, 'index'])->name('front.policy');
Route::get('/podziekowania/promocja', [ThxController::class, 'promotion'])->name('front.thx.promo');
Route::get('/podziekowania/konkurs', [ThxController::class, 'contest'])->name('front.thx.contest');
Route::get('/podziekowania/rejestracja', [ThxController::class, 'form'])->name('front.thx.form');

Route::get('/formularz/promocja', [PromotionController::class, 'form'])->name('front.form.promo');
Route::get('/formularz/konkurs', [ContestController::class, 'form'])->name('front.form.contest');

Route::post('/formularz/promocja/zapisz', [PromotionController::class, 'store'])->name('front.form.promo.save');
Route::post('/formularz/konkurs/zapisz', [ContestController::class, 'store'])->name('front.form.contest.save');

Route::get('/promocja/potwierdzam/{promotion}/{token}', [ConfirmController::class, 'promotion'])->name('front.confirm.promo');
Route::get('/konkurs/potwierdzam/{contest}/{token}', [ConfirmController::class, 'contest'])->name('front.confirm.contest');

Route::get('/zgloszenia/{contest}', [ContestController::class, 'show'])->name('front.application.id');
Route::post('/kontakt/wyslij', [ContactController::class, 'send'])->name('front.contact.send');

//BACKEND

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/panel', [PanelController::class, 'index'])->name('back.home');

    Route::middleware(['can:isAdmin'])->group(function () {
        Route::get('/panel/zgloszenia/promocja', [\App\Http\Controllers\Panel\PromotionController::class, 'index'])->name('back.promotion');
        Route::get('/panel/zgloszenia/konkurs', [\App\Http\Controllers\Panel\ContestController::class, 'index'])->name('back.contest');
//        Route::get('/panel/zgloszenie/{id}', [\App\Http\Controllers\Panel\ApplicationController::class, 'show'])->name('panel.app.show');

        Route::get('/panel/kategoria', [CategoryController::class, 'index'])->name('back.category');
        Route::get('/panel/kategoria/dodaj', [CategoryController::class, 'create'])->name('back.category.create');
        Route::get('/panel/kategoria/zmien/{category}', [CategoryController::class, 'edit'])->name('back.category.edit');
        Route::get('/panel/kategoria/{category}', [CategoryController::class, 'show'])->name('back.category.show');

        Route::get('/panel/produkt', [ProductController::class, 'index'])->name('back.product');
        Route::get('/panel/produkt/dodaj', [ProductController::class, 'create'])->name('back.product.create');
        Route::get('/panel/produkt/zmien/{product}', [ProductController::class, 'edit'])->name('back.product.edit');
        Route::get('/panel/produkt/{product}', [ProductController::class, 'show'])->name('back.product.show');


        Route::get('/panel/sklep', [ShopController::class, 'index'])->name('back.shop');
        Route::get('/panel/sklep/dodaj', [ShopController::class, 'create'])->name('back.shop.create');
        Route::get('/panel/sklep/zmien/{shop}', [ShopController::class, 'edit'])->name('back.shop.edit');
        Route::get('/panel/sklep/{shop}', [ShopController::class, 'show'])->name('back.shop.show');
    });
});




//----------------------------------
//Route::get('/formularz/pobierz-produkty', 'HomeController@index')->name('front.get.products');
//Route::get('/pobierz', 'HomeController@index')->name('front.download');
