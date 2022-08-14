<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $rules = [
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email',
                "unique:users,email,{$this->id},id",
            ]
        ];

        if ($this->user()->can('users_create')) {
            $rules['role_id'] = [
                'required',
                'exists:roles,id',
            ];
        }

        return $rules;
    }
}
