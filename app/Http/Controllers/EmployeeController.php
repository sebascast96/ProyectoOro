<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        return view('employees.index');
    }

    public function createDatatable()
    {
        $employees = Employee::query();
        return Datatables::of($employees)
        ->addColumn('actions', function ($employee) {
            return view('employees.buttons',compact('employee'));
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
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->except('_token'));
        $pass = '123456';
        $user = User::create([
            'name'=>$employee->name,
            'email'=>$employee->email,
            'password'=>Hash::make($pass),
            'employee_id'=>$employee->id
        ]);
        $user->assignRole('employee');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee, 200);
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
        Employee::where('id', $request->id)->update($request->except('_token'));
        return view('employees.index')->with(['message' => 'Guardado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $user = User::where('employee_id','=',$employee->id)->first();
        $user->delete();
        $employee->delete();
    }
}
