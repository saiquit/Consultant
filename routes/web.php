<?php

use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    //Todo: Delete this
    // Route::get('mail-test', function () {
    //     return view('mail.project.reference-mail', [
    //         'data' => [
    //             'name' => 'Name',
    //             'subject' => 'Subject of the mail',
    //             'project' => ['id' => 1]
    //         ]
    //     ]);
    // });
});


Route::group([
    'namespace' => 'App\Http\Controllers\Backend',
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'AdminController@home')->middleware('profile')->name('home');
    Route::resource('services', 'ServiceController')->middleware('profile');
    Route::resource('projects', 'ProjectController')->middleware('profile');
    Route::resource('users', 'UserController');
    Route::resource('expertises', 'ExpertiseController');
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', 'ProfileController@index')->name('index');
        Route::post('/update', 'ProfileController@update')->name('update');
    });;
    // Request a project
    Route::post('/reqForProject/{project}', 'ComController@reqForProject')->name('reqForProject');
    Route::post('/approve/{project}', 'ComController@approve')->name('approve');
    Route::post('/ajax/exp', 'ComController@ajaxExpert')->name('ajax_exp');
    //Mark Read Notfication
    Route::post('/markAsRead', 'ComController@mark')->name('mark');
    //Email
    Route::post('/response/project/{project}', 'EmailController@projectRequestResponse')->name('res-pro');
    //img_upload
    Route::post('profile_img', 'ProfileController@img_update')->name('profile_img');
});

Auth::routes();
