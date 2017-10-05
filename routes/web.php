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

use App\Http\Controllers\PolicyController;

Auth::routes();

Route::get('/', 'HomeController@index')->name('front.home');
Route::get('/nagrody', 'HomeController@index')->name('front.home.nagrody');
Route::get('/wez-udzial', 'HomeController@index')->name('front.home.wez.udzial');
Route::get('/zgloszenia-tygodnia', 'HomeController@index')->name('front.home.zgloszenia.tygodnia');
Route::get('/zgloszenia', 'HomeController@index')->name('front.home.zgloszenia');
Route::get('/nasze-produkty', 'HomeController@index')->name('front.home.nasze.produkty');
Route::get('/kontakt', 'HomeController@index')->name('front.home.kontakt');

Route::get('/polityka-prywatnosci', [PolicyController::class, 'index'])->name('front.policy');
Route::get('/formularz/zapisz', 'HomeController@index')->name('front.form.save');
Route::get('/formularz/promocja', 'HomeController@index')->name('front.form.promo');
Route::get('/formularz/konkurs', 'HomeController@index')->name('front.form.contest');
Route::get('/formularz/pobierz-produkty', 'HomeController@index')->name('front.get.products');
Route::get('/podziekowania/promocja', 'HomeController@index')->name('front.thx.promo');
Route::get('/podziekowania/konkurs', 'HomeController@index')->name('front.thx.contest');
Route::get('/podziekowania/rejestracja', 'HomeController@index')->name('front.thx.signup');
Route::get('/potwierdzam/{id}/{token}', 'HomeController@index')->name('front.confirm');
Route::get('/aplikacja', 'HomeController@index')->name('front.application');
Route::get('/zasady-konkursu', 'HomeController@index')->name('front.rules');
Route::get('/pobierz', 'HomeController@index')->name('front.download');
Route::get('/zgloszenie/{id}', 'HomeController@index')->name('front.application.id');
