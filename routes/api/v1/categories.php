<?php

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;


Route::get('/categories', function (Request $request) {
    $pageSize = $request->page_size ?? 20;
    $products = Category::query()->paginate($pageSize);
    return CategoryResource::collection($products);
});
