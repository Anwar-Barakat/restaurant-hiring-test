<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreCategoryRequest $request, CategoryRepository $repository)
    {
        $created = $repository->create($request->only([
            'parent_id', 'name', 'url', 'discount', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'is_active',
        ]));

        return new JsonResponse([
            'data'      => new CategoryResource($created),
        ]);
    }
}
