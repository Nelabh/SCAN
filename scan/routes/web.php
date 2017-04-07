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


Route::group(['middleware' => 'auth'], function () {
	Route::get('dashboard', array('as'=>'dashboard','uses'=>'DashboardController@index'));
});

Route::get('/',array('as'=>'home','uses'=>'PagesController@home'));
Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
Route::post('log',array('as'=>'login','uses'=>'PagesController@log'));