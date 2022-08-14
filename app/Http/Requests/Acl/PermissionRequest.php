<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->mergeIfMissing([
            'enabled' => false,
        ]);
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:191',
                "unique:permissions,name,{$this->id},id",
            ],
            'description' => [
                'nullable',
                'max:255',
            ],
            'enabled' => [
                'boolean',
            ],
        ];
    }
}
