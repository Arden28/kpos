<?php

namespace Modules\Pos\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Pos\DataTables\PosSessionDataTable;
use Modules\Pos\DataTables\SinglePosSessionDataTable;
use Modules\Pos\Entities\PhysicalPosSession;

class PosSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(PosSessionDataTable $dataTable){
        abort_if(Gate::denies('access_sales'), 403);

        return $dataTable->render('pos::pos.sessions.index');

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pos::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(SinglePosSessionDataTable $dataTable, $pos)
    {
        abort_if(Gate::denies('access_pos'), 403);

        $dataTable = new SinglePosSessionDataTable($pos);
        return $dataTable->render('pos::pos.sessions.index', [
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

        $category = PhysicalPosSession::findOrFail($id);

        $category->delete();

        toast('La session a bien été supprimée !', 'warning');

        // return redirect()->route('app.pos.session.single');
        return redirect()->back();
    }
}
