<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Routes;
use App\Models\User;
use App\Http\Controllers\ApiController;

Route::get('/users', 'App\Http\Controllers\ApiController@getAllUsers');
Route::get('/users/{id}', 'ApiController@getUser');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
