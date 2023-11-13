<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Resources\ItemResource;
use App\Repositories\Item\ItemRepository;
use Illuminate\Http\JsonResponse;

class StoreItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreItemRequest $request, ItemRepository $repository)
    {
        $created = $repository->create($request->only([
            'category_id', 'name', 'price', 'discount', 'gst', 'description', 'meta_title', 'meta_description', 'meta_keywords', 'is_featured', 'is_best_seller', 'is_active',
        ]));

        return new JsonResponse([
            'data'      => new ItemResource($created),
        ]);
    }
}
