<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::get('adminhome', 'AdminHomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//Card manager
Route::get('admincardmananger', 'CardManagerController@index');
Route::get('cardslistview', 'CardManagerController@cardslistview');
Route::get('cardslist', 'CardManagerController@cardslist');
Route::post('cardslist', 'CardManagerController@cardslistpost');
Route::get('addcardview', 'CardManagerController@addcardview');
Route::post('addcardview', 'CardManagerController@addcard');
Route::get('cardissuanceview', 'CardManagerController@cardissuanceview');
Route::post('cardissuanceview', 'CardManagerController@cardissuance');
Route::get('addcardinfoview', 'CardManagerController@addcardinfoview');

//General
Route::get('admingeneral', 'GeneralController@index');
Route::get('citieslistview', 'GeneralController@citieslistview');
Route::get('citieslist', 'GeneralController@citieslist');