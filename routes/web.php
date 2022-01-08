<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

//login page
Route::get('/', [LoginController::class, 'index']);

//Dashboard Page
Route::get('/dashboard', [
    'uses'       => 'App\Http\Controllers\DashboardController@index',
    'as'         => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified']
]);

// category - resource controller
Route::resource('/category', App\Http\Controllers\CategoryController::class);
// categoty status - publishe or unpublish
Route::get('/update-category-status/{id}', [
    'uses'       => 'App\Http\Controllers\CategoryController@updateStatus',
    'as'         => 'category.update-status',
    'middleware' => ['auth:sanctum', 'verified']
]);

// Sub-category - resource controller
Route::resource('/sub-category', App\Http\Controllers\SubCategoryController::class);
// Sub-categoty status - publishe or unpublish
Route::get('/update-sub-category-status/{id}', [
    'uses'       => 'App\Http\Controllers\SubCategoryController@updateStatus',
    'as'         => 'sub-category.update-status',
    'middleware' => ['auth:sanctum', 'verified']
]);

// Brand - resource controller
Route::resource('/brand', App\Http\Controllers\BrandController::class);
// Brand status - publishe or unpublish
Route::get('/update-brand-status/{id}', [
    'uses'       => 'App\Http\Controllers\BrandController@updateStatus',
    'as'         => 'brand.update-status',
    'middleware' => ['auth:sanctum', 'verified']
]);

// Color - resource controller
Route::resource('/color', App\Http\Controllers\ColorController::class);
// Color status - publishe or unpublish
Route::get('/update-color-status/{id}', [
    'uses'       => 'App\Http\Controllers\ColorController@updateStatus',
    'as'         => 'color.update-status',
    'middleware' => ['auth:sanctum', 'verified']
]);
