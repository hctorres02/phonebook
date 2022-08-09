<?php

namespace App\Http\Requests;

use App\Helpers\NumberStatus;
use Illuminate\Foundation\Http\FormRequest;

class NumberRequest extends FormRequest
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
        $statuses = join(',', NumberStatus::toArray());

        return [
            'customer_id' => [
                'required',
                'exists:customers,id',
            ],
            'number' => [
                'required',
                'digits_between:8,14',
            ],
            'status' => [
                'required',
                "in:{$statuses}",
            ],
        ];
    }
}
