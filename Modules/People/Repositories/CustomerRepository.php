<?php

namespace Modules\People\Repositories;

use App\Traits\CompanySession;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\User;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\People\Entities\Customer;
use Modules\People\Interfaces\CustomerInterface;

class CustomerRepository implements CustomerInterface
{
    use CompanySession;

    public function getCustomers($company){

        return Customer::where('company_id', $company)->get();
    }
    // Create a new customer
    public function create($request){

        Customer::create([
            'company_id'     => $this->getCompanyCurrentSession(),
            'customer_name'  => $request['customer_name'],
            'customer_phone' => $request['customer_phone'],
            'customer_email' => $request['customer_email'],
            'city'           => $request['city'],
            'country'        => $request['country'],
            'address'        => $request['address']
        ]);
    }

    // Edit a customer
    public function edit($request, $customer){

        $customer->update([
            'customer_name'  => $request['customer_name'],
            'customer_phone' => $request['customer_phone'],
            'customer_email' => $request['customer_email'],
            'city'           => $request['city'],
            'country'        => $request['country'],
            'address'        => $request['address']
        ]);
    }
}
