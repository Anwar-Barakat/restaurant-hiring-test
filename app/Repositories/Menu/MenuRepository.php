<?php

namespace App\Repositories\Menu;

use App\Exceptions\GeneralJsonException;
use App\Models\Menu;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class MenuRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $created = Menu::query()->create([
                'user_id'       => auth()->id(),
                'grand_price'   => data_get($attributes, 'grand_price'),
            ]);

            if ($item_ids = data_get($attributes, 'item_ids'))
                $created->items()->sync($item_ids);

            $created['discount'] = Menu::applyDiscount($created->items());

            throw_if(!$created, GeneralJsonException::class, 'Failed to create');

            return $created;
        });
    }
}