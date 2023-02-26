<?php

namespace App\Http\Requests\Common\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('access_settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            // 'company_phone' => 'required|string|max:255',
            // 'notification_email' => 'required|email|max:255|unique:companies',
            // 'company_address' => 'required|string|max:500',
            // 'default_currency_id' => 'required|numeric',
        ];
    }
}
