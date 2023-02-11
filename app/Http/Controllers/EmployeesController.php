<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('id' , 'asc')->paginate(10);
        return view('employees' , compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('id' , 'asc')->get();
        return view('add_emp' , compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
        ]);

        $is_valid_email = Employee::where('email' , $request->email)->get();
        if(count($is_valid_email) == 0){
            $emp = new Employee();
            $emp->first_name = $request->first_name;
            $emp->last_name = $request->last_name;
            $emp->company_id = $request->company;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->save();
            return redirect('/getEmployees')->with('message', 'Employee added successfully');
        }else{
            return redirect()->back()->withErrors(['error' => 'Email already exist !']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::join('companies' , 'employees.company_id' , 'companies.id')
                              ->where('employees.id' , $id)
                              ->select('companies.name' , 'companies.email as c_email' ,
                                       'companies.logo','employees.*')
                              ->get()
                              ->first();
        return view('employee_details' , compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::orderBy('id' , 'asc')->get();
        return view('employee' , compact('employee' , 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
        ]);

        $is_valid_email = Employee::where('email' , $request->email)->get();
        if(count($is_valid_email) == 0){
            $emp = Employee::find($id);
            $emp->first_name = $request->first_name;
            $emp->last_name = $request->last_name;
            $emp->email = $request->email;
            $emp->phone = $request->phone;
            $emp->company_id = $request->company;
            $emp->save();
            return redirect('/getEmployees')->with('message', 'Employee updated successfully');
        }else{
            return redirect()->back()->withErrors(['error' => 'Email already exist !']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect()->back()->with('message', 'Employee deleted successfully');
        //return redirect()->back()->withSuccess('IT WORKS!');
    }
}
