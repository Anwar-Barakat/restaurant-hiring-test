<?php

namespace App\Http\Controllers\Api\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class IndexMenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $products = Menu::query()->paginate($pageSize);
        return MenuResource::collection($products);
    }
}