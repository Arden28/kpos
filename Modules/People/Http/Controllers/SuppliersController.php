<?php

namespace Modules\People\Http\Controllers;

use Modules\People\DataTables\SuppliersDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\People\Entities\Supplier;
use Modules\People\Http\Requests\Supplier\StoreSupplierRequest;
use Modules\People\Http\Requests\Supplier\UpdateSupplierRequest;
use Modules\People\Interfaces\SupplierInterface;

class SuppliersController extends Controller
{

    protected $supplierRepository;

    public function __construct(SupplierInterface $supplierRepository){

        $this->supplierRepository = $supplierRepository;
    }


    public function index(SuppliersDataTable $dataTable) {
        abort_if(Gate::denies('access_suppliers'), 403);

        return $dataTable->render('people::suppliers.index');
    }


    public function create() {
        abort_if(Gate::denies('create_suppliers'), 403);

        return view('people::suppliers.create');
    }


    public function store(StoreSupplierRequest $request) {
        abort_if(Gate::denies('create_suppliers'), 403);

        // Create a new Supplier
        $this->supplierRepository->create($request->validated());

        toast('Supplier Created!', 'success');

        return redirect()->route('suppliers.index');
    }


    public function modalStore(StoreSupplierRequest $request) {
        abort_if(Gate::denies('create_suppliers'), 403);

        // Create a new Supplier
        $this->supplierRepository->create($request->validated());

        toast('Supplier Created!', 'success');

        // return redirect()->route('suppliers.index');
    }

    public function show(Supplier $supplier) {
        abort_if(Gate::denies('show_suppliers'), 403);

        return view('people::suppliers.show', compact('supplier'));
    }


    public function edit(Supplier $supplier) {
        abort_if(Gate::denies('edit_suppliers'), 403);

        return view('people::suppliers.edit', compact('supplier'));
    }


    public function update(UpdateSupplierRequest $request, Supplier $supplier) {
        abort_if(Gate::denies('edit_suppliers'), 403);

        // Edit Suppliers
        $this->supplierRepository->edit($request->validated(), $supplier);

        toast('Supplier Updated!', 'info');

        return redirect()->route('suppliers.index');
    }


    public function destroy(Supplier $supplier) {
        abort_if(Gate::denies('delete_suppliers'), 403);

        $supplier->delete();

        toast('Supplier Deleted!', 'warning');

        return redirect()->route('suppliers.index');
    }
}
