<?php

use App\Http\Controllers\Api\Admin\Menu\IndexMenuController;
use App\Http\Controllers\Api\Admin\Menu\ShowMenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {

    Route::middleware(['auth:admin'])->prefix('/menus')->group(function () {

        Route::get('/',                IndexMenuController::class);
        Route::get('/{menu}',          ShowMenuController::class);
    });
});
