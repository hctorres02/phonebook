<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function prepareForValidation()
    {
        $this->mergeIfMissing([
            'permissions' => [],
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:191',
                "unique:roles,name,{$this->id},id",
            ],
            'description' => [
                'nullable',
                'max:255',
            ],
            'permissions_ids' => [
                'array',
            ],
            'permissions_ids.*' => [
                'exists:permissions,id',
            ]
        ];
    }
}
