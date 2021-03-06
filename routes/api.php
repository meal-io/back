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

Route::get('/', function() {
   return response()->json(['message' => "Acesso somente para API"]);
});

Route::group(['prefix' => 'auth'], function() {
   Route::post('login', 'Auth\LoginController@login')->name('login');
   Route::get('me', 'Auth\LoginController@me');
});
