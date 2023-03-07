<?php

namespace Modules\Currency\Repositories;

use App\Traits\CompanySession;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Currency\Entities\Currency;
use Modules\Currency\Interfaces\CurrencyInterface;
use Stringable;

class CurrencyRepository implements CurrencyInterface
{
    use CompanySession;

    // Get all currencies depends on the current company
    public function getCurrencies($company){

        return Currency::where('company_id', $company)->get();

    }
    // Create a new supplier
    public function create($request){


        Currency::create([

            'company_id'    => Auth::user()->currentCompany->id,

            'currency_name' => $request['currency_name'],
            'code' => Str::upper($request['code']),
            'symbol' => $request['symbol'],
            'thousand_separator' => $request['thousand_separator'],
            'decimal_separator' => $request['decimal_separator'],
            // 'exchange_rate' => $request['exchange_rate']
        ]);
    }

    // Edit a supplier
    public function edit($request, $currency){

        $currency->update([
            'currency_name' => $request['currency_name'],
            'code' => Str::upper($request['code']),
            'symbol' => $request['symbol'],
            'thousand_separator' => $request['thousand_separator'],
            'decimal_separator' => $request['decimal_separator'],
            // 'exchange_rate' => $request['exchange_rate']
        ]);
    }
}
