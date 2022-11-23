<?php

namespace App\Http\Controllers;

use DB;
use id;
use DataTables;
use App\Models\User;
use App\Models\Mobile;
use App\Models\Employe;
use App\Rules\NumberRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
     return view('employees.index');
    
    }
    public function getEmployee(Request $request){
        
        if ($request->ajax()) {
            $employees = Employe::with('mobiles')->get();
           
                return DataTables::of($employees)
                ->addIndexColumn()
                ->addColumn('action', function($employees){
                    $actionBtn = '<a href="employee/'.$employees->id .'/edit" class="edit btn btn-success btn-sm" id="'.$employees->id.'" >Edit</a>
                                <a href="employee/'.$employees->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                 
                })
                //id="'.$employees->id.'"
                ->addColumn('number' , function($employee ){
                    $number =[];
                    foreach($employee->mobiles as $key => $value){
                        $number[] = $value['number'];
                    }
                       return implode(', ', $number);
                })
                ->rawcolumns(['number'])
                ->rawColumns(['action'])
                ->make(true);
        }
     
    }

        //alternate method when relation with more morethan three models
        // $users = User::all();
        // $user = User::with('employees.mobiles')
        // ->where('id', auth()->id())
        // ->first();
        // dd($user);

      // alternate method for only two person relation using models
         // $user = Auth::user();
        // $employees = $user->employees;
        // return view('employees.index',compact('employees'));


        //alternate method to show data by id
         // $id = Auth::user()->id;
       // $employees = Employe::latest()->where('employee_id','=',$id)->paginate(10);
       // return view('employees.index',compact('employees'));
    

       
        //filter method
        // dd($users->filter(function($item){
        //     return $item['name'][0] == 'M';
        // })->toArray());

        //group by method
        //dd($users->groupBy('id')  );
        //$users->all();

        // where method
        // dd($employee= $users->where('id' , 3 ));
        // $employee->all();


        // alternate method for only two person relation using models
        // $user = Auth::user();
        // $employees = $user->employees;
        // return view('employees.index',compact('employees'));


        //alternate method to show data by id
         // $id = Auth::user()->id;
       // $employees = Employe::latest()->where('employee_id','=',$id)->paginate(10);
       // return view('employees.index',compact('employees'));
    

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
            'profile'=> ['required'],
            'age'=> 'required|int',
            'gender'=> 'required',
            // 'number.*'=>['required', 'max:10'],
      
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
   
    public function edit(Request $request ,Employe $employee )
    { 

        
        // if(request()->ajax())
        // {
        //     $data = Employe::findOrFail($id);
        //     dd($data);
        //     return response()->json(['result' => $data]);
        // }

            $employee = Employe::with('mobiles')
        ->where('id', $employee->id)
        ->first();
        //  dd($employee);
        return view ('employees.edit', compact('employee'));
    }




        //path tells the only path 
        // $users = $request->path();
        // dd($users);

        // is method gives true or false value path pattern is true or false
        // $users=($request->is('employee/*'));
        // dd($users);

        // routeis method also tells the path true or false
        // $users=($request->routeIs('employee.*'));
        // dd($users);

        // to get complete url address
        // $users = $request->url();
        // dd($users);
        // $users = $request->fullUrl();
        // dd($users );

        // mrthod tells the its post or get
        // $method = $request->method();
        // dd($method);
        // its sends the header information as raw data
        // $value = $request->header('User-Agent');
        // dd($value);

        // it tells us about the ip address
        // $users =$request->ip();
        // dd($users);

        // return an array containing all of the content types accepted by the request: we can use also prefer method
        // $users = $request->getAcceptableContentTypes();
        // dd($users);

        // to get all data of file
        // $employee=$request->all();
        // dd($employee);

      
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
        
        // if($employee->employee_id != Auth::id()){
        //     abort(403);
        //    }
        $employee = Employe::with('mobiles');
        $employee->delete();
       //dd($employee);
        return redirect()->route('employee.index')->with('post dleted sucessfully');
    }

}
