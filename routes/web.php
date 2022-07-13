<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'namespace' => 'App\Http\Controllers\Frontend',
], function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::group([
        'as' => 'services.',
        'prefix' => 'services',
    ], function () {
        Route::get('/', 'ServiceController@index')->name('index');
        Route::get('/{slug}', 'ServiceController@show')->name('show');
    });
});


Route::group([
    'namespace' => 'App\Http\Controllers\Backend',
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'AdminController@home')->name('home');
    Route::resource('services', 'ServiceController');
    Route::resource('projects', 'ProjectController');
    Route::resource('users', 'UserController');
});

Auth::routes();
