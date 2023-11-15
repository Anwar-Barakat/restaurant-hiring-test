<?php

namespace App\Http\Controllers\Api\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ShowItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Item $item)
    {
        return new ItemResource($item);
    }
}
