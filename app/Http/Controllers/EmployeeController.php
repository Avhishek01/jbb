<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;
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
        $user = Auth::user();
        $employees = $user->employees;
       
         // $id = Auth::user()->id;
       // $employees = Employe::latest()->where('employee_id','=',$id)->paginate(10);
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
            'Name'=> 'required',
            'email'=> 'required|email',
            'profile'=> 'required',
            'age'=> 'required|int',
            'gender'=> 'required|alpha'
            
        ]);
        $employee = new Employe;
        $employee->Name=$request->Name;
        $employee->email=$request->email;
        $employee->profile=$request->profile;
        $employee->age=$request->age;
        $employee->gender=$request->gender;
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
   
    public function edit(Employe $employee)
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
    public function update(Request $request, Employe $employee)
    {
         $request->validate([
            'Name'=> 'required',
            'email'=> 'required|email',
            'profile'=> 'required',
            'age'=> 'required|int',
            'gender'=>'required|alpha'
        ]);
        
        $employee->update($request->all());
        if($employee->employee_id != Auth::id()){
            abort(403);
           }
        return redirect()->route('employee.index')->with('status', 'Profile updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\employe  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employee)
    {
        
        if($employee->employee_id != Auth::id()){
            abort(403);
           }
        $employee->delete();
        return redirect()->route('employee.index')->with('post dleted sucessfully');
    }

}
