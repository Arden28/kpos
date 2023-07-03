<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Modules\Product\DataTables\UnitsDataTable;
use Modules\Product\Entities\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(UnitsDataTable $dataTable)
    {
        abort_if(Gate::denies('access_products'), 403);

        return $dataTable->render('product::units.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('access_products'), 403);

        $request->validate([
            'unit_name' => 'required',
            'unit_short_name' => 'required',
            'is_decimal' => 'required|boolean',
            'is_multiple' => 'nullable|boolean',
            'parent_unit_id' => 'nullable',
            'value' => 'nullable|numeric'
        ]);

        Unit::create([
            'unit_name' => $request->unit_name,
            'unit_short_name' => $request->unit_short_name,
            'is_decimal' => $request->is_decimal,
            'is_multiple' => $request->is_multiple,
            'parent_unit_id' => $request->parent_unit_id,
            'value' => $request->value,
            'company_id' => Auth::user()->currentCompany->id,
        ]);

        toast("L'unité de produit a été ajoutée!", 'success');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        abort_if(Gate::denies('access_products'), 403);

        $category = Unit::where('company_id', Auth::user()->currentCompany->id)->findOrFail($id);

        return view('product::units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('access_products'), 403);

        $unit = Unit::findOrFail($id);

        // if ($category->products()->isNotEmpty()) {
        //     return back()->withErrors('Can\'t delete beacuse there are products associated with this category.');
        // }

        $unit->delete();

        toast('L\'unité de produit a été supprimée!', 'warning');

        return redirect()->route('product-units.index');
    }

}
