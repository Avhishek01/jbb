<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Mobile;
use App\Models\User;
use DataTables;
use id;
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
    public function getEmployee(Request $request)
    {

        if ($request->ajax()) {
            
            if ($request->gender == 'All'|| $request->profile =='Profile') {
                $employees = Employe::with('mobiles')->get();
            } elseif($request->gender == 'Male' || $request->profile =='SE') {
                $employees = Employe::with('mobiles')->where('gender', $request->gender)->where('profile', $request->profile)->get();
            }elseif($request->gender == 'Female' || $request->profile =='JE'){
                $employees = Employe::with('mobiles')->where('gender', $request->gender)->where('profile', $request->profile)->get();
            }else{
                $employees = "not found";
            }

            // $employees = Employe::with('mobiles');
            // if ($request->gender != 'All') {
            //         $employees = $employees->where('gender', $request->gender);
            //     }

            //     $employees = $employees->get();


            // $employees =  Employe::with('mobiles')
            // ->when($request->gender != 'All', function($query) use($request){
            //     $query->where('gender', $request->gender);
            // })->get();


            // $employees =  Employe::with('mobiles')->get();

        }
        return datatables()->of($employees)

            ->addIndexColumn()
            ->addColumn('action', function ($employees) {
                $actionBtn = '<a href="employee/' . $employees->id . '/edit" class="edit btn btn-success btn-sm" id="' . $employees->id . '" >Edit</a>
                      <button  class="btn btn-sm btn-danger btn-flat show_confirm " data-id="' . $employees['id'] . '" data-toggle="tooltip" >Delete</button>';
                return $actionBtn;
            })
            ->addColumn('number', function ($employee) {
                $number = [];
                foreach ($employee->mobiles as $key => $value) {
                    $number[] = $value['number'];
                }
                return implode(', ', $number);
            })
            ->addColumn('is_active', function ($employee) {
                if ($employee->is_active == '1') {
                    return '<span class="badge badge-pill badge-success">Success</span>';
                } elseif ($employee->is_active == '0') {
                    return '<span class="badge badge-pill badge-danger">Danger</span>';
                }
            })
            ->rawColumns(['is_active', 'number', 'action'])
            ->make(true);

    }
    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
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
            'Name' => 'required',
            'email' => 'required|email',
            'profile' => ['required'],
            'age' => 'required|int',
            'gender' => 'required',
            "number.*" => "required|max:10",
        ]);
        $employee = new Employe;
        $employee->Name = $request->Name;
        $employee->email = $request->email;
        $employee->profile = $request->profile;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->employee_id = auth()->user()->id;
        $employee->is_active = $request->boolean('is_active');
        $employee->save();
        for ($i = 0; $i < count($request->input('number')); $i++) {
            $mobile = new Mobile;
            $mobile->number = $request->number[$i];
            $employee->mobiles()
                ->save($mobile);

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

    public function edit(Request $request, Employe $employee)
    {
        $employee = Employe::with('mobiles')
            ->where('id', $employee->id)
            ->first();
        return view('employees.edit', compact('employee'));
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
    public function update(Request $request, Employe $employee)
    {
        // $number =[];

        //  dd($request->all());
        $request->validate([
            'Name' => 'required',
            'email' => 'required|email',
            'profile' => 'required',
            'age' => 'required|int',
            'gender' => 'required',
            "number.*" => "required|max:10",

        ]);
        $employee->Name = $request->Name;
        $employee->email = $request->email;
        $employee->profile = $request->profile;
        $employee->age = $request->age;
        $employee->gender = $request->gender;
        $employee->is_active = $request->boolean('is_active');
        $employee->update();

        foreach ($request->number as $key => $mobile) {
            Mobile::where('id', $key)
                ->update([
                    'number' => $mobile,
                ]);
        }
        return redirect()->route('employee.index')->with('status', 'Profile updated!');
    }
    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\employe  $employee
     * @param  \App\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $employee = Employe::find($id);

        foreach ($employee->mobiles as $mobile) {

            $mobile->delete();
        }
        $employee->delete();
        return redirect()->route('employee.index')->with('post dleted sucessfully');
    }
}
