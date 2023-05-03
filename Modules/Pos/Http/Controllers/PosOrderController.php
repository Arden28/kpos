<?php

namespace Modules\Pos\Http\Controllers;

use App\Traits\CompanySession;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Pos\DataTables\PosOrderDataTable;
use Modules\Pos\DataTables\SinglePosOrderDataTable;
use Modules\Sale\Interfaces\SaleInterface;

class PosOrderController extends Controller
{
    use CompanySession;

    protected $saleRepository;

    public function __construct(SaleInterface $saleRepository){

        $this->saleRepository = $saleRepository;
    }

    public function index(PosOrderDataTable $dataTable){
        abort_if(Gate::denies('access_pos'), 403);

        return $dataTable->render('pos::pos.orders.list');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(SinglePosOrderDataTable $dataTable, $pos) {
        abort_if(Gate::denies('access_pos'), 403);

        $dataTable = new SinglePosOrderDataTable($pos);
        return $dataTable->render('pos::pos.orders.index', [
            'pos' => $pos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pos::edit');
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
        //
    }
}
