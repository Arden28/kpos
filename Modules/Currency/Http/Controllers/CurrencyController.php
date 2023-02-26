<?php

namespace Modules\Currency\Http\Controllers;

use Modules\Currency\DataTables\CurrencyDataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\Currency\Entities\Currency;
use Modules\Currency\Http\Requests\StoreCurrencyRequest;
use Modules\Currency\Http\Requests\UpdateCurrencyRequest;
use Modules\Currency\Interfaces\CurrencyInterface;

class CurrencyController extends Controller
{

    protected $currencyRepository;

    public function __construct(CurrencyInterface $currencyRepository){

        $this->currencyRepository = $currencyRepository;
    }
    public function index(CurrencyDataTable $dataTable) {
        abort_if(Gate::denies('access_currencies'), 403);

        return $dataTable->render('currency::index');
    }


    public function create() {
        abort_if(Gate::denies('create_currencies'), 403);

        return view('currency::create');
    }


    public function store(StoreCurrencyRequest $request) {
        abort_if(Gate::denies('create_currencies'), 403);

        // Create a new currency
        $this->currencyRepository->create($request->validated());

        toast('Currency Created!', 'success');

        return redirect()->route('currencies.index');
    }


    public function edit(Currency $currency) {
        abort_if(Gate::denies('edit_currencies'), 403);

        return view('currency::edit', compact('currency'));
    }


    public function update(UpdateCurrencyRequest $request, Currency $currency) {
        abort_if(Gate::denies('edit_currencies'), 403);

        $this->currencyRepository->edit($request->validated(), $currency);

        toast(__('Currency Updated!'), 'info');

        return redirect()->route('currencies.index');
    }


    public function destroy(Currency $currency) {
        abort_if(Gate::denies('delete_currencies'), 403);

        $currency->delete();

        toast('Currency Deleted!', 'warning');

        return redirect()->route('currencies.index');
    }
}
