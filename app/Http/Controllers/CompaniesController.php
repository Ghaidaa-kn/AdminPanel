<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use App\Models\Company;
use App\Models\Employee;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //'image' => 'dimensions:min_width=100,min_height=200,dimensions:3/2'
        $companies = Company::orderBy('id' , 'asc')->paginate(10);
        return view('companies' , compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_comp');
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
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image | dimensions:min_width=100,min_height=100'
        ]);

        $is_valid_email = Company::where('email' , $request->email)->get();
        if(empty($is_valid_email)){
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $logo = 'logo'.'_'.$request->name.'_'.time().'.'. $ext;
                $file->storeAs('public/' , $logo);      
            }else{
                $logo = null;
            }
            
            $comp = new Company();
            $comp->name = $request->name;
            $comp->email = $request->email;
            $comp->website = $request->website;
            $comp->logo = $request->logo;
            $comp->save();
            return redirect('/getCompanies')->with('message', 'Company added successfully');
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
        $company = Company::find($id);
        $employees = Company::join('employees' , 'companies.id' , 'employees.company_id')
                            ->where('companies.id' , $id)
                            ->select('employees.*')
                            ->paginate(10);
        return view('company_details' , compact('company' , 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company' , compact('company'));
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
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image | dimensions:min_width=100,min_height=100'
        ]);

        $comp = Company::find($id);

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $logo = 'logo'.'_'.$request->name.'_'.time().'.'. $ext;
            if(!is_null($comp->logo)){
                unlink(public_path().'/storage/'.$comp->logo);
            }
            $file->storeAs('public/' , $logo);  
        }else{
            $logo = $comp->logo;
        }

        $comp->name = $request->name;
        $comp->email = $request->email;
        $comp->website = $request->website;
        $comp->logo = $logo;
        $comp->save();
        return redirect('/getCompanies')->with('message', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comp = Company::find($id);
        $employees = Employee::where('company_id' , $id)->get();
        foreach ($employees as $employee) {
            Employee::destroy($employee->id);
        }
        if(!is_null($comp->logo)){
            unlink(public_path().'/storage/'.$comp->logo);
        }
        Company::destroy($id);
        return redirect()->back()->with('message', 'Company deleted successfully');
    }
}
