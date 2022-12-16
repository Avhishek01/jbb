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


{{-- elseif($request->profile =='SE'){
    $employees = Employe::with('mobiles')->get();
}elseif($request->profile =='JE'){
    $employees = Employe::with('mobiles')->get();
}elseif($request->profile =='UI/UX'){
    $employees = Employe::with('mobiles')->get();
}elseif($request->profile =='LD'){
    $employees = Employe::with('mobiles')->get();
} --}}

{{-- // dropdown fetch data code with basic if else
 // if ($request->gender == 'All'|| $request->profile =='Profile') {
    //     $employees = Employe::with('mobiles')->get();
    // } elseif($request->gender == 'Male' || $request->profile =='profile') {
    //     $employees = Employe::with('mobiles')->where([
    //         ['gender',$request->gender],['profile', $request->profile],
    //     ])->get();
    // }elseif($request->gender == 'Female' || $request->profile =='profile'){
    //     $employees = Employe::with('mobiles')->where('gender', $request->gender)->where('profile', $request->profile)->get();
    // }else{
    //     return "not found";
    // }

    // $employees =  Employe::with('mobiles')
            // ->when($request->gender != 'All', function($query) use($request){
            //     $query->where('gender', $request->gender);
            //     $query->where('profile', $request->profile);
            // })->get();


            // $employees =  Employe::with('mobiles')->get(); --}} 

        
            
            {{-- filter dropdown code --}}

            {{-- <script>
    $(document).ready(function() {
        $('#gender').on('change', function() {

            let value = $(this).val();

            $.ajax({
                url: "{{ route('employee.Datatable') }}",
                type: 'Get',
                data: {
                    gender: value,
                },
                success: function(data) {
                    console.log(data);
                    $('#employee').empty();
                    $('#employee').html(data);



                }
            })
        })
    })
</script> --}}
{{-- @foreach ($user->employees as $employee) 
<tr>
    
    <td>{{ $employee ->name }}</td>
    <td>{{ $employee ->email }}</td>
    <td>{{ $employee ->profile }}</td>
    <td>{{$employee ->age}}</td>
    <td>{{$employee ->gender}}</td>
  
    <td>
    @foreach ($employee->mobiles as $mobile)
    ({{$mobile ->number  }}),
    
    @endforeach
    </td>
    <td>
        <form action="{{ route('employee.destroy',$employee ->id) }}" method="POST">

            <a class="btn btn-primary" href="{{ route('employee.edit',$employee ->id) }}">Edit</a>

            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
        </form>
    </td>
       
</tr>@endforeach --}}
