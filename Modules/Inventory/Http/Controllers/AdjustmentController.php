<?php

namespace Modules\Inventory\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Inventory\DataTables\AdjustmentsDataTable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Modules\Inventory\Entities\AdjustedProduct;
use Modules\Inventory\Entities\Adjustment;
use Modules\Inventory\Entities\Product;
use Modules\Inventory\Notifications\NotifyQuantityAlert;

class AdjustmentController extends Controller
{

    public function index(AdjustmentsDataTable $dataTable) {
        abort_if(Gate::denies('access_adjustments'), 403);

        return $dataTable->render('inventory::adjustments.index');
    }


    public function create() {
        abort_if(Gate::denies('create_adjustments'), 403);

        return view('inventory::adjustments.create');
    }


    public function store(Request $request) {
        abort_if(Gate::denies('create_adjustments'), 403);

        $request->validate([
            'reference'   => 'required|string|max:255',
            'date'        => 'required|date',
            'note'        => 'nullable|string|max:1000',
            'product_ids' => 'required',
            'quantities'  => 'required',
            'types'       => 'required'
        ]);

        DB::transaction(function () use ($request) {
            $adjustment = Adjustment::create([
                'company_id'  => Auth::user()->currentCompany->id,

                'date' => $request->date,
                'note' => $request->note
            ]);

            foreach ($request->product_ids as $key => $id) {
                AdjustedProduct::create([
                    'adjustment_id' => $adjustment->id,
                    'product_id'    => $id,
                    'quantity'      => $request->quantities[$key],
                    'type'          => $request->types[$key]
                ]);

                $product = Product::findOrFail($id);

                if ($request->types[$key] == 'add') {
                    $product->update([
                        'product_quantity' => $product->product_quantity + $request->quantities[$key]
                    ]);
                } elseif ($request->types[$key] == 'sub') {
                    $product->update([
                        'product_quantity' => $product->product_quantity - $request->quantities[$key]
                    ]);
                }
            }
        });

        toast('L\'ajustement a été effectué !', 'success');

        return redirect()->route('adjustments.index');
    }


    public function show(Adjustment $adjustment) {
        abort_if(Gate::denies('show_adjustments'), 403);

        return view('inventory::adjustments.show', compact('adjustment'));
    }


    public function edit(Adjustment $adjustment) {
        abort_if(Gate::denies('edit_adjustments'), 403);

        return view('inventory::adjustments.edit', compact('adjustment'));
    }


    public function update(Request $request, Adjustment $adjustment) {
        abort_if(Gate::denies('edit_adjustments'), 403);

        $request->validate([
            'reference'   => 'required|string|max:255',
            'date'        => 'required|date',
            'note'        => 'nullable|string|max:1000',
            'product_ids' => 'required',
            'quantities'  => 'required',
            'types'       => 'required'
        ]);

        DB::transaction(function () use ($request, $adjustment) {
            $adjustment->update([
                'reference' => $request->reference,
                'date'      => $request->date,
                'note'      => $request->note
            ]);

            foreach ($adjustment->adjustedProducts as $adjustedProduct) {
                $product = Product::findOrFail($adjustedProduct->product->id);

                if ($adjustedProduct->type == 'add') {
                    $product->update([
                        'product_quantity' => $product->product_quantity - $adjustedProduct->quantity
                    ]);
                } elseif ($adjustedProduct->type == 'sub') {
                    $product->update([
                        'product_quantity' => $product->product_quantity + $adjustedProduct->quantity
                    ]);
                }

                $adjustedProduct->delete();
            }

            foreach ($request->product_ids as $key => $id) {
                AdjustedProduct::create([
                    'adjustment_id' => $adjustment->id,
                    'product_id'    => $id,
                    'quantity'      => $request->quantities[$key],
                    'type'          => $request->types[$key]
                ]);

                $product = Product::findOrFail($id);

                if ($request->types[$key] == 'add') {
                    $product->update([
                        'product_quantity' => $product->product_quantity + $request->quantities[$key]
                    ]);
                } elseif ($request->types[$key] == 'sub') {
                    $product->update([
                        'product_quantity' => $product->product_quantity - $request->quantities[$key]
                    ]);
                }
            }
        });

        toast('L\'ajustement a été mis à jours !', 'info');

        return redirect()->route('adjustments.index');
    }


    public function destroy(Adjustment $adjustment) {
        abort_if(Gate::denies('delete_adjustments'), 403);

        $adjustment->delete();

        toast('L\'ajustement a été supprimé !', 'warning');

        return redirect()->route('adjustments.index');
    }
}