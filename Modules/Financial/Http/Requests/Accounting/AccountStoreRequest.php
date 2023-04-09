<?php

namespace Modules\Financial\Http\Requests\Accounting;

use Illuminate\Foundation\Http\FormRequest;

class AccountStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            // 'company_id' => ['required', 'integer'],
            'account_name' => ['required', 'string', 'max:150'],
            'number' => ['required', 'string', 'max:255'],
            'type_id' => ['nullable', 'string', 'gt:0'],
            'balance' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:255'],
            // 'user_id' => ['required', 'integer'],
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
