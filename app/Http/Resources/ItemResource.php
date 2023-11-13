<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'price'             => $this->price,
            'discount'          => $this->discount,
            'gst'               => $this->gst,
            'description'       => $this->description,
            'meta_title'        => $this->meta_title,
            'meta_description'  => $this->meta_description,
            'meta_keywords'     => $this->meta_keywords,
            'is_featured'       => $this->is_featured ? 'Is Featured' : '-',
            'is_best_seller'    => $this->is_best_seller ? 'Is Best Seller' : '-',
            'is_active'         => $this->active ? 'Active' : 'Not-active',

            'category'          => $this->category->load(['parentCategory:id,name', 'subCategories:id,name']),
        ];
    }
}
