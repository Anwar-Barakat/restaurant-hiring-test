<?php

namespace App\Http\Controllers\Api\User\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Resources\MenuResource;
use App\Repositories\Menu\MenuRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreMenuController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreMenuRequest $request, MenuRepository $repository)
    {
        $created = $repository->create($request->only([
            'grand_price', 'item_ids', 'discount'
        ]));

        return new JsonResponse([
            'data'      => new MenuResource($created),
        ]);
    }
}