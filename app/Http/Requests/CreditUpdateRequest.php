<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id'       => 'sometimes|exists:users,id',
            'amount'        => 'sometimes|numeric|min:0',
            'status'        => 'sometimes|in:pending,approved,rejected',
            'request_at'    => 'nullable|date',
            'approval_at'   => 'nullable|date|after_or_equal:request_at',
            'rejection_at'  => 'nullable|date|after_or_equal:request_at',
        ];
    }
}
