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
	Route::resource('questions','QuestionController');
});

Route::get('/',array('as'=>'login','uses'=>'PagesController@home'));
Route::get('question',array('as'=>'question','uses'=>'ScanController@question'));
Route::get('result',array('as'=>'result','uses'=>'ScanController@result'));
Route::post('evaluate',array('as'=>'evaluate','uses'=>'ScanController@evaluate'));

Route::get('logout',array('as'=>'logout','uses'=>'PagesController@logout'));
Route::post('log',array('as'=>'log','uses'=>'PagesController@log'));

Route::get('register',array('as'=>'register','uses'=>'PagesController@register'));
Route::post('signup',array('as'=>'signup','uses'=>'PagesController@signup'));

Route::get('profile',array('as'=>'profile','uses'=>'PagesController@profile'));
Route::post('editprofile',array('as'=>'editprofile','uses'=>'PagesController@editprofile'));

Route::get('studentprofile',array('as'=>'studentprofile','uses'=>'PagesController@studentprofile'));
Route::post('editstudentprofile',array('as'=>'editstudentprofile','uses'=>'PagesController@editstudentprofile'));
Route::get('delete_questions/{id}',array('as'=>'delete_questions','uses'=>'QuestionController@delete_questions'));

Route::get('scan/initiate',array('as'=>'initiate','uses'=>'ScanController@initiate'));
