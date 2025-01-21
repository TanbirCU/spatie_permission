<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/permissions', 'App\Http\Controllers\PermissionController');
Route::resource('/roles', 'App\Http\Controllers\RoleController');
Route::get('/give-permission/{roleId}', 'App\Http\Controllers\RoleController@give_permission')
    ->name('give_permission');
Route::post('/update-permission/{roleId}', 'App\Http\Controllers\RoleController@give_permission')
    ->name('give_permission');
