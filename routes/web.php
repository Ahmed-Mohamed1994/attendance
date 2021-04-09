<?php

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


Route::get('/', 'MainController@index')->name('home');
Route::post('/store', 'MainController@store')->name('attendance');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'UserController@loginPage')->name('login');
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::post('/login', 'UserController@login')->name('adminLogin');

    Route::get('/dashboard','MainController@dashboard')->name('dashboard');

    // attendance user route
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', 'UserAttendanceController@index')->name('users');
        Route::get('/create', 'UserAttendanceController@create')->name('createUser');
        Route::post('/store', 'UserAttendanceController@store')->name('storeUser');

        Route::group(['prefix' => '{user}'], function () {
            Route::get('/edit', 'UserAttendanceController@edit')->name('editUser');
            Route::post('/update', 'UserAttendanceController@update')->name('updateUser');
            Route::get('/delete', 'UserAttendanceController@destroy')->name('deleteUser');
        });

    });

});