<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="https://bootsnipp.com/css/fullscreen.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('css/snippet.css') }}">
   <title>Snip</title>

</head>
<script type="text/javascript" src="{{ url('js/snippe.js') }}"></script>

<body class="container" style="margin-top:70px">
        
   
    <div class="container>
        <div class="row">
        <div class="col-md-2">
            <div class="">
                <div class="box" id="navigation">
                    <div class="logo">
                        {{-- <a hef="home.html"><img src="http://jskrishna.com/work/merkury/images/logo.png" alt="merkery_logo"
                                    class="hidden-xs hidden-sm">
                                <img src="http://jskrishna.com/work/merkury/images/circle-logo.png" alt="merkery_logo"
                                    class="visible-xs visible-sm circle-logo">
                            </a>  --}}
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
                {{-- <div class="col-md-10 col-sm-11 display-table-cell v-align">
                      
                    </div> --}}
            </div>
        </div>
    </div>
    

</body>

</html>

<!------ Include the above in your HEAD tag ---------->
