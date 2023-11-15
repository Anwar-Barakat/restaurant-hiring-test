<?php

use App\Http\Controllers\Api\Item\IndexItemController;
use App\Http\Controllers\Api\Item\ShowItemController;
use App\Http\Controllers\Api\Item\StoreItemController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/items')->group(function () {

    // Route::middleware(['auth:admin'])->group(function () {

    Route::get('/',         IndexItemController::class);
    Route::post('/',        StoreItemController::class);
    Route::get('/{item}',   ShowItemController::class);
    // });
});
