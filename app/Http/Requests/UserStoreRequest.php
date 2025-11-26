<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'last_name'         => 'required|string|max:50',
            'first_name'        => 'required|string|max:50',
            'email'             => 'nullable|email|max:100|unique:users,email',
            'phone'             => 'required|string|max:100|unique:users,phone',
            'password'          => 'required|string|min:4',
            'status'            => 'required|in:ENABLE,DISABLE',
            'role'              => 'required|in:student,admin',
            'level_class'       => 'nullable|in:LICENCE I,LICENCE II,LICENCE III,MASTER I,MASTER II,DOCTORAT',
            'university'        => 'nullable|string|max:255',
            'cni_path'          => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'student_card_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'photo'             => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
        ];
    }
}
