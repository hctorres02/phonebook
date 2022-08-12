<?php

namespace App\Http\Requests\Acl;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'enabled' => false,
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
