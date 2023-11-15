<?php

use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\Menu\IndexMenuController;
use App\Http\Controllers\Api\User\Menu\ShowMenuController;
use App\Http\Controllers\Api\User\Menu\StoreMenuController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {

    Route::post('/login',               'login');
    Route::post('/register',            'register');
    Route::post('/logout',              'logout');
    Route::post('/refresh',             'refresh');
    Route::get('/profile',              'profile');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/menus',                 IndexMenuController::class);
    Route::get('/menus/{menu}',          ShowMenuController::class);
    Route::post('/menus',                StoreMenuController::class);
});