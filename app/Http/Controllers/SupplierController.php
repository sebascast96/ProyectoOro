<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Http\RedirectResponse;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->createDatatable();
        }
        return view('suppliers.index');
    }

    public function fillSelect(Request $request)
    {
        $suppliers = Supplier::all();
        return $suppliers->toJson();
    }

    public function link(Request $request)
    {
        $supplier = Supplier::find($request->supplier);
        $supplier->products()->attach($request->idl);
        return back();
    }

    public function createDatatable()
    {
        $suppliers = Supplier::query();
        return Datatables::of($suppliers)
        ->addColumn('actions', function ($supplier) {
            return view('suppliers.buttons',compact('supplier'));
         })
         ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Supplier::create($request->except('_token'));
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Supplier::where('id', $request->id)->update($request->except('_token'));
        return view('suppliers.index')->with(['message' => 'Guardado']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
    }

    /**
     * Remove the link between product and supplier.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(int $id, Request $request)
    {
        $sup = Supplier::find($id);
        $sup->products()->detach($request->product_id);

    }
}
