<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employe;  

class EmployeeController extends Controller
{
    //
    function addemployee(Request $req)
    {
        $employee = new employe;
        $employee->name=$req->name;
        $employee->email=$req->email; 
        $employee->profile=$req->profile;
        $employee->employee_id=auth()->user()->id;

        $employee->save();
        
    }
}