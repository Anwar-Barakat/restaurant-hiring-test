<?php

use App\Http\Controllers\Api\User\AuthController;
use Illuminate\Support\Facades\Route;


Route::controller(AuthController::class)->group(function () {

    Route::post('/login',               'login');
    Route::post('/register',            'register');
    Route::post('/logout',              'logout');
    Route::post('/refresh',             'refresh');
    Route::get('/profile',              'profile');
});
