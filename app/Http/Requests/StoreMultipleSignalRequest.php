<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleSignalRequest extends FormRequest
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
            'trade_type'        => ['required'],
            'amount_from'       => ['required'],
            'amount_to'         => ['required', 'gt:amount_from'],
            'number_of_trades'  => ['required'],
            'symbols.*'         => ['required'],
            'trade_intervals.*' => ['required'],
            'user_id.*'         => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'trade_type.required'           => 'Trade Type is required.',
            'amount_from.required'          => 'Amount Range From is required.',
            'amount_to.required'            => 'Amount Range To is required.',
            'amount_to.gt'                  => 'Amount Range To must be greater than Amount Range From.',
            'number_of_trades.required'     => 'Number of Trades to Generate is required.',
            'symbols.*.required'            => 'Symbols is required.',
            'trade_intervals.*.required'    => 'Intervals is required.',
            'user_id.*.required'            => 'Users is required.',
        ];
    }
}
