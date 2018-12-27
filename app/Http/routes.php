<?php
use App\Http\Requests;
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

// Rest For CRUD Entity
Route::get('categories',[
	'uses' => 'Category\CategoryController@index',
	'as' => 'category.index'
]);

Route::get('categories/{id}',[
	'uses' => 'Category\CategoryController@show',
	'as' => 'categories.show'
]);

Route::post('categories',[
	'uses' => 'Category\CategoryController@store',
	'as' => 'categories.store'
]);

Route::put('categories/{categories}',[
	'uses' => 'Category\CategoryController@update',
	'as' => 'categories.update'
]);

Route::delete('categories/{categories}',[
	'uses' => 'Category\CategoryController@delete',
	'as' => 'categories.delete'
]);


// Map Api
Route::get('storepoints','Point\PointController@store');

Route::get('mappoints','Point\PointController@mappoints');

Route::get('map','Point\PointController@map');
