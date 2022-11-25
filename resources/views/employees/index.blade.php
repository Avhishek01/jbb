{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <link href="/css/app.css" rel="stylesheet">
    <script src="{{ asset('/js/app.js')}}"></script>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('employee.index')" :active="request()->routeIs('employee.index')">
                        {{ __('INDEX PAGE') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                            
                           
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}
<x-app-layout>
   

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
          
            <div class="pull-right">
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

</x-app-layout>
</html>

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

 