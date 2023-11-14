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
            'unit_price'        => $this->unit_price,
            'qty'               => $this->qty,
            'status'            => $this->status,
            'grand_total'       => $this->grand_total,
            'item'              => $this->item,
        ];
    }
}