{{-- //index method
//   $users = User::all();
// $user = User::with('employees.mobiles')
// ->where('id', auth()->id())
//  ->first();

//  /**
// * @param  \Illuminate\Http\Request  $request
// * @return \Illuminate\Http\Response
// */
//  public function filter(Request $request)
//  {
//     $record = Employe::with('mobiles')
//     ->where('gender',$request->gender)
//     ->get();
//     return $record;
//  }

// if($employee->employee_id != Auth::id()){
//     abort(403);
//    }
// $Emp_id = $request->Emp_id;
// $query = Employe::find($Emp_id)->delete();
//
//      $employee = Employe::with('mobiles');
// //    $employee->steps->each->delete();
// dd($employee);
//     $employee->delete();
//     return redirect()->route('employee.index')->with('post dleted sucessfully');
//     //return response()->json(['data' => $employee], 200);
// public function gender(){
//     $employees = Employe::with(mobiles);
//     $employee =$employees->sortby('gender')->pluck('gender')->unique();
//     return view(view:'employees.index',compact('gender'));

// }
// ->filter(function ($query) {
//     if (request()->has('male')) {
//         $query->where('gender', 'like', "%" . request('male') . "%")
//         ->get();
//     }

//     if (request()->has('female')) {
//         $query->where('gender', 'like', "%" . request('female') . "%")
//         ->get();
//     }
// })

// {
//      $employee = DB::table('employee')
//     ->select('name', 'email', 'profile', 'age', 'gender', 'is_active')
//     ->where('gender' ,'=','male')
//     ->get();
//     //  dd($employee);

// }

// {
//     $employee = DB::table('employee')
//     ->select('name', 'email', 'profile', 'age', 'gender', 'is_active')
//value     ->where('gender' ,'=','female')
//      ->get();
//     //   dd($employee);
// }

// if ($request->ajax()) {
//     dd($data);
//  if(!empty($request->gender))
//  {
//   $employees = DB::table('employee')::with('mobiles')
//     ->select('Name', 'email', 'profile', 'gender', 'number', 'age' , 'is_active')
//     ->where('Gender', $request->gender)
//     ->where('Country', $request->profile)
//     ->get();
//  }
//  else
//  {
//   $employees =  DB::table('employee')::with('mobiles')
//   ->select('Name', 'email', 'profile', 'gender', 'number', 'age' , 'is_active')
//     ->get();
//  }
//  return datatables()->of($employees)
//  ->make(true)
// }
//alternate method of store
// Mobile::create([
//  'number' => $request->input('number')[$i],
// 'employee_id'=> $employee->id
//]);
//Alternate method of update
//  Employe::where('id',$id)
// ->update([
//     'Name'=> $request->Name,
//     'email'=>$request->email,
//     'profile'=>$request->profile,
//     'age'=>$request->age,
//     'gender'=>$request->gender,
// ]); --}}
