<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Routes;
use App\Models\User;
use App\Http\Controllers\ApiController;

Route::get('/users', 'App\Http\Controllers\ApiController@getAllUsers');
Route::get('/users/{id}', 'ApiController@getUser');
Route::post('/users', 'ApiController@createUser');
Route::put('/users/{id}', 'ApiController@updateUser');
Route::delete('/users/{id}','ApiController@deleteUser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
