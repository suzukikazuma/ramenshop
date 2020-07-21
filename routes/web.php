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

Route::get('/', 'ShopController@index')->name("/");
    
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
   
      Route::get('/mycart', 'ShopController@mycart')->middleware("auth")->name("mycart");
      Route::post('/mycart', 'ShopController@add')->middleware("auth")->name("mycart");
      Route::POST('/cartdelete','ShopController@delete')->name("cartdelete");
      Route::post('/checkout', 'ShopController@checkout')->name("checkout");
  
  });

Route::get("about","ShopController@about")->name("about");
Route::get("contact","ShopController@contact")->name("contact");
