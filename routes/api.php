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

Route::group(['namespace' => 'Api'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {

        Route::post('login', 'MainController@login')->name('api.login');
    });

    Route::group(['middleware' => 'auth:api'], function() {

        Route::group(['prefix' => 'items', 'namespace' => 'Item'], function () {

            Route::get('get', 'MainController@getAll')->name('api.items.get.all');
            Route::get('{id}', 'MainController@get')->name('api.items.get');
            Route::post('create', 'MainController@create')->name('api.items.create');
            Route::patch('{id}/update', 'MainController@update')->name('api.items.update');
            Route::delete('{id}/delete', 'MainController@delete')->name('api.items.delete');
        });
    });
});

