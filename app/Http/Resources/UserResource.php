<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Nette\Utils\Random;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_name' => $this->name,
            'user_email' => $this->email,
            'user_dob' => $this->dob,
            'user_phone' => $this->phone,
            'user_account' => $this->account,
            // 'email_verified_at' => $this->email_verified_at,
            'user_image' => $this->profile_photo_path,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
