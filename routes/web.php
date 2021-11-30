<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

//login page
Route::get('/', [LoginController::class, 'index']);
//Dashboard
Route::get('/dashboard', [
    'uses'       => 'App\Http\Controllers\DashboardController@index',
    'as'         => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified']
]);
// category resource controller
Route::resource('/category', App\Http\Controllers\CategoryController::class);
// update categoty status
Route::get('/update-category-status/{id}', [
    'uses'       => 'App\Http\Controllers\CategoryController@updateStatus',
    'as'         => 'category.update-status',
    'middleware' => ['auth:sanctum', 'verified']
]);
