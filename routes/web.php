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
Route::get('/home', 'HomeController@index');
Route::get('/', function () {
   if(Auth::check()){
   		return redirect('/home');
   }
   else
   		return view('welcome');

});

/**
 * Authentication Routes
 */

Auth::routes();

/**
 * Main App Routes
 */

Route::group(['middleware' => 'auth'],function(){
	Route::get('create_ad','AdController@showCreateAdForm');
	Route::post('post_ad','AdController@createAd');
	Route::get('delete/{ad_id}','AdController@deleteAd');
	Route::get('update_ad/{ad_id}','AdController@showUpdateAdForm');
	Route::post('update_ad/{ad_id}','AdController@updateAd');
});

Route::get('view_ad/{ad_id}','AdController@showAd');

/**
 * Admin Routes
 * 
 */

Route::group(['middleware' => ['admin','auth'],'prefix' => 'admin'],function(){
	Route::get('dashboard');
});

Route::get('/admin', 'Admin\Auth\LoginController@showLoginForm');



