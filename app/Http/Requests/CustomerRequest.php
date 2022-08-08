<?php

namespace App\Http\Requests;

use App\Helpers\CustomerStatus;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $statuses = join(',', CustomerStatus::toArray());

        return [
            'name' => [
                'required',
                'max:255',
            ],
            'document' => [
                'required',
                'min:6',
                'max:12',
            ],
            'status' => [
                'required',
                "in:{$statuses}",
            ],
        ];
    }
}
