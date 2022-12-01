<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="https://bootsnipp.com/css/fullscreen.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/snippet.css') }}">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
   
    <title>@yield('title')</title>

</head>
<script type="text/javascript" src="{{ url('js/snippe.js') }}"></script>

<body>
    {{-- sidebar --}}

    {{-- right content --}}

    

     @yield('snip')
    <div class="container>
        <div class="row">
        <div class="col-md-2">
            <div class="">
                <div class="box" id="navigation">
                    <div class="logo">
                    </div>
                    <div class="navi" style="margin-top: 50px">
                        <ul>
                            <li class="active"><a href="{{ route('dashboard') }}"><i class="fa fa-home"
                                        aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a>
                            </li>
                            <li><a href="{{ route('employee.index') }}"><i class="fa fa-tasks"
                                        aria-hidden="true"></i><span class="hidden-xs hidden-sm">Employee</span></a>
                            </li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span
                                        class="hidden-xs hidden-sm">Logout</span></a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>
    </div> 
</body>

</html>

<!------ Include the above in your HEAD tag ---------->
