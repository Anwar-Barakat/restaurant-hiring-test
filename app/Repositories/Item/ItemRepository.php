<?php

namespace App\Repositories\Item;

use App\Exceptions\GeneralJsonException;
use App\Models\Item;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ItemRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $created = Item::query()->create([
                'category_id'       => data_get($attributes, 'category_id', 'untitled'),
                'name'              => data_get($attributes, 'name'),
                'price'             => data_get($attributes, 'price'),
                'discount'          => data_get($attributes, 'discount'),
                'gst'               => data_get($attributes, 'gst'),
                'description'       => data_get($attributes, 'description'),
                'meta_title'        => data_get($attributes, 'meta_title'),
                'meta_description'  => data_get($attributes, 'meta_description'),
                'meta_keywords'     => data_get($attributes, 'meta_keywords'),
                'is_featured'       => data_get($attributes, 'is_featured'),
                'is_best_seller'    => data_get($attributes, 'is_best_seller'),
                'is_active'         => data_get($attributes, 'is_active'),
            ]);

            throw_if(!$created, GeneralJsonException::class, 'Failed to create');

            return $created;
        });
    }
}