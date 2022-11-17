<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Mobile;
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
        //alternate method when relation with more morethan three models
        $users = User::all();
        //filter method
        // dd($users->filter(function($item){
        //     return $item['name'][0] == 'M';
        // })->toArray());

        //group by method
        // dd($users->groupBy('id')  );
        // $users->all();

        // where method
        // dd($employee= $users->where('id' , 3 ));
        // $employee->all();

        
        $user = User::with('employees.mobiles')
        ->where('id', auth()->id())
        ->first();
        

        return view('employees.index',compact('user'));
        

        // alternate method for only two person relation using models
        // $user = Auth::user();
        // $employees = $user->employees;
        // return view('employees.index',compact('employees'));


        //alternate method to show data by id
         // $id = Auth::user()->id;
       // $employees = Employe::latest()->where('employee_id','=',$id)->paginate(10);
       // return view('employees.index',compact('employees'));
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
       //dd($request->all());
        $validate = $request->validate([
            'Name'=> 'required',
            'email'=> 'required|email',
            'profile'=> 'required',
            'age'=> 'required|int',
            'gender'=> 'required',
            
            
        ]);
        $employee = new Employe;
        $employee->Name=$request->Name;
        $employee->email=$request->email;
        $employee->profile=$request->profile;
        $employee->age=$request->age;
        $employee->gender=$request->gender;
        $employee->employee_id=auth()->user()->id;
          
        $employee->save();

        for($i = 0; $i < count($request->input('number')); $i++) {
            $mobile = new Mobile;
            $mobile->number = $request->number[$i];
            $employee->mobiles()
            ->save($mobile);
             //alternate method
             // Mobile::create([
           //  'number' => $request->input('number')[$i],
            // 'employee_id'=> $employee->id
             //]);
         
          }

        
        
        return redirect('employee')->with('status', 'Profile updated!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employe  $employee
     *  
     * @return \Illuminate\Http\Response
     */
   
    public function edit(Employe $employee , Request $request )
    { 
       $employee = Employe::with('mobiles')
       ->where('id', $employee->id)
       ->first();
       //dd($employee->toArray());                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               

        return view ('employees.edit', compact('employee'));
         //    if($employee->employee_id != Auth::id()){
    //     abort(403);
    //    }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \App\Employe $employee
     *@param  \App\ $id
    *@param  \App\Mobile $mobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employee  )
    {
        // $number =[];

        //  dd($request->all());
         $request->validate([
            'Name'=> 'required',
            'email'=> 'required|email',
            'profile'=> 'required',
            'age'=> 'required|int',
            'gender'=>'required'
        ]);
        //dd($employee);
       
      
       //dd($employee);
       
        $employee->Name = $request->Name ;
        $employee->email = $request->email ;
        $employee->profile = $request->profile ;
        $employee->age = $request->age ;
        $employee->gender = $request->gender ;
        $employee->update();
       
       
        //Alternate method
        //  Employe::where('id',$id)
        // ->update([
        //     'Name'=> $request->Name,
        //     'email'=>$request->email,
        //     'profile'=>$request->profile,
        //     'age'=>$request->age,
        //     'gender'=>$request->gender,
            
            
        // ]);
        foreach($request->number as $key => $mobile){
            // dd($mobile);
            
             Mobile::where('id', $key)
             
        ->update([
            'number'=>$mobile,
        ]);
       }
        return redirect()->route('employee.index')->with('status', 'Profile updated!');
        
        // if($employee->employee_id != Auth::id()){
        //     abort(403);
        //    }
        // return redirect()->route('employee.index')->with('status', 'Profile updated!');
        
        // Mobile::where('id',$id)
        // ->update([
        //     'number'=>$request->number,
        // ]);

        
    
    }
    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\employe  $employee
     * @param  \App\Mobile  $mobile
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
