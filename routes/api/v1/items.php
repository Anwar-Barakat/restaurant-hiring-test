<?php

use App\Http\Controllers\Api\Item\IndexItemController;
use App\Http\Controllers\Api\Item\StoreItemController;
use Illuminate\Support\Facades\Route;


Route::prefix('/items')->group(function () {

    Route::get('/',     IndexItemController::class);
    Route::post('/',     StoreItemController::class);
});
