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

//https://medium.com/@kevincristella/basic-token-based-api-authentication-with-laravel-aeed0050dd0d
//php artisan make:middleware ApiToken
Route::middleware(['api'])->group(function () {
    Route::namespace('Api')->name('api.')->group(function () {
        Route::prefix('items')->group(function () {
            Route::get('/', 'ItemsController@get');
            Route::post('/', 'ItemsController@insert');
        });
    });
});


