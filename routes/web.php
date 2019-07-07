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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function(){
	Route::resource('/deposit','Transaction\DepositController');
	Route::resource('/account','Master\AccountController');
	Route::get('account/detail/{id}','Master\AccountController@detailTrans')->name('account.detail');
	Route::resource('/user','UserController');
});
