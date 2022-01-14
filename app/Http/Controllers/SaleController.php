<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SaleController extends Controller
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
        return view('sales.index');
    }

    public function createDatatable()
    {
        $sales = Sale::query();
        return Datatables::of($sales)
            ->addColumn('actions', function ($sale) {
                return view('sales.buttons', compact('sale'));
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
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        dd("Hola");
        Sale::create($request->except('_token'));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id)->with('employee', 'seller', 'products', 'client')->first();
        return view('sales.show', compact('sale'));
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
        Sale::where('id', $request->id)->update($request->except('_token'));
        return view('sales.index')->with(['message' => 'Guardado']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::find($id);
        $sale->delete();
    }
    /**
     * Open sales dashboard
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $products = Product::all();
        return view('sales.dashboard', ['products' => $products]);
    }
    /**
     * Open sales dashboard
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function fillProductsSelect()
    {
        $clients = Product::all();
        return $clients->toJson();
    }
    /**
     * Open sales dashboard
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function finish()
    {
        $sale = Sale::all();
        return view('sales.finished-sale');
    }
}
