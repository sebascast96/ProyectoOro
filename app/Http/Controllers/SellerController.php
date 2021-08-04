<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
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
        return view('sellers.index');
    }

    public function createDatatable()
    {
        $sellers = Seller::query();
        return Datatables::of($sellers)
        ->addColumn('actions', function ($seller) {
            return view('sellers.buttons',compact('seller'));
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
        return view('sellers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seller = Seller::create($request->except('_token'));
        $pass = '123456';
        $user = User::create([
            'name'=>$seller->name,
            'email'=>$seller->email,
            'password'=>Hash::make($pass),
            'seller_id'=>$seller->id
        ]);
        $user->assignRole('seller');
        return redirect()->Route('sellers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = Seller::find($id);
        return response()->json($seller, 200);
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
        Seller::where('id', $request->id)->update($request->except('_token'));
        return view('sellers.index')->with(['message' => 'Guardado']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::find($id);
        $user = User::where('seller_id','=',$seller->id)->first();
        $user->delete();
        $seller->delete();
    }
}
