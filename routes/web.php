<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('index');

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {

    Route::group(['prefix' => 'items', 'namespace' => 'Item'], function () {

        Route::get('/', 'MainController@index')->name('dashboard.items');
        Route::get('create', 'MainController@create')->name('dashboard.items.create');
        Route::post('create', 'MainController@store')->name('dashboard.items.store');
        Route::get('{id}/edit', 'MainController@edit')->name('dashboard.items.edit');
        Route::post('{id}/edit', 'MainController@update')->name('dashboard.items.update');
        Route::get('{id}/delete', 'MainController@delete')->name('dashboard.items.delete');
    });

    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {

        Route::get('/', 'MainController@index')->name('dashboard.api');
    });

});
