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

//expenses routes

Route::group(['middleware' => 'auth'], function() {
    Route::get('expense', ['as' => 'expense.index', 'uses' => 'ExpenseController@index']);
    Route::get('expense/create', ['as' => 'expense.create', 'uses' => 'ExpenseController@create']);
    Route::get('expense/split', ['as' => 'expense.split', 'uses' => 'ExpenseController@split']);
    Route::post('expense', ['as' => 'expense.store', 'uses' => 'ExpenseController@store']);
});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
