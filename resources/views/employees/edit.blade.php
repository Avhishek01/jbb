
<br> 
<br>
@extends('employees.layout')
   <center>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employee</h2>
            </div>
            <br>
            
           
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


  {{-- <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <head>
       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
      
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <title>Document</title>
  </head>
  <body>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" id="sample_form" class="form-horizontal">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add New Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <div class="form-group">
                    <label>Name : </label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Email : </label>
                    <input type="email" name="email" id="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="profile">Profile:</label>
                    <select name="profile">
                    <option value="SE">Software-Engineer</option>
                    <option value="JE">Junior-Engineer</option>
                    <option value="UI/UX">UI/UX Devloper</option>
                    <option value="LD">Laravel-Devloper</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gender">Choose a Gender:</label>
                    <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">female</option>
                    </select>
                </div>
                @foreach($employee->mobiles as $mobile )
                <span style="color: red">@error('number'){{$message}}@enderror</span>
                Number: <input type="number" name="number[{{$mobile ->id}}]" placeholder="enter your Mobile Number" value={{$mobile ->number}}><br><br>
                @endforeach

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="action_button" id="action_button" value="Add" class="btn btn-info" />
            </div>
        </form>  
        </div>
        </div>
    </div>
  </body>
  </html> --}}
  {{-- <script type="text/javascript">
   $(document).on('click', '.edit', function(event){
        event.preventDefault(); 
        var id = $(this).attr('id'); alert(id);
        $('edit').html('');
 
         
 
        $.ajax({
            url :"/employee/edit/"+id+"/",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType:"json",
            success:function(data)
            {
                console.log('success: '+data);
                $('#name').val(data.result.name);
                $('#email').val(data.result.email);
                $('#profile').val(data.result.profile);
                $('#gender').val(data.result.gender);
                $('#number').val(data.result.number);
                $('#hidden_id').val(id);
                $('.modal-title').text('Edit Record');
                $('#action_button').val('Update');
                $('#action').val('Edit'); 
                $('#formModal').modal('show');
            },
            error: function(data) {
                var errors = data.responseJSON;
                console.log(errors);
            }
        })
    });
  </script> --}}

         <form action="{{ route('employee.update', $employee->id ) }}" method="Post">   
        @csrf
        @method('PUT')
        <span id="form_result"></span>
        <span style="color: red">@error('Name'){{$message}}@enderror</span>
        NAME: <input type="text" name="Name" placeholder="enter your name" value="{{$employee->name}}"><br><br>
        <span style="color: red">@error('email'){{$message}}@enderror</span>
        Email: <input type="text" name="email" placeholder="enter your name" value="{{$employee->email}}"><br><br>
        <span style="color: red">@error('profile'){{$message}}@enderror</span>
        <label for="profile">Profile:</label>
    <select name="profile">
       
      <option value="SE">Software-Engineer</option>
      <option value="JE">Junior-Engineer</option>
      <option value="UI/UX">UI/UX Devloper</option>
      <option value="LD">Laravel-Devloper</option>
    </select><br><br>
        <span style="color: red">@error('age'){{$message}}@enderror</span>
        Age: <input type="text" name="age" placeholder="enter your age" value="{{$employee->age}}"><br><br>
        <span style="color: red">@error('gender'){{$message}}@enderror</span>
        <label for="gender">Choose a Gender:</label>
        <select name="gender">
          
          <option value="Male">Male</option>
          <option value="Female">female</option>
        </select><br><br>
        
          {{-- <span style="color: red">@error('number'){{$message}}@enderror</span>
         Number-1: <input type="number" name="number[]" placeholder="enter your Mobile Number" value="{{ old('number') }}"><br><br>
        <span style="color: red">@error('number'){{$message}}@enderror</span>
        Number-2: <input type="number" name="number[]" placeholder="enter your Mobile Number" value="{{ old('number') }}"><br><br>  
         --}}
         @foreach($employee->mobiles as $mobile )
        <span style="color: red">@error('number'){{$message}}@enderror</span>
        Number: <input type="text" name="number[{{$mobile ->id}}]" placeholder="enter your Mobile Number" value={{$mobile ->number}}><br><br>
        
         @endforeach

        <button type="submit" style="background-color: coral; color:white; font-size:20px; border-radius: 3px;" >UPDATE</button>
   
    </form> 
@endsection