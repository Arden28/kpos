<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $productIdRule =   Rule::unique('products')->where(function ($query) {
            $companyId = Auth::user()->currentCompany->id;
            $query->where('company_id', $companyId);
        });

        return [
            'company_id' => ['required', 'integer'],
            'product_name' => ['required', 'string', 'max:255'],
            'product_code' => ['required', 'string', 'max:255', $productIdRule],
            'product_barcode_symbology' => ['required', 'string', 'max:255'],

            'supplier_id' => ['integer'],
            'is_wholesale' => ['boolean'],
            'wholesale_multiplier' => ['integer', 'gt:0'],

            // 'product_unit' => ['required', 'string', 'max:255'],
            'unit_id' => ['required', 'integer'],
            'product_quantity' => ['required', 'integer', 'min:1'],
            'product_cost' => ['required', 'numeric', 'max:2147483647'],
            'product_price' => ['required', 'numeric', 'max:2147483647'],
            'product_stock_alert' => ['required', 'integer', 'min:0'],
            'product_order_tax' => ['nullable', 'integer', 'min:0', 'max:100'],
            'product_tax_type' => ['nullable', 'integer'],
            'product_note' => ['nullable', 'string', 'max:1000'],
            'category_id' => ['required', 'integer']
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create_products');
    }
}
