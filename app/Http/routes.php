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
    Route::get('expenses', ['as' => 'expense.index', 'uses' => 'ExpenseController@index']);
    Route::get('expenses/create', ['as' => 'expense.create', 'uses' => 'ExpenseController@create']);
    Route::get('expenses/split', ['as' => 'expense.split', 'uses' => 'ExpenseController@split']);
    Route::post('expenses', ['as' => 'expense.store', 'uses' => 'ExpenseController@store']);
});



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
