<?php

namespace Modules\People\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|max:255',
            'customer_email' => 'required|email|max:255',
            'city'           => 'required|string|max:255',
            'country'        => 'required|string|max:255',
            'address'        => 'required|string|max:500',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create_customers');
    }
}
