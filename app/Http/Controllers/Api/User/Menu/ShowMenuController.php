<?php

namespace App\Http\Controllers\Api\User\Menu;

use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;

class ShowMenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Menu $menu)
    {
        if (!$menu)
            throw_if(true, GeneralJsonException::class, 'Not Found', 404);

        if (Menu::where(['id' => $menu->id, 'user_id' => auth()->id()])->exists())
            throw_if(true, GeneralJsonException::class, 'Access Denied', 403);

        return new MenuResource($menu);
    }
}
