<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;
use DB;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employe::latest()->paginate(10);
  
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
     *
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        
        $employee = DB::table('employee')->where('id',$id)->first();
        return view ('employees.edit', compact('employee'));
      
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
  
        
        DB::table('employee')->where ('id', $id)->update([
            'Name'=>$request->Name,
            'email'=>$request->email,
            'profile'=>$request->profile,
        ]);
        return redirect('employee')->with('status', 'Profile updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('employee')->where('id', $id)->delete();
        return back()->with('post dleted sucessfully');
    }

}
