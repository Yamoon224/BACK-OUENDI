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
            'level_class'       => $this->level_class,
            'university'        => $this->university,
            'cni_path'          => app_env('url') . '/' . $this->cni_path,
            'student_card_path' => app_env('url') . '/' . $this->student_card_path,
            'photo'             => app_env('url') . '/' . $this->photo,
            'created_at'        => $this->created_at,
        ];
    }
}
