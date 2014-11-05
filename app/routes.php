<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('login', 'HomeController@getLogin');
Route::get('register', 'HomeController@getRegister');
Route::post('register', 'HomeController@postRegister');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@logout');

Route::group(array('before' => 'auth'), function(){

	Route::get('admin', 'AdminController@getIndex');
	Route::get('admin/users', 'AdminController@getUsers');
	Route::get('admin/{id}/edit', 'AdminController@edit');
	Route::put('admin/{id}/update', array('as' => 'users.update', 'uses' => 'AdminController@update'));
	//Route::post('/users/{id}/assign', array('uses' => 'UsersController@assignToProject'));
	Route::DELETE('admin/{id}', 'AdminController@destroy');


	//Categoreis routs.
	Route::get('categories/categories', 'CategoriesController@getCategories');
	//Route::get('register', 'CategoriesController@getCategorydrop');
	//Route::get('register', 'CategoriesController@getDropdownCategories');
	

	//Route::get('register', 'CategoriesController@get_settings_address');


	//Display the Add Category page.
	Route::get('categories/addcategory', 'CategoriesController@addCategory');

	//Add Category
	Route::post('categories/addcategory', 'CategoriesController@postCategtory');

	//Delete the category.
	Route::DELETE('categories/{id}', 'CategoriesController@destroy');

	//Edit category page
	Route::get('categories/{id}/edit', 'CategoriesController@edit');

	//Update Categoy page.
	Route::put('categories/{id}/update', array('as' => 'categories.update', 'uses' => 'CategoriesController@update'));

	//search users.
	
	//Route::get('admin/users/{unaem}', 'AdminController@getUsers');
	Route::get('admin/{username}/users', 'AdminController@getSearchUsers');




});

