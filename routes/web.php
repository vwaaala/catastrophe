<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes, Grouping routes with a namespace and prefix
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('posts', PostController::class);
    Route::resource('media', MediaController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('settings', SettingController::class);
});

