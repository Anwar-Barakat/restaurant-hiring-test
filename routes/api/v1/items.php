<?php

use App\Http\Controllers\Api\Item\IndexItemController;
use Illuminate\Support\Facades\Route;


Route::prefix('/items')->group(function () {

    Route::get('/',     IndexItemController::class);
});
