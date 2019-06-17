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
            Route::post('/', 'ItemsController@store');
            Route::post('/destroy', 'ItemsController@destroy');
        });
        Route::prefix('modules')->group(function () {
            Route::get('/', 'ModulesController@get');
            Route::post('/', 'ModulesController@store');
            Route::post('/destroy', 'ModulesController@destroy');
        });
        Route::prefix('projects')->group(function () {
            Route::get('/', 'ProjectsController@get');
            Route::post('/', 'ProjectsController@store');
            Route::post('/destroy', 'ProjectsController@destroy');
        });
        Route::prefix('states')->group(function () {
            Route::get('/', 'StatesController@get');
            Route::post('/', 'StatesController@store');
            Route::post('/destroy', 'StatesController@destroy');
        });
        Route::prefix('users')->group(function () {
            Route::get('/', 'UsersController@get');
            Route::post('/login', 'UsersController@login');
            Route::post('/', 'UsersController@store');
            Route::post('/destroy', 'UsersController@destroy');
        });
    });
});


