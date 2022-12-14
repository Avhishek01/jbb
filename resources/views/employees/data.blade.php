<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


</head>

<body>
    <div class="col-md-10 pull-right">
        <div class="row">
            <div class="col-lg-6 margin-tb">

                <div class="pull-left" style="margin-top: 40px">
                    <a class="btn btn-success" href="{{ route('employee.create') }}"> Create new employee</a>

                </div>

            </div>

        </div><br>
        <form action="" id="select">
            <label for="gender">Choose a Gender:</label>
            <select name="gender" id="gender">
                <option value="All">All</option>
                <option value="Male">Male</option>
                <option value="Female">female</option>
            </select>
            <label for="profile">Profile:</label>
            <select name="profile" id="profile">
                <option value="Profile">Profile</option>
                <option value="SE">Software-Engineer</option>
                <option value="JE">Junior-Engineer</option>
                <option value="UI/UX">UI/UX Devloper</option>
                <option value="LD">Laravel-Devloper</option>
            </select><br><br>
        </form>

        <table class="table table-bordered yajra-datatable" id="employee">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th>Gender</th>
                    <th>Mobile-Number</th>
                    <th>Age</th>
                    <th>Active</th>
                    <th width="200px">Action</th>

                </tr>
            <tbody id="aaa">
            </tbody>

        </table>
    </div>

</body>
<script>
    $(document).ready(function() {

        $(function() {
            var dataTable = $('.yajra-datatable').DataTable({

                processing: true,
                serverSide: true,
                ajax: ({
                    url: "{{ route('employee.Datatable') }}",
                    "data": function ( d ) {
                        d.gender = $('#gender').val();
                        d.profile = $('#profile').val();
                    }
                }),
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'Name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'profile',
                        name: 'profile'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        number: true,

                    },
                ]


            });

            $('#gender').change(function() {
                dataTable.ajax.reload();
            });
            $('#profile').change(function() {
                dataTable.ajax.reload();
            });

        });

    })
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '.show_confirm', function(event) {

        Swal.fire({
            title: 'Are you sure?',
            html: 'You want to <b>delete</b> this Employee',
            showCancelButton: true,
            showCloseButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Yes, Delete',
            cancelButtonColor: '#d33',
            confirmButtonColor: '#556ee6',
            width: 300,
            allowOutsideClick: false

        }).then((result) => {
            if (result.isConfirmed) {
                var empId = $(this).data('id');

                var url = "employee/" + empId
                console.log(url);
                // alert(Emp_id);
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "delete",
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        $('.yajra-datatable').DataTable().ajax.reload(null, false);

                    },
                    error: function() {

                    }
                });

            }

        });

    });
</script>

</html>






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
{{-- $('#employee').html(html);
 $('#employee').html(data);
 $.each(data,function(key,value){
  $('employee').append("<tr>\
					<td>"+value.name+"</td>\
					<td>"+value.email+"</td>\
				<td>"+value.profile+"</td>\
                    <td>"+value.gender+"</td>\
                  <td>"+value.number+"</td>\
                   <td>"+value.age+"</td>\
                   <td>"+value.is_active+"</td>\
				</tr>"); }) --}}
{{-- <script type="text/javascript">
    $(function() {


        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('employee.Datatable') }}",

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'Name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'profile',
                    name: 'profile'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'is_active',
                    name: 'is_active'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    number: true,
                    // is_active:true
                },
            ]
            });
            $('#gender').change(function() {
            table.draw();
        });
    });
</script>  --}}
{{-- <script>
        $(document).ready(function(){
        
            fill_datatable();
        
            function fill_datatable(gender = '')
            {
                var dataTable = $('#employee').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax:{
                        url: "{{ route('employee.Datatable') }}",
                        data:{gender:gender}
                    },
                    columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'Name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'profile',
                        name: 'profile'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'age',
                        name: 'age'
                    },
                    {
                        data: 'is_active',
                        name: 'is_active'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                        number: true,
                        // is_active:true
                    },
                });
            }
        
            $('#gender').click(function(){
                var gender = $('#gender').val();
        
                if(filter_gender != '' &&  filter_gender != '')
                {
                    $('#customer_data').DataTable().destroy();
                    fill_datatable(filter_gender, filter_country);
                }
                else
                {
                    alert('Select Both filter option');
                }
            });
        
        
        });
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
