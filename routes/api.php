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
        Route::prefix('users')->group(function () {
            Route::get('/', 'UsersController@get');
            Route::post('/login', 'UsersController@login');
            Route::post('/', 'UsersController@store');
            Route::post('/destroy', 'UsersController@destroy');
        });
        Route::prefix('products')->group(function () {
            Route::get('/', 'ProductsController@get');
            Route::post('/', 'ProductsController@store');
            Route::post('/destroy', 'ProductsController@destroy');
        });
        Route::prefix('config')->group(function () {
            Route::get('/', 'ConfigController@get');
            Route::post('/', 'ConfigController@store');
            Route::post('/destroy', 'ConfigController@destroy');
        });
    });
});


