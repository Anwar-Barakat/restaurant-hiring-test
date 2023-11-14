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

            $created['discount'] =  $this->applyDiscounts($created->items);

            throw_if(!$created, GeneralJsonException::class, 'Failed to create');

            return $created;
        });
    }

    public function applyDiscounts($items)
    {
        $discount = 0;

        foreach ($items as $item) {
            $discount = $item->discount;

            foreach ($items as $otherItem) {
                if ($otherItem->discount < $discount) {
                    $discount = $otherItem->discount;
                }
            }

            if ($discount > 0) {
                if ($item->subCategory && ($item->subCategory->discount < $discount))
                    $item->subCategory->discount;

                elseif ($item->category->discount < $discount)
                    $item->category->discount;
            }
        }
        return $discount;
    }
}