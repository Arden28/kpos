<?php

namespace Modules\People\Http\Controllers;

use Modules\People\DataTables\CustomersDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\People\Entities\Customer;
use Modules\People\Http\Requests\Customer\StoreCustomerRequest;
use Modules\People\Http\Requests\Customer\UpdateCustomerRequest;
use Modules\People\Interfaces\CustomerInterface;

class CustomersController extends Controller
{

    protected $customerRepository;

    public function __construct(CustomerInterface $customerRepository){

        $this->customerRepository = $customerRepository;
    }

    public function index(CustomersDataTable $dataTable) {
        abort_if(Gate::denies('access_customers'), 403);

        return $dataTable->render('people::customers.index');
    }


    public function create() {
        abort_if(Gate::denies('create_customers'), 403);

        return view('people::customers.create');
    }


    public function store(StoreCustomerRequest $request) {
        abort_if(Gate::denies('create_customers'), 403);

        // Create Customer
        $this->customerRepository->create($request->validated());

        toast('Customer Created!', 'success');

        return redirect()->route('customers.index');
    }

    public function modalStore(StoreCustomerRequest $request){
        abort_if(Gate::denies('create_customers'), 403);

        // Create Customer
        $this->customerRepository->create($request->validated());

        return redirect()->route('app.pos.index');
    }

    public function show(Customer $customer) {
        abort_if(Gate::denies('show_customers'), 403);

        return view('people::customers.show', compact('customer'));
    }


    public function edit(Customer $customer) {
        abort_if(Gate::denies('edit_customers'), 403);

        return view('people::customers.edit', compact('customer'));
    }


    public function update(UpdateCustomerRequest $request, Customer $customer) {
        abort_if(Gate::denies('update_customers'), 403);

        // Edit a customer
        $this->customerRepository->edit($request->validated(), $customer);

        toast('Customer Updated!', 'info');

        return redirect()->route('customers.index');
    }


    public function destroy(Customer $customer) {
        abort_if(Gate::denies('delete_customers'), 403);

        $customer->delete();

        toast('Customer Deleted!', 'warning');

        return redirect()->route('customers.index');
    }
}
