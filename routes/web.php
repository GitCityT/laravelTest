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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['prefix' => 'admin','middleware'=>['auth','api']],function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('custom/search','CustomController@search')->name('custom.search');
	Route::post('custom/search','CustomController@search')->name('custom.search');
	Route::resource('custom','CustomController');
});
