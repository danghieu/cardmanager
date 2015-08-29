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

//Admin
	//Card manager
	Route::get('admincardmananger', 'CardManagerController@index');
	Route::get('cardslistview', 'CardManagerController@cardslistview');
	Route::get('cardslist', 'CardManagerController@cardslist');
	Route::post('cardslist', 'CardManagerController@cardslistpost');
	Route::get('addcardview', 'CardManagerController@addcardview');
	Route::post('addcardview', 'CardManagerController@addcard');
	Route::get('cardissuanceinput', 'CardManagerController@cardissuanceinput');
	Route::post('getcardissuance', 'CardManagerController@getcardissuance');
	Route::post('cardissuanceinput', 'CardManagerController@cardissuanceinputpost');
	Route::get('cardissuanceview', 'CardManagerController@cardissuanceview');
	Route::post('cardissuanceview', 'CardManagerController@cardissuance');
	Route::post('check-cardtoissuance', 'CardManagerController@check_cardtoissuance');
	Route::get('cardinfoinput', 'CardManagerController@cardinfoinput');
	Route::post('cardinfoinput', 'CardManagerController@cardinfoinputpost');
	Route::post('editinfocard', 'CardManagerController@editinfocard');
	//General
	Route::get('admingeneral', 'GeneralController@index');
	Route::get('citieslistview', 'GeneralController@citieslistview');
	Route::get('citieslist', 'GeneralController@citieslist');
	Route::get('addnewcity', 'GeneralController@addnewcity');
	Route::post('addnewcity', 'GeneralController@postaddnewcity');
	Route::get('addnewvehicle', 'GeneralController@addnewvehicle');
	Route::post('addnewvehicle', 'GeneralController@postaddnewvehicle');
	Route::get('liststationfee', 'GeneralController@liststationfee');
	Route::get('vehiclelist', 'GeneralController@vehiclelist');


	//User
	Route::get('cardinfo', 'User\CardController@cardinfo');
	Route::get('cardinfoview', 'User\CardController@cardinfoview');
	Route::get('addcardinfo', 'User\CardController@addcardinfo');
	Route::post('addcardinfopost', 'User\CardController@addcardinfopost');

	//User manager
	Route::get('usermanager', 'User\UserManagerController@index');
	Route::get('userlistview', 'User\UserManagerController@userlistview');
