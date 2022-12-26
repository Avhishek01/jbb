@extends('layouts.dashboard')


@section('content')
    <div class="col-md-18 pull-right">
        <div class="row">
            <div class="col-lg-6 margin-tb">

                <div class="pull-left" style="margin-top: 40px">
                    <a class="btn btn-success" href="{{ route('employee.create') }}"> Create new employee</a>
    
                </div><br>
                {{-- <h1>LOGIN-USER</h1>
                <div class="btn btn-success">
                    <?php
                    $user = Auth::user()->name;
                    
                    print $user;
                    ?>
                </div> --}}

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

        <table class="table table-bordered yajra-datatable">

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
@endsection



@section('scripts')
    <script>
        $(document).ready(function() {

            $(function() {
                var dataTable = $('.yajra-datatable').DataTable({

                    processing: true,
                    serverSide: true,
                    ajax: ({
                        url: "{{ route('employee.Datatable') }}",
                        "data": function(d) {
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
                    // console.log(url);
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

                    });

                }

            });

        });
    </script>
@endsection









































{{-- // $(document).on('click','.show_confirm', function(){
    //  var Emp_id = $(this).data('id');
  
    //  $element = document.getElementBytag("td");
    // dd($element);
    // element.addEventListener("click", myFunction);

    // function myFunction() {
    // document.getElementByclass("show_confirm"){ --}}
{{-- 
                          // get id of cliked record
                         
                          // hit ajax on delete route pass id in route url

                                    //set method DELETE
 // $employee = Employe::with('mobiles');
                        //  $employee->delete();
                        // return redirect()->route('employee.index')->with('post dleted sucessfully'    
//  --}}
