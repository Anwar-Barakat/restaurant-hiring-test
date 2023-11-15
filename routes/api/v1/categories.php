<?php

use App\Http\Controllers\Api\Category\IndexCategoryController;
use App\Http\Controllers\Api\Category\ShowCategoryController;
use App\Http\Controllers\Api\Category\StoreCategoryController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:admin'])->group(function () {

Route::prefix('/categories')->group(function () {

    Route::get('/',             IndexCategoryController::class);
    Route::post('/',            StoreCategoryController::class);
    Route::get('/{category}',   ShowCategoryController::class);
});
// });