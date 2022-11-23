<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
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
</nav>
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
        Number: <input type="number" name="number[{{$mobile ->id}}]" placeholder="enter your Mobile Number" value={{$mobile ->number}}><br><br>
        
         @endforeach

        <button type="submit" style="background-color: coral; color:white; font-size:20px; border-radius: 3px;" >UPDATE</button>
   
    </form> 
@endsection