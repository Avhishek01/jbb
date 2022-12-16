@extends('layouts.dashboard')

@section('content')
    <div class="" style="margin-top: 40px">
        <table class="table table-bordered user-table">

            <thead>

                <tr style="border:20px">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                     <th>Employee</th> 

                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            var dataTable = $('.user-table').DataTable({

                processing: true,
                serverSide: true,
                ajax: ({
                    url: "{{ route('dashboard') }}",

                }),
                columns: [
                    {
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
                        data:'number'
                    }

                ]

            });

        })
    </script>
@endsection
