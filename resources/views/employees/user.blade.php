@extends('layouts.dashboard')

@section('content')
    <div class="" style="margin-top: 40px">
        <div class="form-check">
            <input type="checkbox" id="checkbox" name="checkbox">
            <label class="form-check-label" for="flexCheckDefault">
                Number Of Employees
            </label>
        </div>
        <table class="table table-bordered user-table">

            <thead>

                <tr style="border:20px">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Employee</th>

                </tr>
            </thead>
            <tbody id="aaa">
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            var user = 'jhg';


            var dataTable = $('.user-table').DataTable({

                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard') }}",
                    "data": function(d) {
                        d.checkbox = user;
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        name: 'number',
                        data: 'number'
                    },
                   

                ]

            });
            var checkbox = document.querySelector("input[name=checkbox]");

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    user = 'true';
                    console.log(user);
                } else {
                    user = 'false';
                    console.log(user);
                }
                dataTable.ajax.reload();
            });

        })
    </script>
@endsection
