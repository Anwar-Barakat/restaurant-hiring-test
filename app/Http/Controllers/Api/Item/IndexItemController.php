<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class IndexItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $products = Item::query()->paginate($pageSize);
        return ItemResource::collection($products);
    }
}
