<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link media="all" type="text/css" rel="stylesheet" href="https://bootsnipp.com/css/fullscreen.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/snippet.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>



</head>

<body>
    <div class="container">
        {{-- left sidebar --}}
        <div class="row">
            <div class="col-md-2">
                <div class="">
                    <div class="box" id="navigation">
                        <div class="logo">
                        </div>
                        <div class="navi" style="margin-top: 50px">
                            <ul>
                                <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-home"
                                            aria-hidden="true"></i><span
                                            class="hidden-xs hidden-sm">Dashboard</span></a>
                                </li>
                                <li><a href="{{ route('employee.index') }}"><i class="fa fa-tasks"
                                            aria-hidden="true"></i><span class="hidden-xs hidden-sm">Employee</span></a>
                                </li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-bar-chart"
                                            aria-hidden="true"></i><span class="hidden-xs hidden-sm">Logout</span></a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')
</body>

</html>
