<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'url'               => $this->url,
            'discount'          => $this->discount,
            'description'       => $this->description,
            'meta_title'        => $this->meta_title,
            'meta_description'  => $this->meta_description,
            'meta_keywords'     => $this->meta_keywords,
            'is_active'         => $this->is_active ? 'Active' : 'Not-active',
            'createdAt'         => Carbon::parse($this->created_at)->format('Y-m-d'),

            'parent_category'       => $this->parentCategory,
            'children_categories'   => $this->subCategories,
        ];
    }
}
