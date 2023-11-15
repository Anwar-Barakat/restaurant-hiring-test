<?php

use App\Http\Controllers\Api\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/')->group(function () {

    Route::controller(AuthController::class)->group(function () {

        Route::post('login',            'login');
        Route::post('register',         'register');
        Route::post('logout',           'logout');
        Route::post('refresh',          'refresh');
        Route::get('profile',           'profile');
    });
});
