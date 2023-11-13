<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $products = Category::query()->paginate($pageSize);
        return CategoryResource::collection($products);
    }
}
