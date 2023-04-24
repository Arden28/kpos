<?php

namespace Modules\Financial\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AccountBookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account_id' => 'required|numeric|gt:0',
            'amount' => 'required',
            'date' => 'required',
            'note' => 'max:150',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
