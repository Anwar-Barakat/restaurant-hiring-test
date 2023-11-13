<?php

namespace App\Http\Controllers\Api\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;

class ShowMenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Menu $menu)
    {
        return new MenuResource($menu);
    }
}
