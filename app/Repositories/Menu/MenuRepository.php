<?php

namespace App\Repositories\Menu;

use App\Exceptions\GeneralJsonException;
use App\Models\Item;
use App\Models\Menu;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class MenuRepository extends BaseRepository
{
    public int $discount;

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $item = Item::find(data_get($attributes, 'item_id'));

            $created = Menu::query()->create([
                'user_id'       => auth()->id(),
                'qty'           => data_get($attributes, 'qty'),
                'item_id'       => data_get($attributes, 'item_id'),
                'unit_price'    => $item->price,
                'discount'      => $this->getDiscount($item, data_get($attributes, 'discount')),
                'grand_total'   => $this->getGrandTotal($item, data_get($attributes, 'qty')),
            ]);

            throw_if(!$created, GeneralJsonException::class, 'Failed to create');

            return $created;
        });
    }

    public function getDiscount(Item $item, $menuDiscount)
    {
        $this->discount = 0;

        switch (true) {
            case $item->category && $item->category->discount > 0:
                $this->discount = $item->category->discount;
                break;

            case $item->subCategory && $item->subCategory->discount > 0:
                $this->discount = $item->subCategory->discount;
                break;

            case $item->discount > 0:
                $this->discount = $item->discount;
                break;

            default:
                $this->discount = $menuDiscount;
                break;
        }
        return $this->discount;
    }

    public function getGrandTotal(Item $item, int $qty)
    {
        $grandTotal = 0;
        $grandTotal = $item->price * $qty;
        if ($this->discount > 0)
            $grandTotal -= ($grandTotal * $this->discount) / 100;

        return $grandTotal;
    }
}
