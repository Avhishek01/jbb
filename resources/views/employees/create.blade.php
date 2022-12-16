@extends('layouts.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<br>
<div class="col-md-10">
    <div class="row">
    
        <div class="col-md-5" style="margin-left:300px">
            <div class="pull-center">
                <h2>Create New Employee</h2>
            </div>
           
        </div>
    </div>
    <br>
    
    <form action="{{ route('employee.store') }}" method="POST">
        <center>
        @csrf
        <span style="color: red">@error('Name'){{$message}}@enderror</span>
        NAME: <input type="text" name="Name" placeholder="enter your name"><br><br>
        <span style="color: red">@error('email'){{$message}}@enderror</span>
        Email: <input type="text" name="email" placeholder="enter your name"><br><br>
        <span style="color: red">@error('profile'){{$message}}@enderror</span>
        <label for="profile">Profile:</label>
        <select name="profile">
            <option value=""></option>
          <option value="SE">Software-Engineer</option>
          <option value="JE">Junior-Engineer</option>
          <option value="UI/UX">UI/UX Devloper</option>
          <option value="LD">Laravel-Devloper</option>
        </select><br><br>
        <span style="color: red">@error('age'){{$message}}@enderror</span>
        Age: <input type="number" name="age" placeholder="enter your age"><br><br>
        <span style="color: red">@error('gender'){{$message}}@enderror</span>
        <label for="gender">Choose a Gender:</label>
        <select name="gender">
            <option value=""></option>
          <option value="Male">Male</option>
          <option value="Female">female</option>
        </select>
        <br><br>
        <span style="color: red">@error('number'){{$message}}@enderror</span>
        Number-1: <input type="text" name="number[]" placeholder="enter your Mobile Number" value=""><br><br>
        <span style="color: red">@error('number'){{$message}}@enderror</span>
        Number-2: <input type="text" name="number[]" placeholder="enter your Mobile Number" value=""><br><br>
        
        <p>Please select your Choice</p>
        <label for="select">Is Active
            <input type="hidden" value="0" name="is_active">
            <input type="checkbox" name="is_active" >
        </label>
         <br>
        

        <button type="submit" style="background-color:chocolate; color:white; font-size:20px; border-radius: 3px;" >SUBMIT</button>
        <br><br>

        <div class="pull-center">
            <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>
        </div>
    </form>
</div>
</body>
</html>
<center>

@endsection