<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'user'              => $this->user,
            'discount'          => $this->discount,
            'status'            => $this->status,
            'grand_price'       => $this->grand_price,
            'items'             => $this->items()->count() > 0 ? $this->load(['items']) : 'No Items Yet'
        ];
    }
}
