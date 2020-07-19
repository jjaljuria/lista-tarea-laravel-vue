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


Route::group(['prefix' => 'AppLista'], function() {
    Route::get('/', 'TareaController@index');
    Route::post('/store', 'TareaController@store');
    Route::delete('/destroy/{id}', 'TareaController@destroy');
});


Route::group(['prefix' => 'AppPomodoro'], function() {
});



