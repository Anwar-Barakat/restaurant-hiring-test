<?php

namespace App\Http\Controllers\Api\User\Menu;

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
        $pageSize   = $request->page_size ?? 20;
        $menus      = Menu::query()->where('user_id', auth()->id())->paginate($pageSize);
        return MenuResource::collection($menus);
    }
}
