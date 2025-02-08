<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', 'App\Http\Controllers\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
// Route::group(['middleware' => ['role:super-admin | admin | user']], function () {
    Route::resource('/permissions', 'App\Http\Controllers\PermissionController');
    Route::resource('/roles', 'App\Http\Controllers\RoleController');
    Route::resource('/users', 'App\Http\Controllers\UserController');
    Route::get('/give-permission/{roleId}', 'App\Http\Controllers\RoleController@give_permission')
        ->name('give_permission');
    Route::put('/update-permission/{roleId}', 'App\Http\Controllers\RoleController@update_permission')
        ->name('update_permission');
// });

