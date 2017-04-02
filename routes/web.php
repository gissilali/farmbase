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
   else{
   		$ads=App\Ad::orderBy('created_at','desc')->paginate(8);
   		return view('welcome',compact('ads'));
	}
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
	Route::post('delete/{ad_id}','AdController@deleteAd');
	Route::post('edit/{ad_id}','AdController@showUpdateAdForm');
	Route::post('update_ad/{ad_id}','AdController@updateAd');
	Route::get('favorite/{ad_id}','FavoriteController@favorite');
	Route::get('fetchFavorite/{ad_id}','FavoriteController@fetchFavorite');
});

Route::get('category/farm_produce/{category_id}','FilterAndSortController@fetchFarmProduce'); 
Route::get('ad/{ad_id}','AdController@showAd');

/**
 * Admin Routes
 * 
 */

Route::group(['middleware' => ['admin','auth'],'prefix' => 'admin'],function(){
	Route::get('dashboard');
});

Route::get('/admin', 'Admin\Auth\LoginController@showLoginForm');



