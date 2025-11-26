<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CreditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'amount'        => $this->amount,
            'status'        => $this->status,
            'request_at'    => $this->request_at,
            'approval_at'   => $this->approval_at,
            'rejection_at'  => $this->rejection_at,
            'user'          => new UserResource($this->whenLoaded('user')),
        ];
    }
}
