<?php

namespace Modules\People\Repositories;

use App\Traits\CompanySession;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\People\Entities\Supplier;
use Modules\People\Interfaces\SupplierInterface;

class SupplierRepository implements SupplierInterface
{
    use CompanySession;

    public function getSuppliers($company){
        return Supplier::where('company_id', $company)->get();
    }
    // Create a new supplier
    public function create($request){

        Supplier::create([
            'company_id'     => Auth::user()->currentCompany->id,
            'supplier_name'  => $request['supplier_name'],
            'supplier_phone' => empty($request['supplier_phone']) ? '+242064074926' : $request['supplier_phone'],
            'supplier_email' => empty($request['supplier_email']) ? 'fournisseur@koverae.com' : $request['supplier_email'],
            'city'           => empty($request['city']) ? 'Brazzaville' : $request['city'],
            'country'        => empty($request['country']) ? 'République du Congo' : $request['country'],
            'address'        => empty($request['address']) ? 'Ave de france' : $request['address']
        ]);
    }

    // Edit a supplier
    public function edit($request, $supplier){

        $supplier->update([
            'supplier_name'  => $request['supplier_name'],
            'supplier_phone' => $request['supplier_phone'],
            'supplier_email' => $request['supplier_email'],
            'city'           => $request['city'],
            'country'        => $request['country'],
            'address'        => $request['address']
        ]);
    }
}
