<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('todos/search/{parameter}', 'TodoController@search');
Route::apiResource('todos', 'TodoController');

Route::get('bicycles/search/{parameter}', 'BicycleController@search');
Route::apiResource('bicycles', 'BicycleController');
Route::get('users/search/{parameter}', 'UserController@search');
Route::apiResource('users', 'UserController');
Route::get('countries/search/{parameter}', 'CountryController@search');
Route::apiResource('countries', 'CountryController');


Route::get('actors/search/{parameter}', 'ActorController@search');
Route::apiResource('actors', 'ActorController');
Route::get('movies/search/{parameter}', 'MovieController@search');
Route::apiResource('movies', 'MovieController');
Route::get('genres/search/{parameter}', 'GenreController@search');
Route::apiResource('genres', 'GenreController');

