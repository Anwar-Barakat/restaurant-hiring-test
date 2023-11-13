<?php

use App\Http\Controllers\Api\Category\IndexCategoryController;
use App\Http\Controllers\Api\Category\StoreCategoryController;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;


Route::prefix('/categories')->group(function () {

    Route::get('/',     IndexCategoryController::class);
    Route::post('/',     StoreCategoryController::class);
});
