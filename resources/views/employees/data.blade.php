<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

@extends('employees.layout')



@section('content')
<div class="row">
<div class="col-lg-6 margin-tb">
  
    <div class="pull-left">
        <a class="btn btn-success" href="{{ route('employee.create') }}"> Create new employee</a>
       
      
    </div>
  
</div>

</div><BR><BR>

<meta name="csrf-token" content="{{ csrf_token() }}">
<body>

<table class="table table-bordered yajra-datatable">
<thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Gender</th>
        <th>Mobile-Number</th>
        <th width="200px">Action</th>
       
    </tr>
    <tbody>
    </tbody>

</table>
</body>
<script type="text/javascript">
    $(function () {
      
      var table = $('.yajra-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('employee.Datatable') }}",
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'Name'},
              {data: 'email', name: 'email'},
              {data: 'profile', name: 'profile'},
              {data: 'gender', name: 'gender'},
              {data: 'number', name: 'number'},
            
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true,
                  number:true
              },
          ]
      });
      
    });
</script>

 {{-- @foreach ($user ->employees as $employee)
<tr>
    
    <td>{{ $employee ->name }}</td>
    <td>{{ $employee ->email }}</td>
    <td>{{ $employee ->profile }}</td>
    <td>{{$employee ->age}}</td>
    <td>{{$employee ->gender}}</td>
  
    <td>
    @foreach($employee->mobiles as $mobile)
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
       
</tr>

@endforeach --}}




<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">

$(document).on('click','.show_confirm', function(event)
{
   
    Swal.fire({
                 title:'Are you sure?',
                 html:'You want to <b>delete</b> this Employee',
                 showCancelButton:true,
                 showCloseButton:true,
                 cancelButtonText:'Cancel',
                 confirmButtonText:'Yes, Delete',
                 cancelButtonColor:'#d33',
                 confirmButtonColor:'#556ee6',
                 width:300,
                 allowOutsideClick:false
    
    }).then((result) => 
    {
         if (result.isConfirmed) 
        {
            var empId = $(this).data('id');

            var url = "employee/"+ empId
            console.log(url);
           //alert(Emp_id);
            $.ajax({
                url    : url,
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type : "delete",
                success: function(response) {                                      
                 $('.yajra-datatable').DataTable().ajax.reload(null , false);
                },
                error: function(){
                    
                }
            });
         
        }
    
    });

});   
</script>


</html>