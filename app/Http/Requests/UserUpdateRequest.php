<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user') 
                ?? $this->route('student') 
                ?? $this->route('id'); // Assurez-vous que votre route utilise un paramètre nommé 'user'

        return [
            'last_name'         => 'nullable|string|max:50',
            'first_name'        => 'nullable|string|max:50',
            'email'             => 'nullable|email|max:100|unique:users,email,'.$userId.'|max:100',
            'phone'             => 'sometimes|string|max:100|unique:users,phone,'.$userId.'|max:100',
            'password'          => 'sometimes|string|min:4',
            'status'            => 'sometimes|in:ENABLE,DISABLE',
            'role'              => 'sometimes|in:student,admin',
            'level_class'       => 'nullable|in:LICENCE I,LICENCE II,LICENCE III,MASTER I,MASTER II,DOCTORAT',
            'university'        => 'nullable|string|max:255',
            'cni_path'          => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'student_card_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'photo'             => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
        ];
    }
}
