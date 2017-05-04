<?php

use Illuminate\Http\Request;

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

//Register new users
Route::post('register', 'UserController@registerNewUser');

Route::group(['middleware' => ['auth:api', 'cors']], function(){
	Route::resource('category', 'CategoryController');
	Route::resource('transaction', 'TransactionController');
	Route::get('last/{time}', 'TransactionController@lastdays');
	Route::get('deposit', 'TransactionController@deposit');
	Route::get('withdrawal', 'TransactionController@withdrawal');
});
