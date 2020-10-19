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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Auth::routes(['verify' => true]);
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::get('country_list', 'UserController@country_list');
Route::post('state_list', 'UserController@state_list');
Route::post('city_list', 'UserController@city_list');
Route::group(['middleware' => 'auth:api'], function(){
Route::get('details', 'UserController@details');
});