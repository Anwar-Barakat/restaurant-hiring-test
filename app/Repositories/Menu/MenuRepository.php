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
                'item_id'       => data_get($attributes, 'item_id'),
                'unit_price'    => data_get($attributes, 'unit_price'),
                'qty'           => data_get($attributes, 'qty'),
                'grand_total'   => data_get($attributes, 'grand_total'),
                'discount'      => data_get($attributes, 'discount'),
            ]);

            throw_if(!$created, GeneralJsonException::class, 'Failed to create');

            return $created;
        });
    }

    public function applyDiscounts($items)
    {
        $discount = 0;

        foreach ($items as $item) {

            if ($item->category->discount > 0) {
            }
        }

        // foreach ($items as $item) {
        //     $discount = $item->discount;

        //     foreach ($items as $otherItem) {
        //         if ($otherItem->discount < $discount) {
        //             $discount = $otherItem->discount;
        //         }
        //     }

        //     if ($discount > 0) {
        //         if ($item->subCategory && ($item->subCategory->discount < $discount))
        //             $item->subCategory->discount;

        //         elseif ($item->category->discount < $discount)
        //             $item->category->discount;
        //     }
        // }
        return $discount;
    }

    public function getGrandPrice($items)
    {
        $grandPrice = 0;
        $discount   = $this->applyDiscounts($items) ?? 1;

        foreach ($items as $item)
            $grandPrice += $item->price;

        return $this->calculateDiscount($grandPrice, $discount);
    }

    public static function calculateDiscount($price, $discount)
    {
        if (is_numeric($discount))
            return $price - ($price * $discount / 100);
    }
}
