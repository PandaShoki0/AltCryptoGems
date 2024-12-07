<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoinPairRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'trade_category_id'     => ['required'],
            'name'                  => ['required'],
            'fromsym'               => ['required'],
            'tosym'                 => ['required'],
            'step'                  => ['required'],
            'minimum'               => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'trade_category_id.required'    => 'Trade Category is required.',
            'name.required'                 => 'Pair Name is required.',
            'fromsym.required'              => 'From Pair is required.',
            'tosym.required'                => 'To Pair is required.',
            'step.required'                 => 'Increase By is required.',
            'minimum.required'              => 'Minimum Trade Amount is required.',
        ];
    }
}
