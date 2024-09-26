<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes, Grouping routes with a namespace and prefix
Route::prefix('admin')->namespace('App\Http\Controllers')->middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('posts', PostController::class);
    Route::resource('media', MediaController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('settings', SettingController::class);
});

