<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index']);     // login page

//Dashboard
Route::get('/dashboard', [
    'uses'       => 'App\Http\Controllers\DashboardController@index',
    'as'         => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified']
]);
