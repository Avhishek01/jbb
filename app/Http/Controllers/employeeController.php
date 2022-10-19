<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;
use DB;
use Illuminate\Support\Facades\Auth;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        
        $employees = employe::latest()->where('employee_id','=',$id)->paginate(10);
  
        return view('employees.index',compact('employees'));
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
        $validate = $request->validate([
            'Name'=> 'required|alpha',
            'email'=> 'required|email',
            'profile'=> 'required'
        ]);
        $employee = new employe;
        $employee->Name=$request->Name;
        $employee->email=$request->email;
        $employee->profile=$request->profile;
        $employee->employee_id=auth()->user()->id;
        $employee->save();
        
        return redirect('employee')->with('status', 'Profile updated!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employe  $employee
     * @return \Illuminate\Http\Response
     */
   
    public function edit(employe $employee)
    { 
       if($employee->employee_id != Auth::id()){
        abort(403);
       }
       
        return view ('employees.edit', compact('employee'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \App\employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employe $employee)
    {
         $request->validate([
            'Name'=> 'required',
            'email'=> 'required|email',
            'profile'=> 'required'
        ]);
        // dd($request->id);
        $employee->update($request->all());
        return redirect()->route('employee.index')->with('status', 'Profile updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employe $employee)
    {
        
        if($employee->employee_id != Auth::id()){
            abort(403);
           }
        $employee->delete();
        return redirect()->route('employee.index')->with('post dleted sucessfully');
    }

}
