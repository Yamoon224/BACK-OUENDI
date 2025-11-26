<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'status'            => $this->status,
            'role'              => $this->role,
            'cni_path'          => $this->cni_path,
            'student_card_path' => $this->student_card_path,
            'created_at'        => $this->created_at,
        ];
    }
}
