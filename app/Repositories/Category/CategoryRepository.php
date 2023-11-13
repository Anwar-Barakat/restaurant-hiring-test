<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {
            $created = Category::query()->create([
                'parent_id'         => data_get($attributes, 'parent_id', 'untitled'),
                'name'              => data_get($attributes, 'name'),
                'url'               => data_get($attributes, 'url'),
                'discount'          => data_get($attributes, 'discount'),
                'description'       => data_get($attributes, 'description'),
                'meta_title'        => data_get($attributes, 'meta_title'),
                'meta_description'  => data_get($attributes, 'meta_description'),
                'meta_keywords'     => data_get($attributes, 'meta_keywords'),
                'is_active'         => data_get($attributes, 'is_active'),
            ]);

            return $created;
        });
    }
}
