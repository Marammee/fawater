<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\Random;

class BillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'bill_id' => $this->id,
            'bill_title' => $this->title,
            'bill_number' => $this->bill_number,
            'bill_details' => $this->details,
            'bill_amount' => $this->amount,
            'favorite' => $this->favorite,
            // 'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            // 'user_id' => $this->user_id,
            'bill_image' => $this->image,
            'created_at' => $this->created_at,
            // 'category' => $this->whenLoaded('category'),
            // 'user' => $this->whenLoaded('user'),
        ];
    }
}
