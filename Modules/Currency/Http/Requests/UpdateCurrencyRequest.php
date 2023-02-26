<?php

namespace Modules\Currency\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'currency_name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
            'thousand_separator' => 'required|string|max:255',
            'decimal_separator' => 'required|string|max:255',
            'exchange_rate' => 'nullable|numeric|max:2147483647'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('edit_currencies');
    }
}
